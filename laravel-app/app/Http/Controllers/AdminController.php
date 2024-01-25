<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Classroom;
use App\Models\Fee;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Student_class;
use App\Models\Teacher_class;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
     public function index()
    {
        if (Auth::check()) {
            return view('admins.index');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function listStudent()
    {     
        $listStudents = DB::table('students')
          ->select('id', 'name')
          ->get();
        //   dd($listStudents);
         return view('admins.manageStudent.listStudent', compact('listStudents'));
    }
    public function detailStudent($id)
    {     
        $detailStudent = Student::findOrFail($id);
         return view('admins.manageStudent.detailStudent', compact('detailStudent'));
    }
     public function listClass()
    {     
        $listClasses = Classroom::all();
         return view('admins.manageClass.listClass', compact('listClasses'));
    }
    public function detailClass($id)
    {     
        $detailClass = Classroom::findOrFail($id);
         return view('admins.manageClass.detailClass', compact('detailClass'));
    }
     public function listTeacher()
    {     
        $listTeachers = Teacher::all();
        
          return view('admins.manageTeacher.listTeacher', compact('listTeachers'));
    }
     public function detailTeacher($id)
    {     
        $detailTeacher = Teacher::findOrFail($id);
     
         return view('admins.manageTeacher.detailTeacher', compact('detailTeacher'));
    }
    public function adminProfile()
     {
         if (Auth::check()) {
          $userId = Auth::user()->id;
          $admin = Admin::where('user_id', $userId)->first();
        //   dd($admin);
         }
         return view('admins.adminProfile', compact('admin'));
     }
      public function billStudentClass($id)
    {    
        $billStudentClasses = DB::table('students')
        ->join('student_classes', 'student_classes.student_id', '=', 'students.id')
        ->join('classrooms', 'classrooms.id', '=', 'student_classes.class_id')
        ->join('fees', 'fees.class_id', '=', 'classrooms.id')
        ->where('students.id', $id)
        ->where('fees.student_id', $id)
        ->where('student_classes.student_id', '=', $id)
        ->where(function ($query) {
            $query->whereNull('fees.paid_status')
                ->orWhere('fees.paid_status', '0');
        })
        ->select('students.id as student_id', 'fees.paid_day', 'students.name as student_name', 'fees.id as id', 'classrooms.name as class_name', 'classrooms.class_code', 'fees.paid_status as paid_status')
        ->get();
        // dd($billStudentClasses);
        
         return view('admins.manageStudent.billStudentClass', compact('billStudentClasses'));
    }
    public function confirmPayment($id){
        $fee = Fee::find($id);
        // dd($fee);

        // $fee->paid_status = "1";
        // $fee->paid_day = getDate();
        // // dd($fee);
        // $fee->save();

        $fee->paid_status = "1";
        $fee->paid_day = date('Y-m-d');
        // dd($fee);
        $fee->save();
        
        $listStudents = Student::all();
        
        return view('admins.manageStudent.listStudent', compact('listStudents'));
        
    }
     public function waitTeacherClass($id)
    {    
        $waitTeacherClasses = DB::table('teachers')
        ->join('teacher_classes','teacher_classes.teacher_id','=','teachers.id')
        ->join('classrooms','classrooms.id','=','teacher_classes.class_id')
        ->where('teacher_classes.teacherClass_status', '1')
        ->where('teacher_classes.teacher_id','=', $id)
        ->select('teacher_classes.id as id','classrooms.class_code','classrooms.name as class_name', 'teacher_classes.teacher_id', 'teachers.name as teacher_name')
        ->get();
        // dd($waitTeacherClasses);
        
         return view('admins.manageTeacher.waitTeacherClass', compact('waitTeacherClasses'));
    }
    public function acceptTeacherRegister($id){
        
        $teacher_class=Teacher_class::find($id);
        // dd($teacher_class);

        $teacher_class->teacherClass_status = "0";
        $teacher_class->save();
        // dd($teacher_class);
        
        $listTeachers = Teacher::all();
        
        return view('admins.manageTeacher.listTeacher', compact('listTeachers'));
    }
    public function refuseTeacherRegister($id){
        
        $teacher_class=Teacher_class::find($id);
        // dd($teacher_class);

        $teacher_class->teacherClass_status = "2";
        $teacher_class->save();
        
         $listTeachers = Teacher::all();
         
        return view('admins.manageTeacher.listTeacher', compact('listTeachers'));
    }
    
}