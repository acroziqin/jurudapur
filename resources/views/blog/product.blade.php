@extends('layouts.master')

@section('title', 'Jurudapur')

@section('cssTambahan')
	<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
	<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-minima.css" />
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('css/rating.min.css') }}">
@endsection

@section('jsTambahan')
    <!-- Optional script -->
	<script src="{{ URL::asset('js/zoom-image.min.js') }}"></script>
	<script src="{{ URL::asset('js/jssocials.min.js') }}"></script>
	<script src="{{ URL::asset('js/rating.min.js') }}"></script>
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
            });
        </script>    
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
                <div id="detail" class="row px-3" style="position: relative;">
                    <div class="col-12 col-md-7 content vl">
                        <p class="title" style="font-size: 1.4rem" title="Menu ayam bakar Lorem ipsum dolor lorem ipsum s sd asdas sd Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt beatae praesentium commodi odit illum architecto nam fugiat quisquam qui molestias?">
                            Menu ayam bakar Lorem ipsum dolor lorem ipsum s sd asdas sd Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Sunt beatae praesentium commodi odit illum architecto nam fugiat quisquam qui molestias?
                        </p>
                        <div class="block-mini-title">
                            <div class="ui star rating" data-rating="4"></div>
                            <i class="fas fa-share-alt share-ico"></i>
                            <div id="share"></div>
                        </div>
                        <div class="price ori">Rp.50.000</div>
                        <div class="price dis" style="font-size: 1.6rem">Rp.20.000</div>
                        <hr>
                        <div><i class="fas fa-shopping-cart text-main"></i> Minimal Pemesanan 100 Pax</div>
                    </div>
                    <div class="col-12 col-md-5">
                        <table>
                            <tr>
                                <td>
                                    <img class="small-pic-dapur" src="https://i0.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png"
                                    alt="">
                                </td>
                                <td>Dapur Bu Doni</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div class="ui star rating" data-rating="5"></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </main>
@endsection