@extends('auth.layouts')
@section('content')
<div class="container" style="width:50%;">
    <h3 class="text-center">CHI TIẾT LỚP HỌC {{$classroom->id}}</h3>
    <div class="row bg-warning my-3">
        <div class="border border-black p-3">
            <p><b>Mã lớp</b>: {{ $classroom->class_code }}</p>
            <p><b>Mã cấp độ</b>: {{ $classroom->level_id }}</p>
            <p><b>Tên lớp</b>: {{ $classroom->name }}</p>
            <p><b>Sĩ số</b>: {{ $classroom->actual_number }}</p>
            <p><b>Ngày khai giảng</b>: {{ $classroom->start_day }}</b></p>
            <p><b>Ngày kết thúc</b>: {{ $classroom->end_day }}</b></p>
        </div>
    </div>
    @if(Auth::check() && Auth::user()->role == 1)
    <div class="d-grid gap-2 d-md-flex justify-content-md-end py-3">
        <a href="{{ route('allTClass') }}"><button class="btn btn-light">
                <b>TẤT CẢ LỚP HỌC</b>
            </button></a>
        <a href="{{ route('waitClass') }}"><button class="btn btn-light">
                <b>LỚP HỌC ĐANG CHỜ</b>
            </button></a>
        <a href="{{ route('teacherClass') }}"><button class="btn btn-light">
                <b>LỚP DẠY CỦA TÔI</b>
            </button></a>
    </div>
    @else
    <div class="d-grid gap-2 d-md-flex justify-content-md-end py-3">
        <a href="{{ route('allSClass') }}"><button class="btn btn-light">
                <b>TẤT CẢ LỚP HỌC</b>
            </button></a>
        <a href="{{ route('studentClass') }}"><button class="btn btn-light">
                <b>LỚP HỌC CỦA TÔI</b>
            </button></a>
    </div>
    @endif
</div>
@endsection