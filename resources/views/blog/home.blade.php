@extends('layouts.master')

@section('title', 'Jurudapur')

@section('content')
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

        <section class="popular-menu">
            <div class="header">
                <h3>Menu Populer</h3>
            </div>
            <div class="owl-carousel">
                @for ($i = 0; $i < 8; $i++)
                    <a href="{{ URL::route('products.detail', $i) }}" class="menu-item">
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
                @endfor
            </div>
        </section>
        <section class="popular-dapur">
            <div class="header">
                <h3>Dapur Populer</h3>
            </div>
            <div class="owl-carousel">
                @for ($i = 0; $i < 8; $i++)
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
                @endfor
            </div>
        </section>
    </main>

@endsection