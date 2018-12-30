<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
	<title>@yield('title')</title>
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i" rel="stylesheet">

	<!-- Optional untuk halaman lain. Halaman ini butuh slick -->

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.green.min.css">
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
				<div class="cart-container d-md-none">
					<a href="#" class="nav-link active">
						<div class="cart-icon">
							<i class="fas fa-shopping-cart"></i>
						</div>
					</a>
				</div>
			</div>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<!-- Logo -->
				<a class="navbar-brand" href="/">
					<img class="logo" src="images/logo.png" alt="logo" />
				</a>
				<div class="row nav-menu">
					<!-- Search -->
					<div class="col-12 col-md-7 d-none d-md-flex">
						<form class="form-inline my-2 my-lg-0 mx-0 mx-lg-3 w-lg-50 w-100 d-flex">
							<input class="form-control search-input" type="search" placeholder="Cari Menu" aria-label="Search">
							<button class="form-control search-btn" type="submit"><i class="fas fa-search"></i></button>
						</form>
					</div>
					<!-- Right Menu -->
					<div class="col-12 col-md-5 d-flex justify-content-end">
						<ul class="navbar-nav align-items-baseline d-flex row justify-content-around w-100">
							<li class="nav-item col-4 d-none d-md-block">
								<div class="cart-container">
									<a href="#" class="nav-link active">
										<div class="cart-icon">
											<i class="fas fa-shopping-cart"></i>
										</div>
									</a>
								</div>
							</li>
							<li class="nav-item active col-4">
								<a class="nav-link" href="{{ route('login') }}">Masuk</a>
							</li>
							<li class="nav-item active col-4">
								<a class="nav-link" href="{{ route('register') }}">Daftar</a>
							</li>
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
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Halaman ini membutuhkan slick, tapi halaman lain belum tentu butuh slick -->
        <!-- <script type="text/javascript" src="js/slick.min.js"></script> -->
        <script src="js/owl.carousel.min.js"></script>
        <script>
            $(document).ready(function () {
                $(".owl-carousel").owlCarousel({
                    items: 6,
                    autoWidth: true,
                    lazyLoad: true,
                    nav: true,
                    navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                    responsive: {
                        0: {
                            nav: false,
                        },
                        768: {
                            nav: true,
                        },
                    }
                });
            });
        </script>
</body>

</html>