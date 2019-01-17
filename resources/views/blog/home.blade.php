@extends('layouts.master')

@section('title', 'Jurudapur')

@section('cssTambahan')
    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/owl.theme.green.min.css') }}">
@endsection

@section('content')
    @auth
        @if (is_null($verified))
            @if (session('resent'))
            <div class="alert alert-success" role="alert" style="margin:0;">
                <header class="container text-center">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </header>
            </div>
            @else
            <div class="alert alert-warning" role="alert" style="margin:0;">
                <header class="container text-center">
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </header>
            </div>
            @endif
        @endif
    @endauth
    <div class="super-container">
        <div class="jumbotron">
            <div class="container">
                Promo disini
            </div>
        </div>
    </div>

    <!-- Content -->
    <main class="container">
        <div class="characteristics">
            <div class="row">
                @for ($i = 0; $i < count($characteristics['icon']); $i++)
                    <div class="col-6 col-lg-3">
                        <div class="char-item">
                            <div class="icon">
                                <i class="fas fa-{{ $characteristics['icon'][$i] }}"></i>
                            </div>
                            <div class="title">{{ $characteristics['name'][$i] }}</div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <section class="menu">
            <div class="header">
                <h3>Makanan</h3>
            </div>
            <div class="owl-carousel">
                @php $i = 0 @endphp
                @foreach ($makanan as $makan)
                    <a href="{{ URL::route('products.detail', $makan->id) }}" class="menu-item">
                        <div>
                            <img class="img lazy owl-lazy" src="https://placehold.it/200x150&text=1" data-src="https://craftlog.com/m/i/1939076=s1280=h960"
                            alt="">
                            <div class="content">
                                <div class="title">{{ $makan->nama }}</div>
                                <div class="desc">
                                    <div>{{ $makan->jenis }}</div>
                                </div>
                                {{-- <div class="price ori">{{ $makan->jenis }}</div> --}}
                                <div class="price dis">Rp. {{ number_format($makan->harga, 0, ",", ".") }}
                                    <div class="ket"> / Pax</div>
                                </div>
                                <div class="kitchen"><i class="far fa-star"></i> {{ $dapmakanan[$i] }}</div>
                            </div>
                        </div>
                    </a>
                    @php $i++ @endphp
                @endforeach
            </div>
        </section>
        <section class="menu">
            <div class="header">
                <h3>Minuman</h3>
            </div>
            <div class="owl-carousel">
                @php $i = 0 @endphp
                @foreach ($minuman as $minum)
                    <a href="{{ URL::route('products.detail', $minum->id) }}" class="menu-item">
                        <div>
                            <img class="img lazy owl-lazy" src="https://placehold.it/200x150&text=1" data-src="https://craftlog.com/m/i/1939076=s1280=h960"
                            alt="">
                            <div class="content">
                                <div class="title">{{ $minum->nama }}</div>
                                <div class="desc">
                                    <div>{{ $makan->jenis }}</div>
                                </div>
                                {{-- <div class="price ori">{{ $minum->jenis }}</div> --}}
                                <div class="price dis">Rp. {{ number_format($minum->harga, 0, ",", ".") }}
                                    <div class="ket"> / Pax</div>
                                </div>
                                <div class="kitchen"><i class="far fa-star"></i> {{ $dapminuman[$i] }}</div>
                            </div>
                        </div>
                    </a>
                    @php $i++ @endphp
                @endforeach
            </div>
        </section>
        <section class="menu">
            <div class="header">
                <h3>Kue</h3>
            </div>
            <div class="owl-carousel">
                @php $i = 0 @endphp
                @foreach ($kue as $kuwe)
                    <a href="{{ URL::route('products.detail', $kuwe->id) }}" class="menu-item">
                        <div>
                            <img class="img lazy owl-lazy" src="https://placehold.it/200x150&text=1" data-src="https://craftlog.com/m/i/1939076=s1280=h960"
                            alt="">
                            <div class="content">
                                <div class="title">{{ $kuwe->nama }}</div>
                                <div class="desc">
                                    <div>{{ $makan->jenis }}</div>
                                </div>
                                {{-- <div class="price ori">{{ $kuwe->jenis }}</div> --}}
                                <div class="price dis">Rp. {{ number_format($kuwe->harga, 0, ",", ".") }}
                                    <div class="ket"> / Pax</div>
                                </div>
                                <div class="kitchen"><i class="far fa-star"></i> {{ $dapkue[$i] }}</div>
                            </div>
                        </div>
                    </a>
                    @php $i++ @endphp
                @endforeach
            </div>
        </section>

    </main>

@endsection

@section('jsTambahan')
    <!-- Halaman ini membutuhkan slick, tapi halaman lain belum tentu butuh slick -->
    <!-- <script type="text/javascript" src="js/slick.min.js"></script> -->
    <script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(".owl-carousel").owlCarousel({
                items: 5,
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