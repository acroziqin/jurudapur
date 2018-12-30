@extends('layouts.master')

@section('title', 'Jurudapur')

@section('content')
<main class="container d-flex align-items-center">
		<div class="row justify-content-center align-items-center" style="flex: 1;">
			<div class="col-12 col-sm-8 col-md-6 col-lg-5">
				<div class="card w-100 p-4">
					<h3>Registrasi</h3>
					<form action="/login">
						<div class="form-group">
							<input type="text" name="name" class="form-control" id="inputName" aria-describedby="name" placeholder="Nama Anda">
						</div>
						<div class="form-group">
							<input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="email" placeholder="Your Email">
						</div>
						<div class="form-group">
							<input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
						</div>
						<div class="form-group">
							<input type="text" name="address" class="form-control" id="inputAddress" aria-describedby="address" placeholder="Alamat">
						</div>
						<div class="form-group">
							<input type="tel" name="phone" class="form-control" id="inputPhone" aria-describedby="phone" placeholder="Nomor HP">
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="lk" id="inputLk" value="lk">
							<label class="form-check-label" for="inlineRadio1">Laki-laki</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="pr" id="inpurPr" value="pr">
							<label class="form-check-label" for="inlineRadio2">Perempuan</label>
						</div>
						<div class="custom-file" style="margin: 1rem 0;">
							<label class="custom-file-label" for="inputPhoto">Pilih Foto</label><br>
							<input type="file" class="custom-file-input" id="inputPhoto" name="photo">
						</div>
						<button type="submit" class="btn btn-primary">Daftar</button>
					</form>
				</div>
			</div>
		</div>
	</main>

@endsection
