@extends('auth.layouts')
@section('content')
<div class="container bg-warning" style="width:50%;">
    <div class="popup py-3">
        <h4>Xác nhận đăng ký lớp dạy</h4>
        <p>Bạn có chắc chắn muốn dạy lớp này?</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('confirmTeacherRegister', ['classId' => $classId] )}}"><button
                    class=" btn btn-success">Xác
                    nhận</button></a>
            <a href="{{ route('allTClass') }}"><button class="btn btn-danger">Hủy bỏ</button></a>
        </div>
    </div>
</div>
@endsection