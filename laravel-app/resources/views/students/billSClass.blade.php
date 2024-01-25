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
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="{{ route('studentClass') }}"><button class="btn btn-light">
                <b>LỚP HỌC CỦA TÔI</b>
            </button></a>
    </div>
</div>
@endsection