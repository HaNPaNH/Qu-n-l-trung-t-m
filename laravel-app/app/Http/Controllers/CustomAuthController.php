<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Facade;
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
                return redirect('/addTeacherInformation');
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
            // 'role' => 'required|in:1,2',
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
        } else {
            // Redirect to student page
            return redirect('/studentClass');
        }
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
}