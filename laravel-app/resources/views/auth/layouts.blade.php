<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <br><br>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="#" ><img src="{{asset('assets/logo.png')}}" width="137px", height="50px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- navbar navbar-inverse -->
            <!-- collapse navbar-collapse -->
            <div class="navbar navbar-inverse" id="navbarNav">
                <br><br><br>
                <ul class="nav navbar-nav navbar-right">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item right">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @else
                    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                            <!-- <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                                </li>
                                <li class="nav-item d-none d-sm-inline-block">
                                    <a href="#" class="nav-link">Home</a>
                                </li>
                            </ul> -->
                            <ul class="navbar-nav ml-auto">
                                <!-- <li>
                                    <a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
                                </li>
                                <li>
                                    <a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href=""><img src="{{asset('assets/download 10.png')}}" alt=""></a>
                                </li>  
                                <li class="nav-item">
                                    <a class="nav-link" href=""><img src="{{asset('assets/images 1.png')}}" alt=""></a>
                                </li>  
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('signout')}}">Log out</a>
                                </li>
                            </ul>
                    </nav>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <br><br><br>
        @yield('content')
    </div>
</body>
</html>
