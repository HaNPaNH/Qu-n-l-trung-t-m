@extends('auth.layouts')
@section('content')
<div class="container bg-warning" style="width:50%;">
    <div class="popup py-3">
        <h4>Xác nhận đăng ký lớp học</h4>
        <p>Bạn có chắc chắn muốn đăng ký lớp học này?</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('confirmRegister', $classroom->id )}}"><button class=" btn btn-success">Xác
                    nhận</button></a>
            <a href="{{ route('cancelRegister') }}"><button class="btn btn-danger">Hủy bỏ</button></a>
        </div>
    </div>
</div>
@endsection