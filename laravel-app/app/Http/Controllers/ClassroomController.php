<?php

namespace App\Http\Controllers;
use App\Models\Classroom;
use App\Models\Fee;
use App\Models\Student;
use App\Models\User;
use App\Models\Student_class;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{    
    public function listSClass()
    {
        $listSClass = Classroom::join('student_classes', 'student_classes.class_id', '=', 'classrooms.id')
            ->join('students', 'students.student_id', '=', 'student_classes.student_id')
            ->select('students.student_id', 'students.name', 'student_classes.id')
            ->get();
        return view('classrooms.listSClass', ['data' => $listSClass]);
    }
    public function detailClass($id)
    {
         $classroom = Classroom::findOrFail($id);
     //     dd($classroom);
         return view('classrooms.detailClass', compact('classroom'));
    }
    public function registerSClass($id)
    {
        $classroom = Classroom::find($id);
        if ($classroom->actual_number < $classroom->prediction_number) {
            // Hiển thị popup xác nhận đăng ký
            return view('classrooms.registerStudent', ['classroom' => $classroom]);
        } 
            // Hiển thị popup thông báo đã đủ số lượng đăng ký
        return view('classrooms.fullStudentClass', ['classroom' => $classroom]);
    }
    
    public function confirmRegister($id)
    {
        // Lấy thông tin người dùng đăng nhập
        // $userId = Auth::user()->id;
        // $user = User::find($id);
        // $user_id = $user->id;
        
        $student= Student::where('students.user_id', '=', Auth::id())
        ->select('students.*')
        ->first();
        
        // Lấy thông tin lớp học
        $classroom = Classroom::find($id);
        
        // Thực hiện đăng ký lớp học
        Student_class::create([
            'student_id' => $student->id,
            'class_id' => $classroom->id,
        ]);
        
        // Tăng actual_number của lớp học
        $classroom->actual_number += 1;
        $classroom->save();

        // Thêm dữ liệu vào bảng fees
        $fee = new Fee();
        $fee->student_id = $student->id;
        $fee->class_id = $id;
        $fee->save();
                  
        return redirect()->route('billSClass'); // Chuyển hướng đến trang hóa đơn
    }
    public function cancelRegister()
    {
        // Thực hiện logic hủy đăng ký lớp học
        return redirect()->route('allSClass'); // Quay lại trang hiện tại
    } 
}