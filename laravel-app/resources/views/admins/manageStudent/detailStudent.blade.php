@extends('admins.index')
@section('content')
<!-- <p>{{$detailStudent->id}}</p>
<p>{{$detailStudent->name}}</p> -->
<style>
td:first-child {
    width: 30%;
}
</style>
<div class="container pt-5">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href=""><img src="{{asset('assets/download 3.png')}}" alt="Update"></a>
        <a href=""><img src="{{asset('assets/download 5.png')}}" alt="Delete"></a>
    </div>
    <h2 class="text-center">THÔNG TIN CHI TIẾT</h2>
    <table class="table text-center">
        <tbody>
            <tr>
                <td class="table-warning"><b>Mã học viên</b></td>
                <td>{{$detailStudent->id}}</td>
            </tr>
            <tr>
                <td class="table-warning"><b>Tên học viên</b></td>
                <td>{{$detailStudent->name}}</td>
            </tr>
            <tr>
                <td class="table-warning"><b>Mã cấp độ</b></td>
                <td>{{$detailStudent->level_id}}</td>
            </tr>
            <tr>
                <td class="table-warning"><b>Ngày sinh</b></td>
                <td>{{$detailStudent->birthday}}</td>
            </tr>
            <tr>
                <td class="table-warning"><b>Nhà</b></td>
                <td>{{$detailStudent->home}}</td>
            </tr>
            <tr>
                <td class="table-warning"><b>Địa chỉ thường trú</b></td>
                <td>{{$detailStudent->address}}</td>
            </tr>
            <tr>
                <td class="table-warning"><b>Số điện thoại</b></td>
                <td>{{$detailStudent->phone}}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection