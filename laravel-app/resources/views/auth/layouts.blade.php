<!DOCTYPE html>
<html>

<head>
    <title>eClass</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
        @if(Auth::check() && Auth::user()->role == 0)
        <div class="container-fluid">
            <div class="row">
                <div class="sidebar col-md-3 col-lg-2 p-0 bg-body-tertiary">
                    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body" style="width: 220px;">
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a href=" {{ route('mStudent') }} " class="nav-link active" aria-current="page">
                                    <svg class="bi pe-none me-2" width="16" height="16">
                                        <use xlink:href="#home" />
                                    </svg>
                                    Quản lý học viên
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body" style="width: 220px;">
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a href="" class="nav-link active" aria-current="page">
                                    <svg class="bi pe-none me-2" width="16" height="16">
                                        <use xlink:href="#home" />
                                    </svg>
                                    Quản lý giáo viên
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body" style="width: 220px;">
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a href="" class="nav-link active" aria-current="page">
                                    <svg class="bi pe-none me-2" width="16" height="16">
                                        <use xlink:href="#home" />
                                    </svg>
                                    Quản lý lớp học
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body" style="width: 220px;">
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a href="" class="nav-link active" aria-current="page">
                                    <svg class="bi pe-none me-2" width="16" height="16">
                                        <use xlink:href="#home" />
                                    </svg>
                                    Quản lý chi tiết
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
        @else
        @yield('content')
        @endif
    </div>
</body>

</html>