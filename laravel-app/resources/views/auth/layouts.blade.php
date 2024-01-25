<!DOCTYPE html>
<html>

<head>
    <title>eClass</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="#"><img src="{{asset('assets/logo.png')}}" width="137px" ,
                    height="50px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar navbar-inverse" id="navbarNav">
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
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class=" nav-link" href=""><img src="{{asset('assets/download 10.png')}}" alt=""></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href=" 
                                @if (Auth::check() && Auth::user()->role == 1)
                                {{ route('teacherProfile') }}
                                @elseif (Auth::check() && Auth::user()->role == 2)
                                {{ route('studentProfile') }}
                                @else
                                {{ route('adminProfile') }}
                                @endif ">
                                    <img src="{{asset('assets/images 1.png')}}" alt="">
                                </a>
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