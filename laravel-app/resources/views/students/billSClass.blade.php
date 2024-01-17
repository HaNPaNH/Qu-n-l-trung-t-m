@extends('auth.layouts')
@section('content')
<div class="container" style="width:50%;">
    <h3 class="text-center">BIÊN LAI HỌC PHÍ</h3>
    <div class="row bg-warning my-3">
        <div class="border border-black p-3">
            <p>Lớp học: {{ $bill->classroom_name }}</p>
            <p>Học viên: {{ $bill->student_name }}</p>
            <p>Học phí: {{ $bill->fee }}</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <!-- <button class="btn btn-light" type="button">Xác nhận đăng ký</button> -->
                <button class="btn btn-light" type="button">Thanh toán ngay</button>
            </div>
        </div>
    </div>
    <br>
    <h4 class='text-xxl-end'><a href="{{ route('allSClass') }}" class="text-reset">TẤT CẢ LỚP HỌC >></a></h4>
</div>
@endsection