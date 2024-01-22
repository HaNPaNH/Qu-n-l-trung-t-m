@extends('auth.layouts')
@section('content')
<div class="container" style="width:50%;">
    <div class="row bg-warning rounded py-3">
        <h3 class="text-center">Profile</h3>
    </div>
    <div class="row border border-warning py-3">
        @if($teacher === null)
        <div>
            <p><b>Tên giáo viên</b>:</p>
            <p><b>Nhà</b>:</p>
            <p><b>Ngày sinh</b>:</p>
            <p><b>Địa chỉ thường trú</b>:</p>
            <p><b>Số điện thoại</b>:</b></p>
        </div>
        @else
        <div>
            <p><b>Tên học viên</b>: {{ $teacher->name}}</p>
            <p><b>Nơi làm việc</b>: {{ $teacher->workplace }}</p>
            <p><b>Địa chỉ thường trú</b>: {{ $teacher->address }}</p>
            <p><b>Số điện thoại</b>: {{ $teacher->phone }}</b></p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('updateTeacherInformation', $teacher -> id) }}"><img
                        src="{{asset('assets/download 3.png')}}" alt="Update"></a>
            </div>
        </div>
        @endif
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end py-3">
        <a href="{{ route('teacherClass') }}"><button class="btn btn-light">
                <b>LỚP HỌC CỦA TÔI >></b>
            </button></a>
    </div>
</div>
@endsection