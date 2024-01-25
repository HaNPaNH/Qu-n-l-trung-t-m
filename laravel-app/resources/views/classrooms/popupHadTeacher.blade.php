@extends('auth.layouts')
@section('content')
<div class="container bg-warning" style="width:50%;">
    <div class="popup py-3">
        <h4>Lớp đã có giáo viên dạy</h4>
        <p>Xin lỗi, lớp học này đã có giáo viên trước đó. Vui lòng chọn đăng ký dạy lớp khác.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('allTClass') }}"><button class="btn btn-primary">Quay lại</button></a>
        </div>
    </div>
</div>
@endsection