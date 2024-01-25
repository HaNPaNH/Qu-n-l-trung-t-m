@extends('auth.layouts')
@section('content')
<h3 class="fw-semibold">LỚP HỌC CỦA TÔI</h3>
<div class="container">
    @if($student_classes->isEmpty())
    <div class="alert alert-warning">
        <p>Bạn chưa đăng ký lớp học nào.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('allSClass') }}" class="btn btn-light">Đăng ký ngay</a>
        </div>
    </div>
    @else
    @foreach($student_classes as $student_class)
    <div class="row bg-warning my-3">
        <div class="col-md-12">
            <div class="course py-3">
                <h4>Mã lớp: {{ $student_class->class_code }}</h4>
                <p>Tên lớp: {{ $student_class->name }}</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn{{ $student_class->paid_status == 1 ? ' btn-success' : ' btn-light' }}"
                        disabled>Trạng thái học phí:
                        {{$student_class->paid_status_text}}</button>
                    <a href="{{ route('detailClass', $student_class->class_id ) }}"><button class="btn btn-light">Xem
                            chi tiết</button></a>
                    <a href="{{ route('listSClass', $student_class->class_id) }}"><button class="btn btn-light">Xem
                            danh sách</button></a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
    <div class="d-grid gap-2 d-md-flex justify-content-md-end py-3">
        <a href="{{ route('allSClass') }}"><button class="btn btn-light">
                <b>TẤT
                    CẢ LỚP HỌC</b>
            </button></a>
    </div>
</div>
@endsection