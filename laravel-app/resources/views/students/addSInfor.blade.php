@extends('auth.layouts')
@section('content')
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Fill your information</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('saveSInfor') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <select name="level" id="level" class="form-control" required autofocus>
                                    <option value=1>Cấp độ 1</option>
                                    <option value=2>Cấp độ 2</option>
                                    <option value=3>Cấp độ 3</option>
                                    <option value=4>Cấp độ 4</option>
                                    <option value=5>Cấp độ 5</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="name" id="name" class="form-control" name="name"
                                    required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="date" placeholder="birthday" id="birthday" class="form-control"
                                    name="birthday" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="home" id="home" class="form-control" name="home"
                                    required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="address" id="address" class="form-control"
                                    name="address" required>
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