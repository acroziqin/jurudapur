@extends('layouts.master')

@section('title', 'Jurudapur')

@section('cssTambahan')
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('css/dpNumberPicker-2.x-skin.grey.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/material-datetime-picker.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection

@section('content')
    <main class="container">
		<div class="card p-3">
			<form action="" method="post">
				<div>
					<h3>Pesan</h3>
				</div>
				<div class="p-1 p-md-3 mb-3 item-order">
					<img src="https://www.bing.com/th?id=OIP.JTajyakNyf3yl72b6cmBAgHaE8&pid=Api&w=5616&h=3744&rs=1&p=0" alt="" class="mini-img">
					<div class="title">{{ $makanan['nama'] }}</div>
					<div id='np' style="align-self:center;"></div>
				</div>
				<div class="form-group">
					<h3>Waktu dan Tempat</h3>
					<input id="date" type="text" name="c-datepicker-btn" class="form-control">
				</div>
				<div class="form-group payment">
					<h3>Metode Pembayaran</h3>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="payment" id="bank-tf" value="bank-transfer" required>
						<label class="form-check-label" for="bank-tf">
							Transfer Bank
						</label>
						<div class="collapse" id="collapseBT">
							<div class="card card-body">
								<div class="row">
									<div class="col-12">
										{{-- <center> --}}
											<h3>Transfer Bank</h3>
											<h5>Bank Mandiri</h5>
											<b>102-00-0526387-3</b> <span>(Contoh)</span>
										{{-- </center> --}}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="payment" id="cod" value="cod">
						<label class="form-check-label" for="cod">
							Cash On Delivery <b>(COD)</b>
						</label>
					</div>
				</div>
				<div class="form-group">
					<h3>Metode Pengantaran</h3>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="shipment" id="antar" value="antar" required>
						<label class="form-check-label" for="antar">Diantar ke Lokasi (Ongkir) * Kota Malang</label>
						<div class="collapse" id="collapseAntar">
							<div class="card card-body">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label for="z">Kecamatan</label>
											<select class="form-control" id="z">
												<option>Blimbing</option>
												<option>Kedungkandang</option>
												<option>Klojen</option>
												<option>Lowokwaru</option>
												<option>Sukun</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="shipment" id="ambil" value="ambil">
						<label class="form-check-label" for="ambil">
							Ambil Sendiri
						</label>
					</div>
				</div>
				<button type="submit">Kirim</button>
			</form>
		</div>
	</main>
@endsection

@section('jsTambahan')
	<!-- Optional script -->
	<script src="{{ URL::asset('js/dpNumberPicker-2.x.min.js') }}"></script>
	<script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/rome/2.1.22/rome.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.js"></script>
	<script src="{{ URL::asset('js/material-datetime-picker.js') }}" charset="utf-8"></script>
	<script>
		$(document).ready(function () {
			dpUI.numberPicker("#np", {
				start: 20, // GANTI DENGAN MINIMAL PEMESANAN
				min: 20, // GANTI DENGAN MINIMAL PEMESANAN
				step: 1,
			});
			const input = document.querySelector('#date');
			const picker = new MaterialDatetimePicker({
					dateValidator: function (d) {
						var m = moment(d);
						var y = m.year();
						var f = 'MM-DD-YYYY';
						var start = moment().add(10, 'years').endOf('day');
						var end = moment().endOf('day');
						return m.isBefore(start) && m.isAfter(end);
					},
				})
				.on('submit', (val) => {
					input.value = val.format("HH:mm - DD/MM/YYYY");
				});
			input.addEventListener('focus', () => {
				picker.open();
			});
			$('[name="payment"]').on('change', function () {
				if ($(this).val() === "bank-transfer") {
					$('#collapseBT').collapse('show');
				} else {
					$('#collapseBT').collapse('hide');
				}
			});
			$('[name="shipment"]').on('change', function () {
				if ($(this).val() === "antar") {
					$('#collapseAntar').collapse('show');
				} else {
					$('#collapseAntar').collapse('hide');
				}
			});
		});
	</script>
@endsection