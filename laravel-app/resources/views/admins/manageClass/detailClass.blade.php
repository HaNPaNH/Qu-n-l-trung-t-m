@extends('admins.index')
@section('content')
<style>
td:first-child {
    width: 30%;
}
</style>
<div class="container pt-5">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="{{ route('updateClass', $detailClass->id) }}"><img src="{{asset('assets/download 3.png')}}"
                alt="Update"></a>
        <a href="{{ route('deleteClass', $detailClass->id) }}"><img src="{{asset('assets/download 5.png')}}"
                alt="Delete"></a>
    </div>
    <h2 class="text-center">THÔNG TIN CHI TIẾT</h2>
    <table class="table text-center">
        <tbody>
            <tr>
                <td class="table-warning"><b>Mã lớp học</b></td>
                <td>{{$detailClass->class_code}}</td>
            </tr>
            <tr>
                <td class="table-warning"><b>Tên lớp học</b></td>
                <td>{{$detailClass->name}}</td>
            </tr>
            <tr>
                <td class="table-warning"><b>Mã cấp độ</b></td>
                <td>{{$detailClass->level_id}}</td>
            </tr>
            <tr>
                <td class="table-warning"><b>Ngày bắt đầu</b></td>
                <td>{{$detailClass->start_day}}</td>
            </tr>
            <tr>
                <td class="table-warning"><b>Ngày kết thúc</b></td>
                <td>{{$detailClass->end_day}}</td>
            </tr>
            <tr>
                <td class="table-warning"><b>Học phí</b></td>
                <td>{{$detailClass->fee}}</td>
            </tr>
            <tr>
                <td class="table-warning"><b>Số học viên dự kiến</b></td>
                <td>{{$detailClass->prediction_number}}</td>
            </tr>
            <tr>
                <td class="table-warning"><b>Số học viên thực tế</b></td>
                <td>{{$detailClass->actual_number}}</td>
            </tr>
            <tr>
                <td class="table-warning"><b>Số buổi học</b></td>
                <td>{{$detailClass->lessons_number}}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection