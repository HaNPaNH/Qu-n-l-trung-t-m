@extends('auth.layouts')
@section('content')
<div class="container" style="width:50%;">
    <div class="row bg-warning rounded py-3">
        <h3 class="text-center">Profile</h3>
    </div>
    <div class="row border border-warning py-3">
        <div>
            <p><b>Tên học viên</b>: {{ $student->name}}</p>
            <p><b>Nhà</b>: {{ $student->home }}</p>
            <p><b>Ngày sinh</b>: {{ $student->birthday }}</p>
            <p><b>Địa chỉ thường trú</b>: {{ $student->address }}</p>
            <p><b>Số điện thoại</b>: {{ $student->phone }}</b></p>
        </div>
    </div>
</div>
@endsection