@extends('auth.layouts')
@section('content')
<div class="container">
    @if(Auth::check() && Auth::user()->role == 1)
    <div class="row bg-warning justify-content-center">
        <div class="card-body">
            <h3 class="text-center py-3">DANH SÁCH LỚP {{$id}}</h3>
            <div class="border">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th>STT</th>
                            <th>Mã học viên</th>
                            <th>Tên học viên</th>
                            <th>
                                <div class="d-grid gap-2 d-md-flex justify-content-md">
                                    <a href="{{ route('attendanceInformation', ['id' => $id]) }}"><img
                                            src="{{asset('assets/attendanceStudent.png')}}" alt="Update" width=30px
                                            height=30px></a>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($listClassStudents as $index => $listClassStudent)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $listClassStudent->student_id }}</td>
                            <td>{{ $listClassStudent->student_name }}</td>
                            <td></td>
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
    @else
    <div class="row bg-warning justify-content-center">
        <div class="card-body">
            <h3 class="text-center py-3">DANH SÁCH LỚP {{$id}}</h3>
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
    <div class="d-grid gap-2 d-md-flex justify-content-md-end py-3">
        <a href="{{ route('studentClass') }}"><button class="btn btn-light">
                <b>LỚP HỌC CỦA TÔI</b>
            </button></a>
        <a href="{{ route('allSClass') }}"><button class="btn btn-light">
                <b>TẤT
                    CẢ LỚP HỌC</b>
            </button></a>
    </div>
    @endif
</div>
@endsection