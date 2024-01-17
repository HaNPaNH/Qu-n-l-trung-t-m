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
     //  public function addSInfor()
     // {
     //    if (Auth::check()) {
     //        $student_classes = Student_class::all();
     //        return view('students.studentClass', compact('student_classes'));
     //    }
     //    return redirect("login")->withSuccess('You are not allowed to access');
     // }
     public function studentClass()
    {
        if (Auth::check()) {
            $student_classes = Student_class::all();
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
}