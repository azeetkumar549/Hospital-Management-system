
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Page-->
    <title>@yield('title')</title>
    <!-- Fontfaces CSS-->
    <link href="{{asset('admin_assets/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">

    <link href="{{asset('admin_assets/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="{{asset('admin_assets/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">

                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                    <li class="@yield('admin')">
                            <a class="" href="{{route('admin')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="@yield('addbranch')">
                            <a class="" href="{{route('addbranch')}}"><i class=""></i>Add Branch</a>
                        </li>
                        <li class="@yield('add_staff')">
                            <a class="" href="{{route('add_staff')}}"><i class=""></i>Add staff</a>
                        </li>
                        <li class="@yield('add_doctor')">
                            <a class="" href="{{route('add_doctor')}}"><i class=""></i>Add Doctor</a>
                        </li>
                        <li class="@yield('manage_branch')">
                            <a class="" href="{{route('manage_branch')}}"><i class=""></i>Manage Branch</a>
                        </li>
                        <li class="@yield('manage_staff')">
                            <a class="" href="{{route('manage_staff')}}"><i class=""></i>Manage staff</a>
                        </li>
                        <li class="@yield('manage_doctor')">
                            <a class="" href="{{route('manage_doctor')}}"><i class=""></i>Manage Doctor</a>
                        </li>
                        <li class="@yield('manage_admin_Patient')">
                            <a class="" href="{{route('manage_admin_Patient')}}"><i class=""></i>Manage Patient</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <h5>Hospital Management System</h5>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                    <li class="@yield('admin')">
                            <a class="" href="{{route('admin')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="@yield('addbranch')">
                            <a class="" href="{{route('addbranch')}}"><i class="bi bi-file-medical-fill"></i>Add Branch</a>
                        </li>
                        <li class="@yield('add_staff')">
                            <a class="" href="{{route('add_staff')}}"><i class="bi bi-person-badge"></i>Add staff</a>
                        </li>
                        <li class="@yield('add_doctor')">
                            <a class="" href="{{route('add_doctor')}}"><i class="bi bi-file-medical-fill"></i>Add Doctor</a>
                        </li>
                        <li class="@yield('manage_branch')">
                            <a class="" href="{{route('manage_branch')}}"><i class="bi bi-person-badge"></i>Manage Branch</a>
                        </li>
                        <li class="@yield('manage_staff')">
                            <a class="" href="{{route('manage_staff')}}"><i class="bi bi-person-badge"></i>Manage staff</a>
                        </li>
                        <li class="@yield('manage_doctor')">
                            <a class="" href="{{route('manage_doctor')}}"><i class="bi bi-file-medical-fill"></i>Manage Doctor</a>
                        </li>
                        <li class="@yield('manage_admin_Patient')">
                            <a class="" href="{{route('manage_admin_Patient')}}"><i class="bi bi-person-bounding-box"></i>Manage Patient</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">

                            </form>
                            <div class="header-button">

                                                <form action="{{route('logout')}}" method="post">
                                                    @csrf
                                                    <input type="submit" class="btn btn-lg btn-danger w-100" value="Logout">
                                                </form>
                                         
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        @section('content')
                        @show
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{asset('admin_assets/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('admin_assets/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/wow/wow.min.js')}}"></script>
    <!-- Main JS-->
    <script src="{{asset('admin_assets/js/main.js')}}"></script>
</body>
</html>
<!-- end document-->
