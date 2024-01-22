@extends('auth.layouts')
@section('content')
<h3 class="fw-semibold">LỚP HỌC CỦA TÔI</h3>
<div class="container">
    @if($teacher_classes->isEmpty())
    <div class="alert alert-warning">
        <p>Bạn chưa đăng ký dạy lớp nào.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('allSClass') }}" class="btn btn-light">Đăng ký ngay</a>
        </div>
    </div>
    @else
    @foreach($teacher_classes as $teacher_class)
    <div class="row bg-warning my-3">
        <div class="col-md-12">
            <div class="course py-3">
                <h4>Mã lớp: {{ $teacher_class->class_code }}</h4>
                <p>Giáo viên: {{ $teacher_class->teacher_id }}</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('detailClass', $teacher_class->class_id ) }}"><button class="btn btn-light ">Xem
                            chi tiết</button></a>
                    <a href="{{ route('listSClass', $teacher_class->class_id) }}"><button class="btn btn-light">Xem danh
                            sách</button></a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
    <div class="d-grid gap-2 d-md-flex justify-content-md-end py-3">
        <a href="{{ route('allTClass') }}"><button class="btn btn-light">
                <b>TẤT CẢ LỚP HỌC >></b>
            </button></a>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end py-3">
        <a href="{{ route('waitClass') }}"><button class="btn btn-light">
                <b>LỚP HỌC ĐANG CHỜ</b>
            </button></a>
    </div>
</div>
@endsection