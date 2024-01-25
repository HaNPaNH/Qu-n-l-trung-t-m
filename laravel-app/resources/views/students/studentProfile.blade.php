@extends('auth.layouts')
@section('content')
<div class="container" style="width:50%;">
    <div class="row bg-warning rounded py-3">
        <h3 class="text-center">Profile</h3>
    </div>
    <div class="row border border-warning py-3">
        @if($student === null)
        <div>
            <p><b>Tên học viên</b>:</p>
            <p><b>Nhà</b>:</p>
            <p><b>Ngày sinh</b>:</p>
            <p><b>Địa chỉ thường trú</b>:</p>
            <p><b>Số điện thoại</b>:</b></p>
        </div>
        @else
        <div>
            <p><b>Tên học viên</b>: {{ $student->name}}</p>
            <p><b>Nhà</b>: {{ $student->home }}</p>
            <p><b>Ngày sinh</b>: {{ $student->birthday }}</p>
            <p><b>Địa chỉ thường trú</b>: {{ $student->address }}</p>
            <p><b>Số điện thoại</b>: {{ $student->phone }}</b></p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('updateStudentInformation', $student -> id) }}"><img
                        src="{{asset('assets/download 3.png')}}" alt="Update"></a>
            </div>
        </div>
        @endif
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end py-3">
        <a href="{{ route('studentClass') }}"><button class="btn btn-light">
                <b>LỚP HỌC CỦA TÔI</b>
            </button></a>
        <a href="{{ route('allSClass') }}"><button class="btn btn-light">
                <b>TẤT
                    CẢ LỚP HỌC</b>
            </button></a>
    </div>
</div>
@endsection