@extends('admins.index')
@section('content')
<div class="container py-5">
    <h2 class="text-center">DANH SÁCH GIÁO VIÊN</h2>
    <table class="table table-borderless text-center">
        <thead class="table-warning">
            <tr>
                <th>STT</th>
                <th>Mã giáo viên</th>
                <th>Họ và tên</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($listTeachers as $index => $listTeacher)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $listTeacher->id }}</td>
                <td>{{ $listTeacher->name }}</td>
                <td>
                    <a href="{{ route('waitTeacherClass', $listTeacher->id) }}"><button class="btn btn-light">
                            LỚP HỌC ĐANG CHỜ
                        </button></a>
                </td>
                <td>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('detailTeacher', $listTeacher->id) }}"><img src="{{asset('assets/show.png')}}"
                                alt="Update" width=18px height=18px></a>
                        <a href="{{ route('updateTeacher', $listTeacher->id) }}"><img
                                src="{{asset('assets/download 3.png')}}" alt="Update"></a>
                        <a href="{{ route('deleteTeacher', $listTeacher->id) }}"><img
                                src="{{asset('assets/download 5.png')}}" alt="Delete"></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection