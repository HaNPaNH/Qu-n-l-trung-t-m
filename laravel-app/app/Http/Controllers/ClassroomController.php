<?php

namespace App\Http\Controllers;
use App\Models\Classroom;
use App\Models\Fee;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Student_class;
use App\Models\Teacher_class;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use SebastianBergmann\CodeUnit\ClassMethodUnit;

class ClassroomController extends Controller
{    
    public function listSClass($id)
    {    
        $listClassStudents = DB::table('student_classes')
          ->join('classrooms', 'student_classes.class_id', '=', 'classrooms.id')
          ->join('students', 'student_classes.student_id', '=', 'students.id')
          ->where('student_classes.class_id', $id)
          ->select('student_classes.student_id as student_id', 'students.name as student_name')
          ->get();
        // dd($listClassStudents);
        // $classAttendances = DB::table('students')
        // ->join('attendances','attendances.student_id','=','students.id')
        // ->join('classrooms','classrooms.id','=','attendances.class_id')
        // ->where('attendances.class_id', $id)
        // ->select('attendances.student_id as student_id', 'students.name as student_name', 'attendances.attendance_day', 'attendances.has_attendance', 'attendances.id as id')
        // ->get();
        
        // dd($classAttendances);
        
        return view('classrooms.listSClass', compact('listClassStudents'));
    }
    public function detailClass($id)
    {
         $classroom = Classroom::findOrFail($id);
     //     dd($classroom);
         return view('classrooms.detailClass', compact('classroom'));
    }
    public function checkStudentClass($classId)
    {
        $userId = Auth::user()->id;
        // dd($userId);
        
        $student = Student::where('user_id', $userId)->first();
        // dd($student);

        if ($student){
            $studentId = Student::where('user_id', $userId)->first()->id;
             // Kiểm tra xem học sinh đã đăng ký lớp học hay chưa
            $isRegistered = DB::table('student_classes')
            ->where('student_classes.class_id', $classId)
            ->where('student_id', $studentId)
            ->select('student_classes.student_id')
            ->first();
            // dd($isRegistered); 
            if ($isRegistered) {
            // Đã đăng ký lớp học, chuyển hướng đến trang khóa học của tôi
                // return redirect()->route('studentClass');
                return view('classrooms.popupRegistered', ['classId' => $classId]);
            }
            // Chưa đăng ký lớp học, chuyển hướng thông báo xác nhận đăng ký
            return redirect()->route('registerSClass', $classId);
        }
        // Chưa đăng ký lớp học, chuyển hướng thông báo xác nhận đăng ký
        return redirect()->route('registerSClass', $classId);
    }
    public function registerSClass($classId)
    {
        $classroom = Classroom::find($classId);
        if ($classroom->actual_number < $classroom->prediction_number) {
            // Hiển thị popup xác nhận đăng ký
            return view('classrooms.registerStudent', ['classId' => $classId]);
        } 
            // Chuyển hướng đến trang popup lớp đầy
        return view('classrooms.fullStudentClass', ['classId' => $classId]);
    }
    public function confirmStudentRegister($classId)
    {
        // Lưu giá trị $classId vào session
        // session(['classId' => $classId]);

        // Lấy thông tin lớp học
        $classroom = Classroom::find($classId);
        // dd($classroom);
        
        // Lấy thông tin người dùng đăng nhập
        $userId = Auth::user()->id;
        
        // Thông tin học sinh trong bảng students
        $student = Student::where('user_id', $userId)->first();
        // dd($student);
        // dd($student);

        // if (!$student) {
        //     // Nếu không có thông tin học sinh, chuyển hướng đến trang addStudentInformation
        //     return redirect()->route('addStudentInformation');
        // }
        // dd($classroom);

        // Thêm dữ liệu học sinh vào lớp học
        $studentClass = new Student_Class();
        $studentClass->student_id = $student->id;
        $studentClass->class_id = $classId;
        $studentClass->save();

        // Tăng actual_number của lớp học
        $classroom->actual_number += 1;
        $classroom->save();

        // Thêm dữ liệu vào bảng fees
        $fee = new Fee();
        $fee->student_id = $student->id;
        $fee->class_id = $classId;
        $fee->save();
        
        // Thêm dữ liệu vào bảng attendances
        $attendance = new Attendance();
        $attendance->student_id = $student->id;
        $attendance->class_id = $classId;
        $attendance->attendance_day = date('Y-m-d');
        $attendance->save();
      
        return redirect()->route('billSClass',  $studentClass); // Chuyển hướng đến trang hóa đơn
    }
    public function checkTeacherClass($classId)
    {
        $userId = Auth::user()->id;
        
        $teacherId = Teacher::where('user_id', $userId)->first()->id;
        
        // Kiểm tra xem có bất kỳ giáo viên nào đã gán với lớp học trong bảng teacher_classes chưa
        $teacherClasses = Teacher_class::where('class_id', $classId)
                                ->get();
        // dd($teacherClass);
                                            
        if ($teacherClasses) {
            // Nếu giáo viên đã đăng ký lớp này, chuyển hướng đến trang popup thông báo đã đăng ký
            foreach ($teacherClasses as $teacherClass) {
                if ($teacherClass->teacher_id == $teacherId) {
                    return view('classrooms.popupRegistered', ['classId' => $classId]);
                }
            }  
            // Nếu giáo viên khác đăng ký lớp này và được duyệt ok, chuyển hướng đến trang popup thông báo đã có giáo viên đăng ký
            foreach ($teacherClasses as $teacherClass) {
                if ($teacherClass->teacher_id !== $teacherId && $teacherClass->teacherClass_status == '0') {
                    return view('classrooms.popupHadTeacher', ['classId' => $classId]);
                }
            }
            // Nếu đã có giáo viên dki dạy lớp này nhưng duyệt thất bại hoặc chưa được duyệt, chuyển hướng đến trang đăng ký
            return view('classrooms.registerTeacher', ['classId' => $classId]);
            
        } else {
            // Nếu chưa có giáo viên đăng ký lớp này, chuyển hướng đến trang popup xác nhận đăng ký lớp dạy
            // return redirect()->route('registerTeacherClass', ['classId' => $classId]);
            return view('classrooms.registerTeacher', ['classId' => $classId]);
        }
    }
    public function confirmTeacherRegister($classId) {
        // Lấy thông tin người dùng đăng nhập
        $userId = Auth::user()->id;

        // Thông tin học sinh trong bảng students
        $teacher = Teacher::where('user_id', $userId)->first();
        
        // Thêm thông tin giáo viên vào lớp
        $teacherClass = new Teacher_Class();
        $teacherClass->teacher_id = $teacher->id;
        $teacherClass->class_id = $classId;
        $teacherClass->save();
        
        return redirect()->route('waitClass',  $teacherClass);
    }
}