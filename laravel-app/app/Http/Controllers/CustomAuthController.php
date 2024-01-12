<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function customLogin(Request $request)
    {
        $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $role = Auth::user()->role;
            if ($role == 0) {
                return redirect('/admin');
            } elseif ($role == 1) {
                return redirect('/teacherClass');
            } else {
                return redirect('/studentClass');
            }
        }
        return redirect("login")->withSuccess('Login details are not valid');
    }
    public function registration()
    {
        return view('auth.register');
    }
    public function customRegistration(Request $request)
    {
        $request->validate([
            'role' => 'required|in:1,2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        User::create($data);
        // $user = $this->create($data);
        $role = $data['role'];
        if ($role == 1) {
            // Redirect to teacher page
            return redirect('/teacherClass');
        } elseif ($role == 2) {
            // Redirect to student page
            return redirect('/studentClass');
        }
    }
    public function create(array $data)
    {
        return User::create([
            // 'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role']
        ]);
    }
    public function admin()
    {
        if (Auth::check()) {
            return view('admins.admin');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function teacherClass()
    {
        if (Auth::check()) {
            return view('teachers.teacherClass');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function studentClass()
    {
        if (Auth::check()) {
            return view('students.studentClass');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
    public function forgot()
    {
         return view('auth.forgotpass');
    }
    public function allTClass()
    {
         return view('teachers.allTClass');
    }
    public function allSClass()
    {
         return view('students.allSClass');
    }
    public function waitClass()
    {
         return view('teachers.waitClass');
    }
    public function billSClass()
    {
         return view('students.billSClass');
    }
    public function listOClass()
    {
         return view('teachers.listOClass');
    }
    public function detailClass()
    {
         return view('students.detailClass');
    }
}