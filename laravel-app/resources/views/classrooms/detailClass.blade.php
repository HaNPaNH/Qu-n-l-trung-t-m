@extends('auth.layouts')
@section('content')
<div class="container" style="width:50%;">
    <h3 class="text-center">CHI TIẾT LỚP HỌC</h3>
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
    <h4 class='text-xxl-end'><a href="{{ route('allSClass') }}" class="text-reset">TẤT CẢ LỚP HỌC >></a></h4>
</div>
@endsection