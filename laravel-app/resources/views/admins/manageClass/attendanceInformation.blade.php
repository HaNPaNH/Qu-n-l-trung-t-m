@extends('admins.index')
@section('content')
<div class="container pt-5">
    <h2 class="text-center">DANH SÁCH ĐIỂM DANH</h2>
    <table class="table table-borderless text-center">
        <thead class="table-warning">
            <tr>
                <th>STT</th>
                <th>Tên học viên</th>
                <th>Ngày</th>
                <th>Điểm danh</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($classAttendances as $index => $classAttendance)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $classAttendance->name }}</td>
                <td>{{ $classAttendance->attendance_day }}</td>
                <td>{{ $classAttendance->has_attendance_text }}</td>
                <td>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('attendanceStudent', $classAttendance->id) }}"><img
                                src="{{asset('assets/attendance.jpg')}}" alt="Update" width=20px height=20px></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection