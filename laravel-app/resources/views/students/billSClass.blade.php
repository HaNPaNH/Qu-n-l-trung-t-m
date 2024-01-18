@extends('auth.layouts')
@section('content')
<div class="container" style="width:50%;">
    <h3 class="text-center">BIÊN LAI HỌC PHÍ</h3>
    <div class="row bg-warning my-3">
        <div class="border border-black p-3">
            <p><b>Lớp học:</b> {{ $bill->classroom_name }}</p>
            <p><b>Học viên:</b> {{ $bill->student_name }}</p>
            <p><b>Học phí</b>: {{ $bill->fee }}</p>

        </div>
    </div>
    <br>
    <h4 class='text-xxl-end'><a href="{{ route('allSClass') }}" class="text-reset">TẤT CẢ LỚP HỌC >></a></h4>
</div>
@endsection