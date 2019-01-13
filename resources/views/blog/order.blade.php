@extends('layouts.master')

@section('title', 'Jurudapur')

@section('cssTambahan')
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('css/dpNumberPicker-2.x-skin.grey.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/material-datetime-picker.css') }}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
    <main class="container">
		<div class="row">
			<div class="card p-3 col-8">
			<form action="" method="post">
				<div>
					<h3>Pesan</h3>
				</div>

				{{-- kuantitas --}}
				<div class="p-1 p-md-3 mb-3 item-order">
					<img src="https://www.bing.com/th?id=OIP.JTajyakNyf3yl72b6cmBAgHaE8&pid=Api&w=5616&h=3744&rs=1&p=0" alt="" class="mini-img">
					<div class="title">{{ $makanan['nama'] }}</div>
					<div id='np' style="align-self:center;"></div>
				</div>

				{{-- waktu --}}
				<div class="form-group">
					<h3>Waktu</h3>
					<input id="date" type="text" name="date" class="form-control" placeholder="HH:mm DD/MM/YYYY" required>
				</div>

				{{-- payment = cod --}}
				{{-- lokasi-ketemuan --}}
				<div class="form-group payment">
					<h3>Metode Pembayaran</h3>
					{{-- <div class="form-check">
						<input class="form-check-input" type="radio" name="payment" id="bank-tf" value="bank-transfer" required>
						<label class="form-check-label" for="bank-tf">
							Transfer Bank
						</label>
						<div class="collapse" id="collapseBT">
							<div class="card card-body">
								<div class="row">
									<div class="col-12">
										<h3>Transfer Bank</h3>
										<h5>Bank Mandiri</h5>
										<b>102-00-0526387-3</b> <span>(Contoh)</span>
									</div>
								</div>
							</div>
						</div>
					</div> --}}
					<div class="form-check">
						{{-- <input class="form-check-input" type="radio" name="payment" id="cod" value="cod"> --}}
						<input class="form-check-input" type="hidden" name="payment" id="cod" value="cod" required>
						<label class="form-check-label" for="cod">
							Cash On Delivery <b>(COD)</b>
						</label>
						<div {{--class="collapse" id="collapseCOD"--}}>
							<div class="card card-body">
								<div class="form-group">
									<label for="exampleInputEmail1">Lokasi Ketemuan</label>
									<input type="text" class="form-control" id="lokasi-ketemuan" name="lokasi-ketemuan">
									<small id="emailHelp" class="form-text text-muted">Pembayaran DP minimal 50%. Pembayaran DP dilakukan sebelum
										hari H.</small>
								</div>
							</div>
						</div>
					</div>
				</div>

				{{-- shipment --}}
				<div class="form-group shipment">
					<h3>Metode Pengantaran</h3>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="shipment" id="antar" value="antar" required>
						<label class="form-check-label" for="antar">Diantar ke Lokasi (Ongkir) * Kota Malang</label>
						<div class="collapse" id="collapseAntar">
							<div class="card card-body">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label for="kecamatan">Kecamatan</label>
											<select class="form-control" id="kecamatan">
												<option value="" selected>-- Pilih Kecamatan --</option>
												<option value="Blimbing">Blimbing</option>
												<option value="Kedungkandang">Kedungkandang</option>
												<option value="Klojen">Klojen</option>
												<option value="Lowokwaru">Lowokwaru</option>
												<option value="Sukun">Sukun</option>
											</select>
										</div>
										<div>
											<b>Ongkir : Rp. </b><b class="ongkir" id="ong"></b>
											{{-- // ONGKIR dihitung di backend.
											Misal dapur berada di kecamatan Blimbing. Lalu pengantaran di kec. Sukun.
											Maka langsung ambil dari database kita Blimbing ke Sukun.
											Blimbing ke Sukun != Sukun ke Blimbing.
											Membuat relasi many to many --}}
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
						<div class="collapse" id="collapseAmbil">
							<div class="card card-body">
								Pengambilan di alamat : Jl. Blimbing No.100, Kota Malang
							</div>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary btn-block" role="button">Pesan</button>
				</form>
			</div>
			<div class="card p-3 col-4">
				<table class="table">
					<tr>
						<td>{{ $makanan['nama'] }}</td>
						<td id="np"><span class="kuantitas">20</span>x</td>
						<td>Rp.</td>
						<td>{{ number_format($makanan['harga'], 0, ",", ".") }}</td>
					</tr>
					<tr>
						<td colspan="2">Sub total</td>
						<td><b>Rp.</b></td>
						<td><b class="subtotal"></b></td>
					</tr>
					<tr>
						<td colspan="2">Ongkir</td>
						<td>Rp.</td>
						<td class="ongkir"></td>
					</tr>
					<tr>
						<td colspan="2"><b>Total</b></td>
						<td><b>Rp.</b></td>
						<td><b id="total"></b></td>
					</tr>
				</table>
			</div>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
		});

		function rupiah(uang) {
			var	number_string = uang.toString(),
				sisa 	= number_string.length % 3,
				rupiah 	= number_string.substr(0, sisa),
				ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
			if (ribuan) {
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
			return rupiah;
		}
		
        $("#kecamatan").change(function(e){
            e.preventDefault();
            var id_dapur = "{{ $makanan['id_dapur'] }}";
			var kecamatan = $(this).val();
			var sub_total = $('[name="kuantitas"]').val() * "{{ $makanan['harga'] }}";
            $.ajax({
                type: 'POST',
                url: "{{ route('kecamatan') }}",
                data: {id_dapur:id_dapur, kecamatan:kecamatan, sub_total:sub_total},
                success:function(data){
                    // alert(data.success);
					$(".ongkir").html(data.success);
					$('#total').html(data.total);
                }
			});
		});
		
		$(document).ready(function () {
			dpUI.numberPicker("#np", {
				start: 20, // GANTI DENGAN MINIMAL PEMESANAN
				min: 20, // GANTI DENGAN MINIMAL PEMESANAN
				max: "{{ $dapur['kuota'] }}",
				step: 1,
			});
			const input = document.querySelector('#date');
			const picker = new MaterialDatetimePicker({
				default: moment().add(2,'days'),
				dateValidator: function (d) {
					var m = moment(d);
					var y = m.year();
					var f = 'MM-DD-YYYY';
					var start = moment().add(10, 'years').endOf('day');
					var end = moment().add(2,'days');
					return m.isBefore(start) && m.isAfter(end);
				},
			})
			.on('submit', (val) => {
				if(val.isAfter(moment().add(2,'days')))
					input.value = val.format("HH:mm - DD/MM/YYYY");
				else
					alert("Hari H setidaknya 2 hari setelah tanggal pesan (hari ini)");
			});
			input.addEventListener('click', () => {
				picker.open();
			});
			$('[name="payment"]').on('change', function () {
				if ($(this).val() === "bank-transfer") {
					$('#collapseBT').collapse('show');
					$('#collapseCOD').collapse('hide');
				} else {
					$('#collapseBT').collapse('hide');
					$('#collapseCOD').collapse('show');
				}
			});
			$('[name="shipment"]').on('change', function () {
				if ($(this).val() === "antar") {
					$('#collapseAntar').collapse('show');
					$('#collapseAmbil').collapse('hide');
				} else if ($(this).val() == "ambil") {
					$('#collapseAntar').collapse('hide');
					$('#collapseAmbil').collapse('show');
				}
			});
			var subtotal = $('[name="kuantitas"]').val() * "{{ $makanan['harga'] }}";
			$('.subtotal').html(rupiah(subtotal));
			$('#total').html(rupiah(subtotal));
			$('.dpui-numberPicker-increase').on('click', function () {
				$('.kuantitas').html($('[name="kuantitas"]').val());
				var subtotal = $('[name="kuantitas"]').val() * "{{ $makanan['harga'] }}";
				$('.subtotal').html(rupiah(subtotal));
				if(ongkir != null){
					var ongkir = $('#ong').text(),
						ongkir = parseInt(ongkir.replace('.', ''));
						total = subtotal + ongkir;
				} else {
					var total = subtotal;
				}
				$('#total').html(rupiah(total));
			});
			$('.dpui-numberPicker-decrease').on('click', function () {
				$('.kuantitas').html($('[name="kuantitas"]').val());
				var subtotal = $('[name="kuantitas"]').val() * "{{ $makanan['harga'] }}";
				$('.subtotal').html(rupiah(subtotal));
				if(ongkir != null){
					var ongkir = $('#ong').text(),
						ongkir = parseInt(ongkir.replace('.', ''));
						total = subtotal + ongkir;
				} else {
					var total = subtotal;
				}
				$('#total').html(rupiah(total));
			});
		});
	</script>
@endsection