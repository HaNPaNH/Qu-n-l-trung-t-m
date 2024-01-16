<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
     public function admin()
    {
        if (Auth::check()) {
            return view('admins.mStudent.mStudent');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function mStudent()
    {
         return view('admins.mStudent.mStudent');
    }
    public function mSStudent()
    {
         return view('admins.mStudent.mSStudent');
    }
}