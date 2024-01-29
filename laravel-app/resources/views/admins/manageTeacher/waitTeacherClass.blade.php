@extends('admins.index')
@section('content')
<div>
    <div class="container py-3" style="width:50%;">
        @foreach($waitTeacherClasses as $waitTeacherClass)
        <div class="popup py-3">
            <p><b>Mã lớp:</b> {{ $waitTeacherClass->class_code }}</p>
            <p><b>Tên lớp:</b> {{ $waitTeacherClass->class_name }}</p>
            <p><b>Giáo viên:</b> {{ $waitTeacherClass->teacher_name }}</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a
                    href="{{ route('acceptTeacherRegister', ['id' => $waitTeacherClass->id, 'class_id' => $waitTeacherClass->class_id]) }}"><button
                        class=" btn btn-success">Xác
                        nhận</button></a>
                <a href="{{ route('refuseTeacherRegister', $waitTeacherClass->id )}}"><button class="btn btn-danger">Từ
                        chối</button></a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection