@extends('auth.layouts')
@section('content')
<h3 class="fw-semibold">TẤT CẢ LỚP HỌC</h3>
<div class="container">
  <div class="row bg-warning">
    <div class="col-md-12">
    <br>
      <div class="course">
        <h4>Mã lớp: 11</h4>
        <p>Tên lớp: Tiếng Nhật căn bản 1</p>
        <p>Ngày khai giảng: 01/11/2023</p>
        <div>
          <button class="btn btn-light disabled">Đăng ký</button>
        </div>
        <br>
      </div>
    </div>
  </div>
  <br>
  <div class="row bg-warning">
    <div class="col-md-12">
    <br>
      <div class="course">
        <h4>Mã lớp: 21</h4>
        <p>Tên lớp: Tiếng Nhật căn bản 2</p>
        <p>Ngày khai giảng: 01/11/2023</p>
        <div>
          <a href="{{ route ('waitClass') }}"><button class="btn btn-light">Đăng ký</button></a>
        </div>
        <br>
      </div>
    </div>
  </div>
  <br>
  <h3 class='text-xxl-end'><a href="{{ route('teacherClass') }}" class="text-reset">LỚP DẠY CỦA TÔI >></a></h3>
</div>
@endsection