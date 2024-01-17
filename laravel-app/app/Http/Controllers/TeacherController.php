<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\Teacher_class;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function teacherClass()
    {
        if (Auth::check()) {
            $teacher_classes = Teacher_class::all();
            return view('teachers.teacherClass', compact('teacher_classes'));
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function allTClass()
    {     
         $classrooms = Classroom::all();
         return view('teachers.allTClass', compact('classrooms'));
    }
    public function waitClass()
    {
         return view('teachers.waitClass');
    }
}