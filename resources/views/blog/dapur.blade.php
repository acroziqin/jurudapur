@extends('layouts.master')

@section('title', 'Jurudapur')

@section('cssTambahan')

@endsection

@section('content')
<main class="container">
    <div class="card dapur-header">
        <img src="{{ $dapur->foto_header==null ? 'https://imagerouter.tokopedia.com/img/1920/shops-1/2018/11/12/24721293/24721293_7e980331-c975-47a7-9109-05101e5a8f5f.jpg' : $dapur->foto_header }}"
            alt="" class="img-header">
        <div class="dapur-detail p-3">
            <img src="{{ $dapur->foto_header==null ? 'https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260' : $dapur->foto_header }}"
                alt="" class="mini-img">
            <div class="section ml-2 ml-md-4" style="flex: 1">
                <h2 class="font-weight-bolder">Dapur {{ $dapur->nama }}</h2>
                <div>{{ $dapur->deskripsi }}</div>
                <br>
                <div><i class="fas fa-map-marker-alt mr-2"></i>{{ isset($dapur->alamat) ? $dapur->alamat : "Malang" }}</div>
            </div>
            <div class="section px-3">
                <div id="shared"></div>
            </div>
        </div>
    </div>
    <br>
    <h2>Makanan</h2>
    <section class="menu menu-dapur">
        @foreach ($makanans as $makanan)
			<a href = "{{ route('product.detail', [ 'menu'=>'makanan', 'id' => $makanan['id'] ]) }}" class = "menu-item">
				<div>
					<img class="img lazyload" src="https://placehold.it/200x150&text=1" data-src="https://craftlog.com/m/i/1939076=s1280=h960" alt="">
					<div class="content">
						<div class="title">{{ $makanan['nama'] }}</div>
						<div class="desc">
							<div>{{ $makanan['jenis'] }}</div>
						</div>
						{{-- <div class="price ori">{{ $makan->jenis }}</div> --}}
						<div class="price dis">{{ $makanan['harga']}}
							<div class="ket"> / Pax</div>
						</div>
					</div>
				</div>
			</a>
		@endforeach
    </section>
    <h2>Minuman</h2>
    <section class="menu menu-dapur">
		@foreach ($minumans as $minuman)
			<a href = "{{ route('product.detail', [ 'menu'=>'makanan', 'id' => $minuman['id'] ]) }}" class = "menu-item">
				<div>
					<img class="img lazyload" src="https://placehold.it/200x150&text=1" data-src="https://craftlog.com/m/i/1939076=s1280=h960" alt="">
					<div class="content">
						<div class="title">{{ $minuman['nama'] }}</div>
						<div class="desc">
							<div>{{ $minuman['jenis'] }}</div>
						</div>
						{{-- <div class="price ori">{{ $makan->jenis }}</div> --}}
						<div class="price dis">{{ $minuman['harga']}}
							<div class="ket"> / Pax</div>
						</div>
					</div>
				</div>
			</a>
		@endforeach
    </section>
    <h2>Kue</h2>
    <section class="menu menu-dapur">
		@foreach ($kues as $kue)
			<a href = "{{ route('product.detail', [ 'menu'=>'makanan', 'id' => $kue['id'] ]) }}" class = "menu-item">
				<div>
					<img class="img lazyload" src="https://placehold.it/200x150&text=1" data-src="https://craftlog.com/m/i/1939076=s1280=h960" alt="">
					<div class="content">
						<div class="title">{{ $kue['nama'] }}</div>
						<div class="desc">
							<div>{{ $kue['jenis'] }}</div>
						</div>
						{{-- <div class="price ori">{{ $makan->jenis }}</div> --}}
						<div class="price dis">{{ $kue['harga']}}
							<div class="ket"> / Pax</div>
						</div>
					</div>
				</div>
			</a>
		@endforeach
    </section>
</main>
@endsection

@section('jsTambahan')
<!-- Optional script -->
<script src="{{ asset('js/jssocials.min.js') }}"></script>
<script src="{{ asset('js/jquery.lazy.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $("#shared").jsSocials({
            shares: ["whatsapp", "twitter", "facebook", "googleplus", "linkedin"]
        });
		$('.lazyload').lazy();
    });

</script>
@endsection
