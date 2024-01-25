<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\CustomAuthController;
use Illuminate\Http\Request;
// use App\Models\User;
// use Illuminate\Validation\Validator;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\Student_class;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
     public function addStudentInformation()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            // dd($userId);

            $student = Student::where("user_id", $userId)->first();
            // dd($student);

            if ($student) {
                return redirect()->route('studentClass');
            }
            return view('students.addStudentInformation');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function saveStudentInformation(Request $request)
    {
        // Lấy giá trị $classId từ session
        // $classroom = Classroom::find($classId);
        // dd($classroom);
        
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
        // return redirect()->route('confirmStudentRegister', $student);
         return redirect()->route('studentClass');
    }
     public function studentClass()
    {
    
        $userId = Auth::user()->id;
        // dd($userId);

        $studentId = Student::where("user_id", $userId)->first()->id;
        // dd($studentId);
        $student_classes = DB::table('students')
        ->join('student_classes','student_classes.student_id','=','students.id')
        ->join('classrooms','classrooms.id','=','student_classes.class_id')
        ->Join('fees','fees.class_id','=','classrooms.id')
        ->where('fees.student_id', $studentId)
        ->where('students.user_id','=', $userId)
        ->where('student_classes.student_id','=', $studentId)
        ->select('student_classes.student_id', 'classrooms.class_code','classrooms.name','student_classes.class_id', 'fees.paid_status as paid_status')
        ->get();
        // dd($student_classes);
        
        foreach ($student_classes as $student_class) {
            if ($student_class->paid_status == 0) {
                $student_class->paid_status_text = 'Chưa đóng';
            } elseif ($student_class->paid_status == 1) {
                $student_class->paid_status_text = 'Đã đóng';
            }
        }
        return view('students.studentClass', compact('student_classes')); 
    }
    public function allSClass()
    {
        $classrooms = Classroom::all();
        return view('students.allSClass',compact('classrooms'));
    }
    public function waitClass()
    {
         return view('teachers.waitClass');
    }
     public function billSClass($studentClassId)
     {
     // Lấy thông tin hóa đơn
     $bill = DB::table('student_classes')
          ->join('classrooms', 'student_classes.class_id', '=', 'classrooms.id')
          ->join('students', 'student_classes.student_id', '=', 'students.id')
          ->where('student_classes.id', $studentClassId)
          ->select('classrooms.name as classroom_name', 'students.name as student_name', 'classrooms.fee')
          ->first();
     // dd($bill);
     // Trả về view hiển thị hóa đơn với dữ liệu
     return view('students.billSClass', compact('bill'));
     }
     public function studentProfile()
     {
         if (Auth::check()) {
          $userId = Auth::user()->id;
          $student = Student::where('user_id', $userId)->first();
        //   dd($student);
         }
         return view('students.studentProfile',compact('student'));
     }
     public function editStudentInformation($id){
        //
         $student = Student::findOrFail($id);
         return view('students.editStudentInformation', compact('student'));
    }
     public function updateStudentInformation(Request $request, $id) {
        //  $request->validate([
        //     'phone' => 'required|numeric|max:10',
        // ]);
        
        $student = Student::findOrFail($id);
        
        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();
       
        Student::find($id)->update($data);
        
        return redirect()->route('studentProfile', $student);
    }
}