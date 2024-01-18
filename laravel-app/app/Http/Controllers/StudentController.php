<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\CustomAuthController;
// use Illuminate\Http\Request;
// use App\Models\User;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\Student_class;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class StudentController extends Controller
{
     public function studentClass()
    {
        if (Auth::check()) {
          $userId = Auth::user()->id;

          $student_classes = DB::table('students')
            ->join('student_classes','student_classes.student_id','=','students.id')
            ->join('classrooms','classrooms.id','=','student_classes.class_id')
            ->join('fees','fees.class_id','=','classrooms.id')
            ->where('students.user_id','=', $userId)
            ->select('classrooms.class_code','classrooms.name','student_classes.class_id', 'fees.paid_status as paid_status')
            ->get();
          //    dd($student_classes); 
            
          foreach ($student_classes as $student_class) {
            if ($student_class->paid_status == 0) {
                $student_class->paid_status_text = 'Chưa đóng';
            } elseif ($student_class->paid_status == 1) {
                $student_class->paid_status_text = 'Đã đóng';
            }
         }
            return view('students.studentClass', compact('student_classes'));
        }
        return redirect("login")->withSuccess('You are not allowed to access');
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
         }
         return view('students.studentProfile',compact('student'));
     }
}