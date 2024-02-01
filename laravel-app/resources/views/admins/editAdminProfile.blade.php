@extends('admins.index')
@section('content')
<div class="p-5">
    <div class="container rounded bg-white">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px" src="{{asset('assets/admin.png')}}"><span class="font-weight-bold">
                </div>
            </div>
            <div class="col-md-8 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4>Profile Settings<h4>
                    </div>
                    <form method="POST" action="{{ route('updateAdminProfile', $admin->id) }}">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Name</label><input type="text"
                                    class="form-control" placeholder="enter name" id="name" class="form-control"
                                    name="name" value="{{ $admin->name }}">
                            </div>
                            <div class="col-md-12"><label class="labels">Phone</label><input type="number"
                                    class="form-control" placeholder="enter phone number" id="phone" class="
                                    form-control" name="phone" value="{{ $admin->phone }}">
                                @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save
                                Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection