<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Classroom;
use App\Models\Fee;
use App\Models\Attendance;
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
    public function adminProfile()
     {
        if (Auth::check()) {
        $userId = Auth::user()->id;
        $admin = Admin::where('user_id', $userId)->first();
        //   dd($admin);
        }
        return view('admins.adminProfile', compact('admin'));
     }
    public function editAdminProfile($id){
        //
         $admin = Admin::findOrFail($id);
         return view('admins.editAdminProfile', compact('admin'));
    }
     public function updateAdminProfile(Request $request, $id) {
        
        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();
       
        Admin::find($id)->update($data);
        
        return redirect()->route('adminProfile');
    }
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
    public function detailAdminClass($id)
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
        ->select('teacher_classes.id as id','teacher_classes.class_id','classrooms.class_code','classrooms.name as class_name', 'teacher_classes.teacher_id', 'teachers.name as teacher_name')
        ->get();
        // dd($waitTeacherClasses);
        
         return view('admins.manageTeacher.waitTeacherClass', compact('waitTeacherClasses'));
    }
    public function acceptTeacherRegister($id, $classId){
        
        $teacher_class=Teacher_class::find($id);
        // dd($teacher_class);

        $teacher_class->teacherClass_status = "0";
        
        $teacher_class->save();
        // dd($teacher_class);
    
        $otherTeacherClasses = DB::table('teacher_classes')
        ->where('class_id', $classId)
        ->where('id','!=', $id)
        ->get();
        // dd($otherTeacherClasses);
                
        foreach ( $otherTeacherClasses as $otherTeacherClass){
            $teacherClassModel = Teacher_class::find($otherTeacherClass->id);
            $teacherClassModel->teacherClass_status = "2";
            $teacherClassModel->save();
        }

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
    public function attendanceInformation($id){
        // dd($id);
        $classAttendances = DB::table('students')
        ->join('attendances','attendances.student_id','=','students.id')
        // ->join('classrooms','classrooms.id','=','attendances.class_id')
        ->where('attendances.class_id', $id)
        ->select('students.name', 'attendances.attendance_day', 'attendances.has_attendance', 'attendances.id')
        ->get();
        // dd($classAttendances);
        foreach ($classAttendances as $classAttendance) {
            if ($classAttendance->has_attendance == 0) {
                $classAttendance->has_attendance_text = 'Vắng';
            } elseif ($classAttendance->has_attendance == 1) {
                $classAttendance->has_attendance_text = 'Có';
            }
        }
        return view('admins.manageClass.attendanceInformation', compact('classAttendances'));
    }
    public function attendanceStudent($id){
        
        $attendanceStudent = Attendance::find($id);

        $attendanceStudent->has_attendance = '1';
        $attendanceStudent->save();
        
        $attendanceClassId = Attendance::find($id)->class_id;
        // dd($attendanceClassId);

        return redirect()->route('attendanceInformation', $attendanceClassId);
    }
    public function deleteStudent($id){
        
        $student_classes = Student_class::where('student_id', $id)->get();
        
        foreach ($student_classes as $student_class){
            $student_class->delete();
        }
        
        // dd($student_class);
        $fees=Fee::where('student_id', $id)->get();
        foreach ($fees as $fee){
            $fee->delete();
        }
        
        $attendances=Attendance::where('student_id', $id)->get();
        foreach ($attendances as $attendance){
            $attendance->delete();
        }
        
        // $user=DB::table('users')
        // ->join('students', 'students.user_id','=','users.id')
        // ->where('students.id', $id)
        // ->first();

        // if ($user) {
        //     $user->delete();
        // }
        
        $student=Student::find($id);
        
        if($student){
            $student->delete();
        }
        
        $listStudents = DB::table('students')
          ->select('id', 'name')
          ->get();

        //   dd($listStudents);
        
        return view('admins.manageStudent.listStudent', compact('listStudents'));
    }
    public function deleteTeacher($id){
        
        $teacher_classes = Teacher_class::where('teacher_id', $id)->get();
        
        foreach ($teacher_classes as $teacher_class){
            $teacher_class->delete();
        }
        
        $teachers = Teacher::find($id)->delete();
        
        $listTeachers = Teacher::all();
        
        return view('admins.manageTeacher.listTeacher', compact('listTeachers'));
    }
    public function addClass(){
        return view('admins.manageClass.addClass');
    }
    public function saveClass(Request $request){
        $class = new Classroom();
        
        $class->level_id = $request->input('level');
        $class->class_code = $request->input('class_code');
        $class->name = $request->input('name');
        $class->start_day= $request->input('start_day');
        $class->end_day = $request->input('end_day');
        $class->fee = $request->input('fee');
        $class->prediction_number = $request->input('prediction_number');
        $class->lessons_number = $request->input('lessons_number');
        $class->actual_number = 0;
        $class->save();

        return redirect()->route('listClass');
    }
        
    public function deleteClass($id){
        
        $teacher_classes=Teacher_class::where('class_id', $id)->get();
        foreach ($teacher_classes as $teacher_class){
            $teacher_class->delete();
        }

        $student_classes = Student_class::where('class_id', $id)->get();
        foreach ($student_classes as $student_class){
            $student_class->delete();
        }

        $fees=Fee::where('class_id', $id)->get();
        foreach ($fees as $fee){
            $fee->delete();
        }

        $classrooms = Classroom::find($id)->delete();

        $listClasses = Classroom::all();
         return view('admins.manageClass.listClass', compact('listClasses'));  
    }
    public function editClass($id){
        //
         $class = Classroom::findOrFail($id);
         return view('admins.manageClass.editClass', compact('class'));
    }
     public function updateClass(Request $request, $id) {
        
        // $class = Classroom::findOrFail($id);
        
        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();
       
        Classroom::find($id)->update($data);
        
        return redirect()->route('listClass');
    }
    public function editStudent($id){
        //
         $student = Student::findOrFail($id);
        //  dd($student);
         return view('admins.manageStudent.editStudent', compact('student'));
    }
     public function updateStudent(Request $request, $id) {
        
        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();
       
        Student::find($id)->update($data);
        
        return redirect()->route('listStudent');
    }
    public function editTeacher($id){
        //
         $teacher = Teacher::findOrFail($id);
        //  dd($student);
         return view('admins.manageTeacher.editTeacher', compact('teacher'));
    }
     public function updateTeacher(Request $request, $id) {
        
        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();
       
        Teacher::find($id)->update($data);
        
        return redirect()->route('listTeacher');
    }
}