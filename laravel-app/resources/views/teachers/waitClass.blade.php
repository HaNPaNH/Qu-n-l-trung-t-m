@extends('auth.layouts')
@section('content')
<h3 class="fw-semibold">LỚP HỌC ĐANG CHỜ</h3>
@if($waitClasses->isEmpty())
<div class="alert alert-warning">
    <p>Không có lớp học nào đang chờ</p>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="{{ route('allTClass') }}" class="btn btn-light">Đăng ký ngay</a>
    </div>
</div>
<div class="d-grid gap-2 d-md-flex justify-content-md-end py-3">
    <a href="{{ route('allTClass') }}"><button class="btn btn-light">
            <b>TẤT
                CẢ LỚP HỌC</b>
        </button></a> <a href="{{ route('teacherClass') }}"><button class="btn btn-light">
            <b>LỚP HỌC CỦA TÔI</b>
        </button></a>
</div>
@else
@foreach($waitClasses as $waitClass)
<div class="container">
    <div class="row bg-warning my-3">
        <div class="col-md-12">
            <div class="course py-3">
                <h4>Mã lớp: {{ $waitClass->class_code }}</h4>
                <p>Tên lớp: {{ $waitClass->name}}</p>
                <p>Ngày khai giảng: {{ $waitClass->start_day}}</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn{{ $waitClass->teacherClass_status == 1 ? ' btn-light' : ' btn-danger' }}"
                        disabled>Trạng
                        thái đăng ký:
                        {{ $waitClass->teacherClass_status_text }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<div class="d-grid gap-2 d-md-flex justify-content-md-end py-3">
    <a href="{{ route('allTClass') }}"><button class="btn btn-light">
            <b>TẤT
                CẢ LỚP HỌC</b>
        </button></a> <a href="{{ route('teacherClass') }}"><button class="btn btn-light">
            <b>LỚP DẠY CỦA TÔI</b>
        </button></a>
</div>
@endif
@endsection