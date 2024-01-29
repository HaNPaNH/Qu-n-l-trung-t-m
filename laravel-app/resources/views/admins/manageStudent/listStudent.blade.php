@extends('admins.index')
@section('content')
<div>
    <div class="container py-5">
        <h2 class="text-center">DANH SÁCH HỌC SINH</h2>
        <table class="table table-borderless text-center">
            <thead class="table-warning">
                <tr>
                    <th>STT</th>
                    <th>Mã học viên</th>
                    <th>Họ và tên</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($listStudents as $index => $listStudent)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $listStudent->id }}</td>
                    <td>{{ $listStudent->name }}</td>
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('billStudentClass', $listStudent->id) }}"><img
                                    src="{{asset('assets/download 19.png')}}" alt="Bill"></a>
                        </div>
                    </td>
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('detailStudent', $listStudent->id) }}"><img
                                    src="{{asset('assets/show.png')}}" alt="Show" width=18px height=18px></a>
                            <a href="{{ route('updateStudent', $listStudent->id) }}"><img
                                    src="{{asset('assets/download 3.png')}}" alt="Update"></a>
                            <a href="{{ route('deleteStudent', $listStudent->id) }}"><img
                                    src="{{asset('assets/download 5.png')}}" alt="Delete"></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection