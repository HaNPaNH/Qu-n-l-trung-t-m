@extends('auth.layouts')
@section('content')
<div class="container">
    <div class="row bg-warning justify-content-center">
        <div class="card-body">
            <h3 class="text-center py-3">DANH SÁCH ĐIỂM DANH LỚP {{$id}}</h3>
            <div class="border">
                <table class="table text-center">
                    <thead class="">
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
                                <div class="d-grid gap-2 d-md-flex justify-content-md">
                                    <a href="{{ route('attendanceStudent', $classAttendance->id) }}"><img
                                            src="{{asset('assets/attendance.jpg')}}" alt="Update" width=30px
                                            height=30px></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end py-3">
        <a href="{{ route('allTClass') }}"><button class="btn btn-light">
                <b>TẤT CẢ LỚP HỌC</b>
            </button></a>
        <a href="{{ route('waitClass') }}"><button class="btn btn-light">
                <b>LỚP HỌC ĐANG CHỜ</b>
            </button></a>
        <a href="{{ route('teacherClass') }}"><button class="btn btn-light">
                <b>LỚP DẠY CỦA TÔI</b>
            </button></a>
    </div>
</div>
@endsection