@extends('auth.layouts')
@section('content')
<h3 class="fw-semibold">TẤT CẢ LỚP HỌC</h3>
<div class="container">
    @foreach($classrooms as $classroom)
    <div class="row bg-warning my-3">
        <div class="col-md-12">
            <div class="course py-3">
                <h4>Mã lớp: {{ $classroom->id }}</h4>
                <p>Tên lớp: {{ $classroom->name }}</p>
                <p>Ngày khai giảng: {{ $classroom->start_day }}</p>
                <div>
                    <a href="/detailClass/{{ $classroom->id }}"><button class="btn btn-light ">Xem chi tiết</button></a>
                    <button class="btn btn-light disabled">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <h3 class='text-xxl-end'><a href="{{ route('teacherClass') }}" class="text-reset">LỚP DẠY CỦA TÔI >></a></h3>
</div>
@endsection