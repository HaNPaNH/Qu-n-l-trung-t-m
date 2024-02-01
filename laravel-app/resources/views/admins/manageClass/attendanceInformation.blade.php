@extends('admins.index')
@section('content')
<div class="container pt-5">
    <h2 class="text-center">DANH SÁCH ĐIỂM DANH LỚP {{$id}}</h2>
    <table class="table table-borderless text-center">
        <thead class="table-warning">
            <tr>
                <th>STT</th>
                <th>Tên học viên</th>
                <th>Ngày</th>
                <th>Điểm danh</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classAttendances as $index => $classAttendance)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $classAttendance->name }}</td>
                <td>{{ $classAttendance->attendance_day }}</td>
                <td>{{ $classAttendance->has_attendance_text }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection