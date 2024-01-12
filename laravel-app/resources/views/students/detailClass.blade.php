@extends('auth.layouts')
@section('content')
<div class="container" style="width:50%;">
  <h3 class="text-center">CHI TIẾT LỚP HỌC</h3>
  <div class="row bg-warning">
    <div class="border border-black">
      <br>
      <p>Mã cấp độ: 1</p>
      <p>Mã lớp: 11</p>
      <p>Tên lớp: Tiếng Nhật căn bản 1</p>
      <p>Giáo viên: Trà</p>
      <p>Sĩ số: 10</p>
      <p>Ngày khai giảng: 01/11/2023</p>
      <p>Ngày kết thúc: 01/02/2023</p>
      <br>
    </div>
  </div>
  <br>
  <h4 class='text-xxl-end'><a href="{{ route('allSClass') }}" class="text-reset">TẤT CẢ LỚP HỌC >></a></h4>
</div>
@endsection