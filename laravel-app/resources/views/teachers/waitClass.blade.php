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
@else
@foreach($waitClasses as $waitClass)
<div class="container">
    <div class="row bg-warning my-3">
        <div class="col-md-12">
            <div class="course py-3">
                <h4>Mã lớp: 21</h4>
                <p>Tên lớp: Tiếng Nhật căn bản 2</p>
                <p>Ngày khai giảng: 01/11/2023</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn{{ $waitClass->teacherClass_status_text == 1 ? ' btn-success' : ' btn-light' }}"
                        disabled>Trạng
                        thái đăng ký:
                        {{$waitClass->teacherClass_status}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<div class="d-grid gap-2 d-md-flex justify-content-md-end py-3">
    <a href="{{ route('allTClass') }}"><button class="btn btn-light">
            <b>TẤT
                CẢ LỚP HỌC >></b>
        </button></a>
</div>
<div class="d-grid gap-2 d-md-flex justify-content-md-end py-3">
    <a href="{{ route('teacherClass') }}"><button class="btn btn-light">
            <b>LỚP HỌC CỦA TÔI >></b>
        </button></a>
</div>
@endif
@endsection