@extends('auth.layouts')
@section('content')
<div class="container bg-warning">
    <div class="row justify-content-center">
        <div class="card-body">
            <h3 class="text-center py-3">DANH SÁCH LỚP</h3>
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
                        @foreach($listClassStudents as $index => $listClassStudent)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $listClassStudent->student_id }}</td>
                            <td>{{ $listClassStudent->student_name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection