@extends('auth.layouts')
@section('content')
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Get password</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email"
                                    required autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Get password</button>
                            </div>
                            <br>
                            <div class="d-grid mx-auto"><a href="{{ route('register') }}" style="text-decoration:none; color: black;">Return to sign in</a></div>
                            <!-- <p class="mb-1">
                                <a href="/forgot.blade.php">I forgot my password</a>
                            </p>
                            <p class="mb-0">
                                <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
                            </p> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection