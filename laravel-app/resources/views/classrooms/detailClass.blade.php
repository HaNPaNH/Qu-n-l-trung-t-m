@extends('auth.layouts')
@section('content')
<div class="container" style="width:50%;">
    <h3 class="text-center">CHI TIẾT LỚP HỌC</h3>
    <div class="row bg-warning my-3">
        <div class="border border-black">
            <!-- <br> -->
            <p>Mã lớp: {{ $classroom->id }}</p>
            <p>Mã cấp độ: {{ $classroom->level_id }}</p>
            <p>Tên lớp: {{ $classroom->name }}</p>
            <p>Sĩ số: {{ $classroom->actual_number }}</p>
            <p>Ngày khai giảng: {{ $classroom->start_day }}</p>
            <p>Ngày kết thúc: {{ $classroom->end_day }}</p>
            <!-- <br> -->
        </div>
    </div>
    <h4 class='text-xxl-end'><a href="{{ route('allSClass') }}" class="text-reset">TẤT CẢ LỚP HỌC >></a></h4>
</div>
@endsection