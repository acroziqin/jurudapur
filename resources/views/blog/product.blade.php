@extends('layouts.master')

@section('title', 'Jurudapur')

@section('cssTambahan')
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.green.min.css') }}">
	<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
	<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-minima.css" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/rating.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/dpNumberPicker-2.x-skin.grey.css') }}">
@endsection

@section('content')
    <main class="container">
        <div id="detail-prod" class="card p-3">
            <div class="gallery">
                <div class="show-img" href="https://www.bing.com/th?id=OIP.JTajyakNyf3yl72b6cmBAgHaE8&pid=Api&w=5616&h=3744&rs=1&p=0">
                    <img src="https://www.bing.com/th?id=OIP.JTajyakNyf3yl72b6cmBAgHaE8&pid=Api&w=5616&h=3744&rs=1&p=0" id="show-img">
                </div>
                <div class="small-img">
                    <i class="fas fa-chevron-left icon-left" id="prev-img"></i>
                    <div class="small-container">
                        <div id="small-img-roll">
                            <img src="https://www.bing.com/th?id=OIP.JTajyakNyf3yl72b6cmBAgHaE8&pid=Api&w=5616&h=3744&rs=1&p=0" class="show-small-img"
                            alt="">
                            <img src="https://tse2.mm.bing.net/th?id=OIP.WhD72vs9MuYKs_Y0KDyMhAHaLG&o=5&pid=1.7&w=667&h=1000&rs=1&p=0" class="show-small-img"
                            alt="">
                            <img src="https://www.bing.com/th?id=OIP.JTajyakNyf3yl72b6cmBAgHaE8&pid=Api&w=5616&h=3744&rs=1&p=0" class="show-small-img"
                            alt="">
                            <img src="https://tse2.mm.bing.net/th?id=OIP.WhD72vs9MuYKs_Y0KDyMhAHaLG&o=5&pid=1.7&w=667&h=1000&rs=1&p=0" class="show-small-img"
                            alt="">
                            <img src="https://www.bing.com/th?id=OIP.JTajyakNyf3yl72b6cmBAgHaE8&pid=Api&w=5616&h=3744&rs=1&p=0" class="show-small-img"
                            alt="">
                            <img src="https://tse2.mm.bing.net/th?id=OIP.WhD72vs9MuYKs_Y0KDyMhAHaLG&o=5&pid=1.7&w=667&h=1000&rs=1&p=0" class="show-small-img"
                            alt="">
                        </div>
                    </div>
                    <i class="fas fa-chevron-right icon-right" id="next-img"></i>
                </div>
            </div>
            <div id="detail" class="row px-3">
                <div class="col-12 col-md-7 content vl">
                    <p class="title" style="font-size: 1.4rem" title="Menu ayam bakar Lorem ipsum dolor lorem ipsum s sd asdas sd Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt beatae praesentium commodi odit illum architecto nam fugiat quisquam qui molestias?">
                        {{ $menu['nama'] }}
                    </p>
                    <div class="desc">
                        <div>{{ $menu['jenis'] }}</div>
                    </div>
                    <div class="block-mini-title">
                        @if ($jenis_menu == 'makanan')
                            Pilihan Isi :
                        @endif
                        <br>
                        {{ $isi }}
                        <div id="share"></div>
                    </div>
                    <div class="price dis" style="font-size: 1.6rem">Rp.{{ number_format($menu['harga'], 0, ",", ".") }}</div>
                    <hr>
                    <div><i class="fas fa-shopping-cart text-main"></i> Minimal Pemesanan 20 Porsi</div>
                    <div><i class="fas fa-share-square text-main"></i> Gratis ongkir (Min. Pemesanan 20 Box)</div>
                    <hr>
                    {{-- <div class="d-flex" style="align-items:center; flex-wrap: wrap;">
                        <div>Kuantitas</div>
                        <div id='np'></div>
                    </div> --}}
                    {{-- <a href="@auth {{ URL::route('products.order', $menu['id']) }} @else {{ route('login') }} @endauth"> --}}
                    <a href="@auth /products/{{$jenis_menu}}/{{$menu['id']}}/order @else {{ route('login') }} @endauth">
                        <div class="d-flex justify-content-center align-items-center" style="flex-wrap: wrap;">
                            <button class="btn btn-primary m-2" type="button" style="flex:1" @auth @if (is_null($verified)) disabled @endif @endauth>Pesan sekarang</button>
                        </div>
                    </a>
                    @auth
                        @if (is_null($verified))
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                                </div>
                            @else 
                                <header class="alert alert-warning" role="alert">
                                    {{ __('Agar bisa memesan. Anda harus verifikasi email Anda terlebih dahulu. please check your email for a verification link.') }}
                                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                                </header>
                            @endif
                        @endif
                    @endauth
                </div>
                <div class="col-12 col-md-5">
                    <table>
                        <tr>
                            <td>
                                <a href="{{ route('dapur.show', ['dapur_name'=> str_replace(' ','-',$dapur['nama'])]) }}">
                                    <img class="small-pic-dapur" src="https://i0.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png"
                                    alt="">
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('dapur.show', ['dapur_name'=> str_replace(' ','-',$dapur['nama'])]) }}">
                                    {{ $dapur['nama'] }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div><i class="fas fa-shopping-cart text-main"></i> Maks. {{ $dapur['kuota'] }} Porsi</div>
                                {{-- <div class="ui star rating" data-rating="5"></div> --}}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        {{-- <div class="card my-3 p-4 col-12 col-md-9">
            <h3 class="title">Deskripsi Produk</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut nobis vero eligendi accusantium blanditiis, asperiores
                numquam nihil inventore nemo quam, aut tenetur odit dolor harum optio iusto at nam enim dolores. Tempora fugit
                laboriosam dignissimos reiciendis sed voluptate, incidunt necessitatibus quod quisquam aperiam, ea a molestiae
                provident eveniet maxime et nihil iste rem unde debitis modi ratione deserunt. Velit nihil aut similique, nulla
                reiciendis, a provident quas id earum omnis dicta alias, distinctio ipsam magnam consectetur delectus dolore
                eveniet officiis dolorum. Eos facere deserunt veniam natus fugiat! Asperiores, maiores deleniti. Magnam accusamus
                veniam, maxime laborum ducimus vero praesentium, eligendi sint corrupti corporis nesciunt earum reprehenderit
                consequatur tenetur at quaerat. Culpa cum, perspiciatis ipsa porro aspernatur dicta tempora aliquam sequi.
                Sapiente, aliquam molestias sed rem unde possimus natus minus alias voluptates distinctio consequatur explicabo,
                facilis in ex quos accusamus repellendus sint laudantium optio aspernatur officiis? Excepturi mollitia cum labore
                dolor illo eligendi sapiente, in voluptas expedita molestias, tenetur sunt, fugiat minus. Qui ea debitis
                dignissimos totam, in pariatur quisquam. Aspernatur fugiat praesentium repellendus eligendi ullam dolorem explicabo
                commodi quisquam iusto maxime, sequi est eos quidem itaque corporis incidunt neque! Iste debitis perspiciatis
                accusantium suscipit tempore autem fuga excepturi aut atque maiores.
            </p>
        </div>
        <div class="review card my-3 p-4 col-12 col-md-9">
            <h3>Review Masakan</h3>
            <div class="rate">
                <h1 class="number">4.5</h1>
                <div class="ui star rating" data-rating="4"></div>
            </div>
            <div class="review-item-container">
                <div class="review-item">
                    <div class="user-rev">
                        <img class="user-i-rev" src="https://i0.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png"
                        alt="">
                        <div class="user-n-rev">
                            <span>User 1</span>
                            <div class="ui star rating" data-rating="4"></div>
                        </div>
                    </div>
                    <div class="user-c-rev">
                        <p>Enak makanannya</p>
                    </div>
                </div>
                <div class="review-item">
                    <div class="user-rev">
                        <img class="user-i-rev" src="https://i0.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png"
                        alt="">
                        <div class="user-n-rev">
                            <span>User 2</span>
                            <div class="ui star rating" data-rating="5"></div>
                        </div>
                    </div>
                    <div class="user-c-rev">
                        <p>Enak</p>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <!-- INI hanya jika sudah login dan sudah pernah membeli produk --> --}}
        {{-- <div class="review card my-3 p-4 col-12 col-md-9">
            <h3>Beri Review</h3>
            <form action="">
                <textarea class="form-control form-group" name="review" rows="3" placeholder="Wah enak, sesaui sama harganya."></textarea>
                <button class="btn btn-primary" type="submit" >Kirim</button>
            </form>
        </div> --}}
        <section class="menu">
            <div class="header">
                <h3>Orang Lain Juga Melihat</h3>
            </div>
            <div class="owl-carousel">
                <a href="#" class="menu-item">
                    <div>
                        <img class="img lazy owl-lazy" src="https://placehold.it/200x150&text=1" data-src="https://craftlog.com/m/i/1939076=s1280=h960"
                        alt="">
                        <div class="content">
                            <div class="title">Jagung bakar spesial akhir tahun yang bagus banget</div>
                            <div class="price ori">Rp.50.000</div>
                            <div class="price dis">Rp.50.000<div class="ket"> / Pax</div>
                            </div>
                            <div class="kitchen"><i class="far fa-star"></i> Dapur Bu Eni</div>
                        </div>
                    </div>
                </a>
                <a href="#" class="menu-item">
                    <div>
                        <img class="img lazy owl-lazy" src="https://placehold.it/200x150&text=1" data-src="https://craftlog.com/m/i/1939076=s1280=h960"
                        alt="">
                        <div class="content">
                            <div class="title">Jagung bakar spesial akhir tahun yang bagus banget</div>
                            <div class="price ori">Rp.50.000</div>
                            <div class="price dis">Rp.50.000<div class="ket"> / Pax</div>
                            </div>
                            <div class="kitchen"><i class="far fa-star"></i> Dapur Bu Eni</div>
                        </div>
                    </div>
                </a>
                <a href="#" class="menu-item">
                    <div>
                        <img class="img lazy owl-lazy" src="https://placehold.it/200x150&text=1" data-src="https://craftlog.com/m/i/1939076=s1280=h960"
                        alt="">
                        <div class="content">
                            <div class="title">Jagung bakar spesial akhir tahun yang bagus banget</div>
                            <div class="price ori">Rp.50.000</div>
                            <div class="price dis">Rp.50.000<div class="ket"> / Pax</div>
                            </div>
                            <div class="kitchen"><i class="far fa-star"></i> Dapur Bu Eni</div>
                        </div>
                    </div>
                </a>
                <a href="#" class="menu-item">
                    <div>
                        <img class="img lazy owl-lazy" src="https://placehold.it/200x150&text=1" data-src="https://craftlog.com/m/i/1939076=s1280=h960"
                        alt="">
                        <div class="content">
                            <div class="title">Jagung bakar spesial akhir tahun yang bagus banget</div>
                            <div class="price ori">Rp.50.000</div>
                            <div class="price dis">Rp.50.000<div class="ket"> / Pax</div>
                            </div>
                            <div class="kitchen"><i class="far fa-star"></i> Dapur Bu Eni</div>
                        </div>
                    </div>
                </a>
                <a href="#" class="menu-item">
                    <div>
                        <img class="img lazy owl-lazy" src="https://placehold.it/200x150&text=1" data-src="https://craftlog.com/m/i/1939076=s1280=h960"
                        alt="">
                        <div class="content">
                            <div class="title">Jagung bakar spesial akhir tahun yang bagus banget</div>
                            <div class="price ori">Rp.50.000</div>
                            <div class="price dis">Rp.50.000<div class="ket"> / Pax</div>
                            </div>
                            <div class="kitchen"><i class="far fa-star"></i> Dapur Bu Eni</div>
                        </div>
                    </div>
                </a>
                <a href="#" class="menu-item">
                    <div>
                        <img class="img lazy owl-lazy" src="https://placehold.it/200x150&text=1" data-src="https://craftlog.com/m/i/1939076=s1280=h960"
                        alt="">
                        <div class="content">
                            <div class="title">Jagung bakar spesial akhir tahun yang bagus banget</div>
                            <div class="price ori">Rp.50.000</div>
                            <div class="price dis">Rp.50.000<div class="ket"> / Pax</div>
                            </div>
                            <div class="kitchen"><i class="far fa-star"></i> Dapur Bu Eni</div>
                        </div>
                    </div>
                </a>
                <a href="#" class="menu-item">
                    <div>
                        <img class="img lazy owl-lazy" src="https://placehold.it/200x150&text=1" data-src="https://craftlog.com/m/i/1939076=s1280=h960"
                        alt="">
                        <div class="content">
                            <div class="title">Jagung bakar spesial akhir tahun yang bagus banget</div>
                            <div class="price ori">Rp.50.000</div>
                            <div class="price dis">Rp.50.000<div class="ket"> / Pax</div>
                            </div>
                            <div class="kitchen"><i class="far fa-star"></i> Dapur Bu Eni</div>
                        </div>
                    </div>
                </a>
                <a href="#" class="menu-item">
                    <div>
                        <img class="img lazy owl-lazy" src="https://placehold.it/200x150&text=1" data-src="https://craftlog.com/m/i/1939076=s1280=h960"
                        alt="">
                        <div class="content">
                            <div class="title">Jagung bakar spesial akhir tahun yang bagus banget</div>
                            <div class="price ori">Rp.50.000</div>
                            <div class="price dis">Rp.50.000<div class="ket"> / Pax</div>
                            </div>
                            <div class="kitchen"><i class="far fa-star"></i> Dapur Bu Eni</div>
                        </div>
                    </div>
                </a>
            </div>
        </section>
    </main>
@endsection

@section('jsTambahan')
    <!-- Optional script -->
	<script src="{{ URL::asset('js/zoom-image.min.js') }}"></script>
	<script src="{{ URL::asset('js/jssocials.min.js') }}"></script>
	<script src="{{ URL::asset('js/rating.min.js') }}"></script>
	<script src="{{ URL::asset('js/dpNumberPicker-2.x.js') }}"></script>
	<script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
	<script>
		$(document).ready(function () {
			$("#share").jsSocials({
				shares: ["whatsapp", "twitter", "facebook", "googleplus", "linkedin"]
			});
			$('.rating')
				.rating({
					maxRating: 5,
					interactive: false,
				});
			dpUI.numberPicker("#np", {
				start: 20, // GANTI DENGAN MINIMAL PEMESANAN
				min: 20, // GANTI DENGAN MINIMAL PEMESANAN
                max: {{ $dapur['kuota'] == '' ? 0 : $dapur['kuota'] }},
				step: 1,
			});
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
@endsection