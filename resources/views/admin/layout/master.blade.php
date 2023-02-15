<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
    <!-- Favicon -->
    <link rel="icon" href="/assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="/assets/css/argon.css?v=1.2.0" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('css')
</head>

<body>
<!-- Sidenav -->
@include('admin.layout.nav')
<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Navbar links -->
                <div class="navbar-nav align-items-center  ml-md-auto ">
                </div>
                <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="/assets/img/theme/team-4.jpg">
                  </span>
                                <div class="media-body  ml-2  d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">John Snow</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu  dropdown-menu-right ">
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome!</h6>
                            </div>

                            <div class="dropdown-divider"></div>
                            <a href="#!" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <form action="{{url('/admin/logout')}}" class="d-inline" method="POST">
                                    @csrf
                                    <input type="submit" value="Logout" class="border-0">
                                </form>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header p-3">
        <div class="card p-2">
            @if($errors->any())
                @foreach($errors->all() as $e)
                    <div class="alert alert-danger">{{$e}}</div>
                @endforeach
            @endif
            @yield('content')
        </div>
    </div>

</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/js-cookie/js.cookie.js"></script>
<script src="/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->
<script src="/assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="/assets/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="/assets/js/argon.js?v=1.2.0"></script>
@yield('script')
@if(session()->has('error'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: '{{session('error')}}',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif
@if(session()->has('success'))
    <script>
        Swal.fire({
            position: 'top',
            icon: 'success',
            title: '{{session('success')}}',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif
</body>

</html>
