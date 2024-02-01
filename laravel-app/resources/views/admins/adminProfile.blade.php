@extends('admins.index')
@section('content')
<div class="p-5">
    <div class="container rounded bg-white" style="width:20%;">
        <div class="row">
            <div class="p-3">
                <div class="d-flex flex-column align-items-center text-center"><img class="rounded-circle mt-5"
                        width="150px" src="{{asset('assets/admin.png')}}"><span class="font-weight-bold">
                </div>
                <div class='text-center'>
                    <h4>Profile Settings</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <p><b>Tên: </b>{{ $admin->name}}</p>
                    </div>
                    <div class="col-md-12">
                        <p><b>Số điện thoại: </b>{{ $admin->phone}}</p>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('updateAdminProfile', $admin -> id) }}"><img
                                src="{{asset('assets/download 3.png')}}" alt="Update"></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection