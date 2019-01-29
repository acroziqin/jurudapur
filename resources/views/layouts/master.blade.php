@php
use Illuminate\Support\Facades\Input;
@endphp
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <link rel="icon" href="{{ URL::asset('images/favicon.png') }}">
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
                    {!! Form::open(['route' => 'search', 'class' => 'form-inline']) !!}
                    {{-- <form class="form-inline" action="{{ URL::route('search') }}" method="post"> --}}
                        <input class="form-control search-input" name="kueri" type="search" placeholder="{{ __('Cari Menu') }}" aria-label="Search">
                        {{-- {!! Form::text('query', null, ['class' => 'form-control search-input', 'placeholder' => '{{ __("Cari Menu") }}", 'aria-label' => 'Search']) !!} --}}
                        {{-- <input type="hidden" name="type" value="menu"> --}}
                        <button class="form-control search-btn" type="submit" style="cursor: pointer"><i class="fas fa-search"></i></button>
                        {{ csrf_field() }}
                        {!! Form::hidden('type', 'menu') !!}
                        {!! Form::close() !!}
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
                        {{-- <form class="form-inline my-2 my-lg-0 mx-0 mx-lg-3 w-lg-50 w-100 d-flex">
                            <input class="form-control search-input" type="search" placeholder="Cari Menu" aria-label="Search">
							<button class="form-control search-btn" type="submit"><i class="fas fa-search"></i></button>
                        </form> --}}
                        {!! Form::open(['method' => 'get', 'route' => 'search', 'class' => 'form-inline my-2 my-lg-0 mx-0 mx-lg-3 w-lg-50 w-100 d-flex']) !!}
                            @csrf
                            {!! Form::text('query', Input::get('query'), ['class' => 'form-control search-input', 'placeholder' => __('Cari Menu'), 'aria-label' => 'Search']) !!}
                            {!! Form::button('<i class="fas fa-search"></i>', ['type' => 'submit', 'class' => 'form-control search-btn']); !!}
                            {!! Form::hidden('type', 'menu') !!}
                        {!! Form::close() !!}
					</div>
					<!-- Right Menu -->
					<div class="col-12 col-md-4 d-flex justify-content-start justify-content-md-end">
						<ul class="navbar-nav">
                            @auth
                            <li class="nav-item dropdown active">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                 aria-expanded="false" style="padding-top: 8px;display: inline-block;">
                                    @if (is_null(Auth::user()->avatar))
                                        <i class="fas fa-user" style="font-size: 1.2rem; margin-right: .5rem;"></i>
                                    @else
                                        @if (is_null(Auth::user()->provider_id))
                                            @php $src = url('storage/avatars/'.Auth::user()->avatar) @endphp
                                        @else
                                            @php $src = Auth::user()->avatar @endphp
                                        @endif
                                        <img src="{{ $src }}" alt="avatar"  style="width: 40px; height: 40px; border-radius: 50px">
                                    @endif
                                    <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ URL::route('dashboard') }}"><i class="fas fa-user"></i> {{ Auth::user()->name }} </a>
                                    <!-- <a class="dropdown-item" href="#"><i class="fas fa-shopping-cart"></i> Pemesanan</a> -->
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
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
    @include('layouts.messages')

    @yield('content')

	<!-- Footer -->
	<footer>
        <div class="container-fluid footer-top">
            <div class="row">
                <div class="col-6 d-flex">
                    <div style="align-self: center;">{{ __('Ikut Kami di') }}</div>
                </div>
                <div class="col-6 d-flex" style="flex-direction: row-reverse;">
                    <div class="social-media">
                        <a href="https://www.instagram.com/jurudapur/"><i class="fab fa-instagram"></i></a>
                        {{-- <a href=""><i class="fab fa-line"></i></a>
                        <a href=""><i class="fab fa-whatsapp"></i></a>
                        <a href=""><i class="fab fa-facebook"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="container footer-main">
            <div class="row">
                <div class="col-6 col-md-4 d-flex justify-content-center">
                    <ul>
                        <li><a href="{{ URL::route('beranda') }}">{{ __('Beranda') }}</a></li>
                        <li><a href="#">{{ __('Makanan') }}</a></li>
                        <li><a href="#">{{ __('Minuman') }}</a></li>
                        <li><a href="#">{{ __('Kue') }}</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-4 d-flex justify-content-center">
                    <ul>
                        <li><a href="#">{{ __('Dapur') }}</a></li>
                        <li><a href="{{ url('syarat-ketentuan') }}">{{ __('Syarat dan Ketentuan') }}</a></li>
                        <li><a href="#">{{ __('Kebijakan Privasi') }}</a></li>
                        <li><a href="#">{{ __('Tentang Kami') }}</a></li>
                        <li><a href="#">{{ __('Hubungi Kami') }}</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-4">
                    <img src="/images/logo.png" alt="" class="logo">
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            JuruDapur &copy; 2019 | Made with ❤️ IT Team of JuruDapur
        </div>
    </footer>
    <!-- Footer -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> --}}
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    @yield('jsTambahan')
</body>

</html>