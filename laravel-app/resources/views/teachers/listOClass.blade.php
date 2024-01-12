@extends('auth.layouts')
@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="card-body">
        <h3 class="text-center">DANH SÁCH LỚP N1</h3>
        <br><br>
        <div class="border">
            <table class="table">
            <thead class="text-center">
            <tr>
                <th>STT</th>
                <th>Mã học viên</th>
                <th>Tên học viên</th>
            </tr>
            </thead>
            <tbody class="text-center">
            <tr>
                <td>1</td>
                <td>111</td>
                <td>Ngô Phương Anh</td>
            </tr>
            <tr>
                <td>2</td>
                <td>112</td>
                <td>Ngô Phương Anh</td>
            </tr>
            <tr>
                <td>3</td>
                <td>113</td>
                <td>Ngô Phương Anh</td>
            </tr>
            </tbody>
        </table>
        </div>
      </div>
  </div>
</div>
@endsection