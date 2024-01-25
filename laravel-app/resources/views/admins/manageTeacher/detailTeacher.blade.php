@extends('admins.index')
@section('content')
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
                <td class="table-warning"><b>Mã giáo viên</b></td>
                <td>{{$detailTeacher->id}}</td>
            </tr>
            <tr>
                <td class="table-warning"><b>Tên giáo viên</b></td>
                <td>{{$detailTeacher->name}}</td>
            </tr>
            <tr>
                <td class="table-warning"><b>Nhà</b></td>
                <td>{{$detailTeacher->workplace}}</td>
            </tr>
            <tr>
                <td class="table-warning"><b>Địa chỉ thường trú</b></td>
                <td>{{$detailTeacher->address}}</td>
            </tr>
            <tr>
                <td class="table-warning"><b>Số điện thoại</b></td>
                <td>{{$detailTeacher->phone}}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection