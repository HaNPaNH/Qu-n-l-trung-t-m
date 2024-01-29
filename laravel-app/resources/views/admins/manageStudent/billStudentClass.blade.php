@extends('admins.index')
@section('content')
@foreach($billStudentClasses as $billStudentClass)
<div class="container py-3" style="width:50%;">
    <div class="popup">
        <p><b>Tên học viên:</b> {{ $billStudentClass->student_name }}</p>
        <p><b>Mã lớp:</b> {{ $billStudentClass->class_code }}</p>
        <p><b>Tên lớp:</b> {{ $billStudentClass->class_name }}</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('confirmPayment', $billStudentClass->id )}}"><button class=" btn btn-success">Xác
                    nhận thanh toán</button></a>
        </div>
    </div>
</div>
@endforeach
@endsection