@extends('layouts.master')

@section('title', 'Jurudapur')

@section('cssTambahan')

@endsection

@section('content')
<main class="container">
    <section class="menu menu-dapur">
		@foreach ($menus as $menu)
			<a href="{{-- URL::route('products.detail', $makan->id) --}}" class="menu-item">
				<div>
					<img class="img lazyload" src="https://placehold.it/200x150&text=1" data-src="https://craftlog.com/m/i/1939076=s1280=h960" alt="">
					<div class="content">
						<div class="title">{{ $menu['nama'] }}</div>
						<div class="desc">
							<div>{{ $menu['jenis'] }}</div>
						</div>
						{{-- <div class="price ori">{{ $makan->jenis }}</div> --}}
						<div class="price dis">{{ $menu['harga']}}
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
