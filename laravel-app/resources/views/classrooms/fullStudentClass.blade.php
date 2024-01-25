@extends('auth.layouts')
@section('content')
<div class="container bg-warning" style="width:50%;">
    <div class="popup py-3">
        <h4>Lớp học đã đủ số lượng đăng ký</h4>
        <p>Xin lỗi, lớp học này đã đủ số lượng đăng ký. Vui lòng chọn lớp học khác.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('allSClass') }}"><button class="btn btn-primary">Quay lại</button></a>
        </div>
    </div>
</div>
@endsection