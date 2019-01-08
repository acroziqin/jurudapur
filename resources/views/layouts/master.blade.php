<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
	<title>@yield('title')</title>
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i" rel="stylesheet">
    
	<!-- Optional untuk halaman lain. Halaman ini butuh slick -->
    {{-- <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}"> --}}

	@yield('cssTambahan')
</head>

<body>
	<!-- Navbar -->
	<nav class="navbar navbar-expand-md navbar-light fixed-top">
		<div class="container">
			<div class="header-mobile">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="flex-grow: 0">
					<span class="navbar-toggler-icon"></span>
				</button>
				<!-- Search -->
				<div class="d-flex" style="flex: 1; margin: 0 10px">
					<form class="form-inline">
						<input class="form-control search-input" type="search" placeholder="Cari Menu" aria-label="Search">
						<button class="form-control search-btn" type="submit"><i class="fas fa-search"></i></button>
					</form>
				</div>
			</div>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<!-- Logo -->
				<a class="navbar-brand" href="/">
					<img class="logo" src="{{ URL::asset('images/logo.png') }}" alt="logo" />
				</a>
				<div class="row nav-menu">
					<!-- Search -->
					<div class="col-12 col-md-8 d-none d-md-flex">
						<form class="form-inline my-2 my-lg-0 mx-0 mx-lg-3 w-lg-50 w-100 d-flex">
							<input class="form-control search-input" type="search" placeholder="Cari Menu" aria-label="Search">
							<button class="form-control search-btn" type="submit"><i class="fas fa-search"></i></button>
						</form>
					</div>
					<!-- Right Menu -->
					<div class="col-12 col-md-4 d-flex">
						<ul class="navbar-nav d-flex">
                            @auth
                                <li class="nav-item active col-6  align-items-center d-flex">
                                    <div class="cart-container">
                                        <a href="#" class="nav-link active">
                                            <div class="cart-icon">
                                                <i class="fas fa-shopping-cart"></i>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                <li class="nav-item active col-6  align-items-center d-flex">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>
            
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
            
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    <ul class="navbar-nav ml-auto">
                                </li>
                            @else
                                <li class="nav-item active col-6  align-items-center d-flex">
                                    <a class="nav-link" href="{{ route('login')}}">Masuk</a>
                                </li>
                                <li class="nav-item active col-6 align-items-center d-flex">
                                    <a class="nav-link" href="{{ route('register')}}">Daftar</a>
                                </li>
                            @endauth
						</ul>
					</div>
				</div>
			</div>
		</div>
    </nav>

    @yield('content')

	<!-- Footer -->
	<footer>
            <div class="container-fluid footer-top">
                <div class="row">
                    <div class="col-6 d-flex">
                        <div style="align-self: center;">Follow Us On</div>
                    </div>
                    <div class="col-6 d-flex" style="flex-direction: row-reverse;">
                        <div class="social-media">
                            <a href="https://www.instagram.com/jurudapur/"><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-line"></i></a>
                            <a href=""><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container footer-main">
                <div class="row">
                    <div class="col-6 col-md-4 d-flex justify-content-center">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Katering</a></li>
                            <li><a href="#">Camilan</a></li>
                            <li><a href="#">Menu Siap Bakar</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-4 d-flex justify-content-center">
                        <ul>
                            <li><a href="#">Term & Condition</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Join Us</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-4">
                        <img src="/images/logo.png" alt="" class="logo">
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                JuruDapur &copy; 2018 | Made with ❤️ IT Team of JuruDapur
            </div>
        </footer>
        <!-- Footer -->
        <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
		@yield('jsTambahan')
</body>

</html>