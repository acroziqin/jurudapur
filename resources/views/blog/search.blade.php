@extends('layouts.master')

@section('title', 'Jurudapur')

@section('cssTambahan')
    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/owl.theme.green.min.css') }}">
@endsection

@section('content')
    <main class="container">
        @if (!is_null($makanan))    
            <section class="menu">
                <div class="header">
                    <h3>Makanan</h3>
                </div>
                <div class="owl-carousel">
                    @php $i = 0 @endphp
                    @foreach ($makanan as $makan)
                    <a href="/products/makanan/{{$makan->id}}/detail" class="menu-item">
                        <div>
                            <img class="img lazy owl-lazy" src="https://placehold.it/200x150&text=1" data-src="https://craftlog.com/m/i/1939076=s1280=h960"
                            alt="">
                            <div class="content">
                                <div class="title">{{ $makan->nama }}</div>
                                <div class="desc">
                                    <div>{{ $makan->jenis }}</div>
                                </div>                            
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
        @endif
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