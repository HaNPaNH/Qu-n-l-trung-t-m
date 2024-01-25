@extends('auth.layouts')
@section('content')
<div class="container" style="width:50%;">
    @if(Auth::check() && Auth::user()->role == 1)
    <div class="row bg-warning">
        <div class=" popup py-3">
            <h4>Bạn đã đăng ký lớp dạy này</h4>
            <p>Vui lòng chọn đăng ký dạy lớp khác.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('allTClass') }}"><button class="btn btn-primary">Quay lại</button></a>
            </div>
        </div>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end py-3">
        <a href="{{ route('teacherClass') }}"><button class=" btn btn-light">
                <b>LỚP DẠY CỦA TÔI</b>
            </button></a>
        <a href="{{ route('waitClass') }}"><button class=" btn btn-light">
                <b>LỚP HỌC ĐANG CHỜ</b>
            </button></a>
    </div>
    @else
    <div class="row bg-warning">
        <div class=" popup py-3">
            <h4>Bạn đã đăng ký lớp học này</h4>
            <p>Vui lòng đăng ký học lớp khác.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('allSClass') }}"><button class="btn btn-primary">Quay lại</button></a>
            </div>
        </div>
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
    @endif
</div>
@endsection