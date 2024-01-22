@extends('auth.layouts')
@section('content')
<h3 class="fw-semibold">LỚP HỌC CỦA TÔI</h3>
<div class="container">
    <div class="alert alert-warning">
        <p>Bạn chưa đăng ký lớp học nào.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('allSClass') }}" class="btn btn-light">Đăng ký ngay</a>
        </div>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end py-3">
        <a href="{{ route('allSClass') }}"><button class="btn btn-light">
                <b>TẤT
                    CẢ LỚP HỌC >></b>
            </button></a>
    </div>
</div>
@endsection