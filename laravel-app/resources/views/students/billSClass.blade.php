@extends('auth.layouts')
@section('content')
<div class="container" style="width:50%;">
    <h3 class="text-center">BIÊN LAI HỌC PHÍ</h3>
    <div class="row bg-warning my-3">
        @foreach($billSClass as $SClass)
        <div class="border border-black">
            <br>
            <p>Tên học viên: {{ $SClass->student_name }}</p>
            <p>Lớp học: {{ $SClass->class_name }}</p>
            <p>Tổng tiền: {{ $SClass->fee }}</p>
            </p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <!-- <button class="btn btn-light" type="button">Xác nhận đăng ký</button> -->
                <button class="btn btn-light" type="button">Thanh toán ngay</button>
            </div>
            <br>
        </div>
    </div>
    <br>
    <h4 class='text-xxl-end'><a href="{{ route('allSClass') }}" class="text-reset">TẤT CẢ LỚP HỌC >></a></h4>
</div>
@endsection