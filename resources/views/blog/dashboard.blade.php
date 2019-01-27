@extends('layouts.master')

@section('title', 'Jurudapur')

@section('cssTambahan')
	<link type="text/css" rel="stylesheet" href="css/dpNumberPicker-2.x-skin.grey.css">
	<link rel="stylesheet" href="css/material-datetime-picker.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
	<main class="container">
		<div class="row justify-content-center">
			<div class="col-11 col-md-8 card p-2 p-md-3">
				<div class="profile accordion" id="profile">
					@if (is_null(Auth::user()->avatar))
						<img src="https://marketplace.canva.com/MACCp5vBVqY/1/thumbnail_large/canva-male-avatar-MACCp5vBVqY.png" alt="foto-profile" class="img-profile">
					@else
						@if (is_null(Auth::user()->provider_id))
							@php $src = url('storage/avatars/'.Auth::user()->avatar) @endphp
						@else
						@php $src = Auth::user()->avatar @endphp
						@endif
						<img src="{{$src}}" alt="foto-profile" class="img-profile">
					@endif
					<div class="detail">
						<div class="collapse show" id="prof" data-parent="#profile">
							<div class="name">{{ Auth::user()->name }}</div>
							<p class="font-weight-normal">{{ Auth::user()->email }}</p>
							<p class="font-weight-normal">Detail Lainnya</p>
							@if (count($errors) > 0)
								<div class="alert alert-danger">
									Upload Validation Error<br><br>
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
						</div>

						<button id="btn-edit-profile" type="button" class="btn btn-block btn-outline-primary" data-toggle="collapse"
						 data-target="#edit-profile, #prof" aria-expanded="false" aria-controls="edit-profile">Edit Profile</button>
						<br>
						<div class="collapse" id="edit-profile" data-parent="#profile">
							<div class="card card-body">
								<form action="{{ URL::route('profil.edit') }}" method="post" enctype="multipart/form-data">
									<div class="form-group">
										{{-- <label for="name">{{ __('Nama') }}</label> --}}
										<input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="{{ __('Nama') }}">
									</div>
									<div class="form-group">
										<label for="foto">{{ __('Foto Profil') }}</label>
										<input type="file" name="foto" class="form-control-file" id="photo">
									</div>

									<div class="form-group">
										<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Kata Sandi') }}">
			
										@if ($errors->has('password'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif
									</div>
									<div class="form-group">
										<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Konfirmasi Kata Sandi') }}">
									</div>

									<div class="form-group">
										{{-- <label for="name">{{ __('Alamat') }}</label> --}}
										<input type="text" class="form-control" name="alamat" id="name" aria-describedby="emailHelp" placeholder="{{ __('Alamat') }}">
									</div>
									<div class="form-group">
										{{-- <label for="name">{{ __('No. HP') }}</label> --}}
										<input type="text" class="form-control" name="no_hp" id="name" aria-describedby="emailHelp" placeholder="{{ __('No. HP') }}">
									</div>
									<div class="form-group">
										<label for="name">{{ __('Jenis Kelamin') }}</label><br>
										<input type="radio" name="jenis_kelamin" id="lk" aria-describedby="emailHelp" value="laki-laki">
										<label for = "lk">{{ __('Laki-laki') }}</label>
										<input type="radio" name="jenis_kelamin" id="pr" aria-describedby="emailHelp" value="perempuan">
										<label for = "pr">{{ __('Perempuan') }}</label>
									</div>
									<button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
									{{ csrf_field() }}
									<input type="hidden" name="_method" value="PUT">
								</form>
							</div>
						</div>
					</div>

				</div>
				<div class="my-orders table-responsive-md">
					<p class="font-weight-bold">Riwayat Pemesanan</p>
					<table class="table table-bordered">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Nomor Pemesanan</th>
								<th scope="col">Menu</th>
								<th scope="col">Tanggal Pemesanan</th>
								<th scope="col">Jumlah</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">20190101111</th>
								<td>Jgung Bakar</td>
								<td>1 Januari 2019</td>
								<td>50</td>
							</tr>
							<tr>
								<th scope="row">20190105111</th>
								<td>Nasi Kotak Bu Rini</td>
								<td>5 Januari 2019</td>
								<td>200</td>
							</tr>
							<tr>
								<th scope="row">20190110111</th>
								<td>Box Ayam Bakar</td>
								<td>10 Januari 2019</td>
								<td>100</td>
							</tr>
						</tbody>
					</table>
					<nav aria-label="Page navigation example">
						<ul class="pagination justify-content-end">
							<li class="page-item disabled">
								<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Sebelumnya</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<!-- <li class="page-item"><a class="page-link" href="#">2</a></li> -->
							<!-- <li class="page-item"><a class="page-link" href="#">3</a></li> -->
							<li class="page-item">
								<a class="page-link" href="#">Selanjutnya</a>
							</li>
						</ul>
					</nav>
				</div>
				<div class="my-reviews table-responsive-md">
					<p class="font-weight-bold">Riwayat Ulasan</p>
					<table class="table table-bordered">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Nomor Ulasan</th>
								<th scope="col">Ulasan</th>
								<th scope="col">Tanggal Ulasan</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">1</th>
								<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, qui.</td>
								<td>1 Januari 2019</td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia, molestias?</td>
								<td>5 Januari 2019</td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, sunt?</td>
								<td>10 Januari 2019</td>
							</tr>
						</tbody>
					</table>
					<nav aria-label="Page navigation example">
						<ul class="pagination justify-content-end">
							<li class="page-item disabled">
								<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Sebelumnya</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<!-- <li class="page-item"><a class="page-link" href="#">3</a></li> -->
							<li class="page-item">
								<a class="page-link" href="#">Selanjutnya</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</main>
@endsection

@section('jsTambahan')
	<!-- Optional script -->
	<script src=" js/dpNumberPicker-2.x.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/rome/2.1.22/rome.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.js"></script>
	<script src="js/material-datetime-picker.js" charset="utf-8"></script>
	<script>
		$(document).ready(function () {
			$('#btn-edit-profile').click(function (e) {
				let el = $(this);
				if (el.attr('aria-expanded') == 'false') {
					el.html('Batal');
				} else {
					el.html('Edit Profile');
				}
			});
		});
	</script>
	@if (Session::has('cek_password'))
		<script src="https://unpkg.com/sweetalert2@7.17.0/dist/sweetalert2.all.js"></script>
		<script>
		swal({
			type: 'error',
			title: 'Ups...',
			text: 'Kata sandi Anda tidak sama!'
		})
		</script>
	@endif
@endsection