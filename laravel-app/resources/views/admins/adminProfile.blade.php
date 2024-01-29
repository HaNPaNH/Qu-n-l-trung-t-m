@extends('admins.index')
@section('content')
<div class="p-5">
    <div class="container rounded bg-white" style="width:20%;">
        <div class="row">
            <div class="p-3">
                <div class="d-flex flex-column align-items-center text-center"><img class="rounded-circle mt-5"
                        width="150px"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                        class="font-weight-bold">
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
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