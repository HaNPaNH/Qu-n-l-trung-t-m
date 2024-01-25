@extends('admins.index')
@section('content')
@foreach($billStudentClasses as $billStudentClass)
<br><br>
<div class="container bg-warning" style="width:50%;">
    <div class="popup py-3">
        <p>Tên học viên: {{ $billStudentClass->student_name }}</p>
        <p>Mã lớp: {{ $billStudentClass->class_code }}</p>
        <p>Tên lớp: {{ $billStudentClass->class_name }}</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('confirmPayment', $billStudentClass->id )}}"><button class=" btn btn-success">Xác
                    nhận thanh toán</button></a>
        </div>
    </div>
</div>
@endforeach
@endsection