@extends('auth.layouts')
@section('content')
<h3 class="fw-semibold">LỚP HỌC ĐANG CHỜ</h3>
<div class="container">
  <div class="row bg-warning my-3">
    <div class="col-md-12">
      <div class="course py-3">
        <h4>Mã lớp: 21</h4>
        <p>Tên lớp: Tiếng Nhật căn bản 2</p>
        <p>Ngày khai giảng: 01/11/2023</p>
        <div>
          <status class="btn btn-light">Đang chờ</status>
        </div>
      </div>
    </div>
  </div>
  <h3 class='text-xxl-end'><a href="{{ route('teacherClass') }}" class="text-reset">LỚP HỌC CỦA TÔI >></a></h3>
  <h3 class='text-xxl-end'><a href="{{ route('allTClass') }}" class="text-reset">TẤT CẢ LỚP HỌC >></a></h3>
</div>
@endsection