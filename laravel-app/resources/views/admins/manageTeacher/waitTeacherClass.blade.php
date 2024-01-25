@extends('admins.index')
@section('content')
@foreach($waitTeacherClasses as $waitTeacherClass)
<br><br>
<div class="container bg-warning" style="width:50%;">
    <div class="popup py-3">
        <p>Mã lớp: {{ $waitTeacherClass->class_code }}</p>
        <p>Tên lớp: {{ $waitTeacherClass->class_name }}</p>
        <p>Giáo viên: {{ $waitTeacherClass->teacher_name }}</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('acceptTeacherRegister', $waitTeacherClass->id )}}"><button class=" btn btn-success">Xác
                    nhận</button></a>
            <a href="{{ route('refuseTeacherRegister', $waitTeacherClass->id )}}"><button class="btn btn-danger">Từ
                    chối</button></a>
        </div>
    </div>
</div>
@endforeach
@endsection