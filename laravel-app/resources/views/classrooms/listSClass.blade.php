@extends('auth.layouts')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            <h3 class="text-center">DANH SÁCH LỚP</h3>
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
                        @foreach($listSClass as $SClass)
                        <p>STT: {{ $SClass->STT }}</p>
                        <p>Student ID: {{ $SClass->student_id }}</p>
                        <p>Name: {{ $SClass->name }}</p>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection