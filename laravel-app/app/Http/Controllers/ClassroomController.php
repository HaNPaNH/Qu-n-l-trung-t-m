<?php

namespace App\Http\Controllers;
use App\Models\Classroom;
use App\Models\Fee;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Student_class;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{    
    public function listSClass($id)
    {
        // $listSClass = Classroom::join('student_classes', 'student_classes.class_id', '=', 'classrooms.id')
        //     ->join('students', 'students.student_id', '=', 'student_classes.student_id')
        //     ->select(, 'students.name', 'student_classes.id')
        //     ->get();
        $listClassStudents = DB::table('student_classes')
          ->join('classrooms', 'student_classes.class_id', '=', 'classrooms.id')
          ->join('students', 'student_classes.student_id', '=', 'students.id')
          ->where('student_classes.class_id', $id)
          ->select('student_classes.student_id as student_id', 'students.name as student_name')
          ->get();
        // dd($listSClass);
        return view('classrooms.listSClass', compact('listClassStudents'));
    }
    public function detailClass($id)
    {
         $classroom = Classroom::findOrFail($id);
     //     dd($classroom);
         return view('classrooms.detailClass', compact('classroom'));
    }
    
    public function addSInfor()
    {
        return view('students.addSInfor');
    }

    public function saveSInfor(Request $request)
    {
        // Lấy thông tin người dùng đăng nhập
        $userId = Auth::user()->id;

        // Tạo mới infor học sinh
        $student = new Student();
        $student->user_id = $userId;
        $student->level_id = $request->input('level');
        $student->name = $request->input('name');
        $student->birthday = $request->input('birthday');
        $student->home = $request->input('home');
        $student->address = $request->input('address');
        $student->phone = $request->input('phone');
        $student->save();

        // Chuyển hướng đến trang đăng ký lớp học
        return redirect()->route('confirmRegister', $student);
    }
    public function checkStudentClass($classId)
    {
        // Kiểm tra xem học sinh đã đăng ký lớp học hay chưa
        $isRegistered = DB::table('student_classes')
          ->where('student_classes.class_id', $classId)
          ->select('student_id')
          ->first();

        if ($isRegistered) {
            // Đã đăng ký lớp học, chuyển hướng đến trang khóa học của tôi
            return redirect()->route('studentClass');
        }
        // Chưa đăng ký lớp học, chuyển hướng thông báo xác nhận đăng ký
        return redirect()->route('registerSClass', $classId);
    }
    public function registerSClass($id)
    {
        $classroom = Classroom::find($id);
        if ($classroom->actual_number < $classroom->prediction_number) {
            // Hiển thị popup xác nhận đăng ký
            return view('classrooms.registerStudent', ['classroom' => $classroom]);
        } 
            // Chưa đăng ký lớp học, chuyển hướng đến trang đăng ký
        return view('classrooms.fullStudentClass', ['classroom' => $classroom]);
    }
    public function confirmRegister($classId)
    {
        // Lấy thông tin lớp học
        $classroom = Classroom::find($classId);

        // Lấy thông tin người dùng đăng nhập
        $userId = Auth::user()->id;
        
        // Thông tin học sinh trong bảng students
        $student = Student::where('user_id', $userId)->first();
        // dd($student);

        if (!$student) {
            // Nếu không có thông tin học sinh, chuyển hướng đến trang addSInfor
            return redirect()->route('addSInfor');
        }

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
      
        return redirect()->route('billSClass',  $studentClass); // Chuyển hướng đến trang hóa đơn
    }
    public function cancelRegister()
    {
        // Thực hiện logic hủy đăng ký lớp học
        return redirect()->route('allSClass'); // Quay lại trang hiện tại
    } 
}