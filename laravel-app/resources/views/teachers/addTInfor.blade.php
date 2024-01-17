@extends('auth.layouts')
@section('content')
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Fill your information</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('addSInfor') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="name" id="name" class="form-control" name="name"
                                    required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="address" id="address" class="form-control"
                                    name="address" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="workplace" id="workplace" class="form-control"
                                    name="home" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="number" placeholder="phone" id="phone" class="form-control" name="phone"
                                    required>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Submit</button>
                            </div>
                            <br>
                            <div class="d-grid mx-auto"><a href="{{ route('forgot') }}"
                                    style="text-decoration:none; color: black;">Update later</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection