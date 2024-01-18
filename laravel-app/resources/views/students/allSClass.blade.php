@extends('auth.layouts')
@section('content')
<h3 class="fw-semibold">TẤT CẢ LỚP HỌC</h3>
<div class="container">
    @foreach($classrooms as $classroom)
    <div class="row bg-warning my-3">
        <div class="col-md-12">
            <div class="course py-3">
                <h4>Mã lớp: {{ $classroom->class_code }}</h4>
                <p>Tên lớp: {{ $classroom->name }}</p>
                <p>Ngày khai giảng: {{ $classroom->start_day }}</p>
                <!-- <p>Số lượng dự đoán: {{ $classroom->prediction_number }}</p>
                <p>Số lượng thực tế: {{ $classroom->actual_number }}</p> -->
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="/detailClass/{{ $classroom->id }}"><button class="btn btn-light ">Xem chi tiết</button></a>
                    <!-- <a href="/registerSClass/{{ $classroom->id }}"><button type="button" class="btn btn-light">Đăng
                            ký</button></a> -->
                    <a href="{{ route('checkStudentClass', $classroom->id) }}">
                        <button type="button" class="btn btn-light">Đăng ký</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <h3 class='text-xxl-end'><a href="{{ route('studentClass') }}" class="text-reset">LỚP HỌC CỦA TÔI >></a></h3>
</div>
@endsection