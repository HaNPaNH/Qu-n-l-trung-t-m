<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\CustomAuthController;
// use Illuminate\Http\Request;
// use App\Models\User;
use App\Models\Classroom;
use App\Models\Student_class;
use Illuminate\Support\Facades\Auth;
class StudentController extends Controller
{
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
    public function billSClass()
    {
          $billSClass = Classroom::join('students', 'students.class_id', '=', 'classrooms.id')
            ->select('classrooms.name as class_name', 'students.name as student_name', 'classrooms.fee')
            ->get();
     //    return view('classrooms.listSClass', ['data' => $listSClass]);
          return view('students.billSClass', ['data' => $billSClass]);
    }
    // public function create(array $data)
    // {
    //     return User::create([
    //         // 'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //         'role' => $data['role']
    //     ]);
    // }
//     public function registerSClass(Request $request){
//           $data = $request->all();
//           Student_class::create($data);
//         // echo"success create user";
//           $student_classes = Student_class::all();
//     }
}