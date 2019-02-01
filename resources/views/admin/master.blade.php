<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title', config('app.name'))
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('material-dashboard/css/material-dashboard.css?v=2.1.1') }}" rel="stylesheet" />
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('material-dashboard/img/sidebar-1.jpg') }} ">
            <div class="logo">
                <a href="{{ config('app.url') }}" class="simple-text logo-normal">
                    JuruDapur
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('admin.users') }}">
                            <i class="material-icons">person</i>
                            <p>Daftar Pengguna</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('admin.pesanan') }}">
                            <i class="material-icons">person</i>
                            <p>Daftar Pesanan</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('admin.dapur.index') }}">
                            <i class="material-icons">person</i>
                            <p>Daftar Dapur</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="#pablo">@yield('subtitle',config('app.name'))</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <form class="navbar-form d-none">
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="{{route('dashboard')}}">Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="float-left">
                        <ul>
                            <li>
                                <a href="https://www.creative-tim.com">
                                    Creative Tim
                                </a>
                            </li>
                            <li>
                                <a href="https://creative-tim.com/presentation">
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="http://blog.creative-tim.com">
                                    Blog
                                </a>
                            </li>
                            <li>
                                <a href="https://www.creative-tim.com/license">
                                    Licenses
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright float-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())

                        </script>, made with <i class="material-icons">favorite</i> by
                        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <div class="fixed-plugin">
        <div class="dropdown show-dropdown">
            <a href="#" data-toggle="dropdown">
                <i class="fa fa-cog fa-2x"> </i>
            </a>
            <ul class="dropdown-menu">
                <li class="header-title"> Sidebar Filters</li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger active-color">
                        <div class="badge-colors ml-auto mr-auto">
                            <span class="badge filter badge-purple" data-color="purple"></span>
                            <span class="badge filter badge-azure" data-color="azure"></span>
                            <span class="badge filter badge-green" data-color="green"></span>
                            <span class="badge filter badge-warning" data-color="orange"></span>
                            <span class="badge filter badge-danger" data-color="danger"></span>
                            <span class="badge filter badge-rose active" data-color="rose"></span>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li class="header-title">Images</li>
                <li class="active">
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="{{ asset('material-dashboard/img/sidebar-1.jpg') }}" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="{{ asset('material-dashboard/img/sidebar-2.jpg') }}" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="{{ asset('material-dashboard/img/sidebar-3.jpg') }}" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="{{ asset('material-dashboard/img/sidebar-4.jpg') }}" alt="">
                    </a>
                </li>
                <li class="button-container">
                    <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-primary btn-block">Free
                        Download</a>
                </li>
                <!-- <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li> -->
                <li class="button-container">
                    <a href="https://demos.creative-tim.com/material-dashboard/docs/2.1/getting-started/introduction.html"
                        target="_blank" class="btn btn-default btn-block">
                        View Documentation
                    </a>
                </li>
                <li class="button-container github-star">
                    <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star"
                        data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
                </li>
                <li class="header-title">Thank you for 95 shares!</li>
                <li class="button-container text-center">
                    <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
                    <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot;
                        50</button>
                    <br>
                    <br>
                </li>
            </ul>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('material-dashboard/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('material-dashboard/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('material-dashboard/js/core/bootstrap-material-design.min.js') }}"></script>
    <script src="{{ asset('material-dashboard/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

    <script src="{{ asset('material-dashboard/js/plugins/moment.min.js') }}"></script>

    <script src="{{ asset('material-dashboard/js/plugins/sweetalert2.js') }}"></script>

    {{-- <script src="{{ asset('material-dashboard/js/plugins/jquery.validate.min.js') }}"></script> --}}

    {{-- <script src="{{ asset('material-dashboard/js/plugins/jquery.bootstrap-wizard.js') }}"></script> --}}

    {{-- <script src="{{ asset('material-dashboard/js/plugins/bootstrap-selectpicker.js') }}"></script> --}}

    {{-- <script src="{{ asset('material-dashboard/js/plugins/bootstrap-datetimepicker.min.js') }}"></script> --}}

    {{-- <script src="{{ asset('material-dashboard/js/plugins/jquery.dataTables.min.js') }}"></script> --}}

    {{-- <script src="{{ asset('material-dashboard/js/plugins/bootstrap-tagsinput.js') }}"></script> --}}

    {{-- <script src="{{ asset('material-dashboard/js/plugins/jasny-bootstrap.min.js') }}"></script> --}}

    {{-- <script src="{{ asset('material-dashboard/js/plugins/fullcalendar.min.js') }}"></script> --}}

    {{-- <script src="{{ asset('material-dashboard/js/plugins/jquery-jvectormap.js') }}"></script> --}}

    {{-- <script src="{{ asset('material-dashboard/js/plugins/nouislider.min.js') }}"></script> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js'"></script> --}}

    {{-- <script src="{{ asset('material-dashboard/js/plugins/arrive.min.js') }}"></script> --}}

    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}

    <script src="{{ asset('material-dashboard/js/plugins/chartist.min.js') }}"></script>

    {{-- <script src="{{ asset('material-dashboard/js/plugins/bootstrap-notify.js') }}"></script> --}}

    <script src="{{ asset('material-dashboard/js/material-dashboard.js?v=2.1.1') }}" type="text/javascript"></script>

    @yield('scripts')
</body>

</html>
