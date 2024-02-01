<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\Teacher_class;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function addTeacherInformation()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            
            $teacher = Teacher::where("user_id", $userId)->first();
            
            if ($teacher) {
                return redirect()->route('teacherClass');
            }
            return view('teachers.addTeacherInformation');
         }
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function saveTeacherInformation(Request $request)
    {  
        // Lấy thông tin người dùng đăng nhập
        $userId = Auth::user()->id;
         
        $request->validate([
            'phone' => 'required|max:10',
        ]);
        // Tạo mới infor học sinh
        $teacher = new Teacher();
        $teacher->user_id = $userId;
        $teacher->name = $request->input('name');
        $teacher->address = $request->input('address');
        $teacher->workplace = $request->input('workplace');
        $teacher->phone = $request->input('phone');
        $teacher->save();
        
        return redirect()->route('teacherClass');
    }
    public function editTeacherInformation($id){
        //
         $teacher = Teacher::findOrFail($id);
         return view('Teachers.editTeacherInformation', compact('teacher'));
    }
    public function updateTeacherInformation(Request $request, $id) {
        $request->validate([
            'phone' => 'required|max:10',
        ]);
        
        $teacher = Teacher::findOrFail($id);
        
        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();
       
        Teacher::find($id)->update($data);
        
        return redirect()->route('teacherProfile', $teacher);
    }
    public function teacherClass()
    {
        $userId = Auth::user()->id;
            
        $teacherId = Teacher::where("user_id", $userId)->first()->id;
        
        $teacher_classes = DB::table('teacher_classes')
        ->join('classrooms','classrooms.id','=','teacher_classes.class_id')
        ->where('teacher_classes.teacherClass_status', '0')
        ->where('teacher_classes.teacher_id', $teacherId)
        ->get();
        // dd($teacher_classes);

        return view('teachers.teacherClass', compact('teacher_classes'));
    }
    public function allTClass()
    {           
        $classrooms = Classroom::all();
        //   dd($classrooms);
         return view('teachers.allTClass', compact('classrooms'));
    }
    public function waitClass()
    {     
        $userId = Auth::user()->id;

        $teacherId = Teacher::where("user_id", $userId)->first()->id;
        
        $waitClasses = DB::table('teachers')
        ->join('teacher_classes','teacher_classes.teacher_id','=','teachers.id')
        ->join('classrooms','classrooms.id','=','teacher_classes.class_id')
        ->whereIn('teacher_classes.teacherClass_status', ['1', '2'])
        ->where('teachers.user_id','=', $userId)
        ->where('teacher_classes.teacher_id','=', $teacherId)
        ->select('classrooms.class_code','classrooms.name', 'teacher_classes.teacherClass_status', 'classrooms.start_day' )
        ->get();
        // dd($waitClasses);
        foreach ($waitClasses as $waitClass) {
                if ($waitClass->teacherClass_status == 1) {
                    $waitClass->teacherClass_status_text = 'Chờ duyệt';
                    // dd($waitClass->teacherClass_status_text);
                } elseif ($waitClass->teacherClass_status == 2) {
                    $waitClass->teacherClass_status_text = 'Đăng ký thất bại';
                }
            }
        return view('teachers.waitClass', compact('waitClasses'));
    }
    public function teacherProfile()
     {
         if (Auth::check()) {
          $userId = Auth::user()->id;
          $teacher = Teacher::where('user_id', $userId)->first();
        //   dd($student);
         }
         return view('teachers.teacherProfile',compact('teacher'));
     }
}