@extends('auth.layouts')
@section('content')
<div class="container" style="width:50%;">
  <h3 class="text-center">BIÊN LAI HỌC PHÍ</h3>
  <div class="row bg-warning">
    <div class="border border-black">
      <br>
      <p>Tên học viên: Ngô Phương Anh</p>
      <p>Lớp học: Tiếng Nhật căn bản 2</p>
      <p>Nội dung: Thanh toán tiền học phí</p>
      <p>Tổng tiền: 170.000</p></p>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn btn-light" type="button">Xác nhận đăng ký</button>
        <button class="btn btn-light" type="button">Thanh toán ngay</button>
      </div>
      <br>
    </div>
  </div>
  <br>
  <h4 class='text-xxl-end'><a href="{{ route('allSClass') }}" class="text-reset">TẤT CẢ LỚP HỌC >></a></h4>
</div>
@endsection

