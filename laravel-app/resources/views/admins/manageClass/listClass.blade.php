@extends('admins.index')
@section('content')
<div class="container pt-5">
    <h2 class="text-center">DANH SÁCH LỚP HỌC</h2>
    <table class="table table-borderless text-center">
        <thead class="table-warning">
            <tr>
                <th>STT</th>
                <th>Mã lớp học</th>
                <th>Tên lớp học</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($listClasses as $index => $listClass)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $listClass->class_code }}</td>
                <td>{{ $listClass->name }}</td>
                <td>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('detailClass', $listClass->id) }}"><img src="{{asset('assets/show.png')}}"
                                alt="Update" width=18px height=18px></a>
                        <a href=""><img src="{{asset('assets/download 3.png')}}" alt="Update"></a>
                        <a href=""><img src="{{asset('assets/download 5.png')}}" alt="Delete"></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection