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
                        <tr>
                            <td>{{ $SClass->STT }}</td>
                            <td>{{ $SClass->student_id }}</td>
                            <td>{{ $SClass->student_name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection