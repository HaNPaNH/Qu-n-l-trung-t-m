@extends('auth.layouts')
@section('content')
<h3 class="fw-semibold">LỚP HỌC CỦA TÔI</h3>
<div class="container">
    @foreach($teacher_classes as $teacher_class)
    <div class="row bg-warning my-3">
        <div class="col-md-12">
            <div class="course py-3">
                <h4>Mã lớp: {{ $teacher_classes->class_id }}</h4>
                <p>Giáo viên: {{ $teacher_classes->teacher_id }}</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('detailClass') }}"><button class="btn btn-light ">Xem chi tiết</button></a>
                    <a href="{{ route('listClass') }}"><button class="btn btn-light">Xem danh sách</button></a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <h3 class='text-xxl-end'><a href="{{ route('allTClass') }}" class="text-reset">TẤT CẢ LỚP HỌC >></a></h3>
</div>
@endsection