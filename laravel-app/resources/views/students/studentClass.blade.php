@extends('auth.layouts')
@section('content')
<h3 class="fw-semibold">LỚP HỌC CỦA TÔI</h3>
<div class="container">
  <div class="row bg-warning">
    <div class="col-md-12">
    <br>
      <div class="course">
        <h4>Tiếng Nhật căn bản 1</h4>
        <p>Giáo viên: Nguyễn Thanh Trà</p>
         <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a href="{{ route('detailClass') }}"><button class="btn btn-light ">Xem chi tiết</button></a>
          <a href="{{ route('listOClass') }}"><button class="btn btn-light ">Xem danh sách</button></a>
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
        <h4>Tiếng Nhật căn bản 2</h4>
        <p>Giáo viên: Nguyễn Thanh Trà</p>
         <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a href="{{ route('detailClass') }}"><button class="btn btn-light ">Xem chi tiết</button></a>
          <a href="{{ route('listOClass') }}"><button class="btn btn-light ">Xem danh sách</button></a>
        </div>
        <br>
      </div>
    </div>
  </div>
  <br>
  <h3 class='text-xxl-end'><a href="{{ route('allSClass') }}" class="text-reset">TẤT CẢ LỚP HỌC >></a></h3>
</div>
@endsection