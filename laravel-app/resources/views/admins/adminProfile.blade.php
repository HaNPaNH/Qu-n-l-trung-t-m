@extends('auth.layouts')
@section('content')
<div class="container" style="width:50%;">
    <div class="row bg-warning rounded py-3">
        <h3 class="text-center">Profile</h3>
    </div>
    <div class="row border border-warning py-3">
        @if($admin === null)
        <div>
            <p><b>Tên: </b>:</p>
            <p><b>Số điện thoại</b>:</b></p>
        </div>
        @else
        <div>
            <p><b>Tên</b>: {{ $admin->name}}</p>
            <p><b>Số điện thoại</b>: {{ $admin->phone }}</b></p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('updateStudentInformation', $student -> id) }}"><img
                        src="{{asset('assets/download 3.png')}}" alt="Update"></a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection