@extends('auth.layouts')
@section('content')
<h3 class="fw-semibold">LỚP HỌC CỦA TÔI</h3>
<div class="container">
    @foreach($student_classes as $student_class)
    <div class="row bg-warning my-3">
        <div class="col-md-12">
            <div class="course py-3">
                <h4>Mã lớp: {{ $student_class->class_id }}</h4>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('detailClass', $student_class->class_id ) }}"><button class="btn btn-light ">Xem
                            chi tiết</button></a>
                    <a href="{{ route('listSClass', $student_class->class_id) }}"><button class="btn btn-light ">Xem
                            danh sách</button></a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <h3 class='text-xxl-end'><a href="{{ route('allSClass') }}" class="text-reset">TẤT CẢ LỚP HỌC >></a></h3>
</div>
@endsection