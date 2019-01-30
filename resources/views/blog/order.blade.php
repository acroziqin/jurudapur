@extends('layouts.master')

@section('title', 'Jurudapur')

@section('cssTambahan')
<link type="text/css" rel="stylesheet" href="{{ URL::asset('css/dpNumberPicker-2.x-skin.grey.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/material-datetime-picker.css') }}">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection

@section('content')
    <main class="container">
		<div class="row">
			<div class="card p-3 col-8">
			{!! Form::open(['route' => 'orders.store']) !!}
			{{-- <form action="{{ URL::route('orders.store') }}" method="post"> --}}
				<div>
					<h3>Pesan</h3>
				</div>

				{{-- kuantitas --}}
				{{-- ingredients_code = isio1, isix1, dll --}}
				<div class="p-1 p-md-3 mb-3 item-order">
					<img src="https://www.bing.com/th?id=OIP.JTajyakNyf3yl72b6cmBAgHaE8&pid=Api&w=5616&h=3744&rs=1&p=0" alt="" class="mini-img">
					<div class="title"><b>{{ $menu['nama'] }}</b>
						<br><br>
						@if ($jenis_menu == 'makanan')
                            Pilihan Isi :
                        @endif
						<br>
						@php $j = 0 @endphp
						@for ($i = 0; $i < count($isi); $i++)
							@if ($input_type[$i] == 'x')
								@php $type = 'checkbox'; $name = 'isix'. $i; $checked = true @endphp
							@else
								@php $type = 'radio'; $name = 'isio' . $input_type[$i] @endphp
								@if ($j == 0)
									@php $checked = true @endphp
								@else
									@php $checked = false @endphp
								@endif	
							@endif
							{!! Form::$type($name, $isi_makanan[$i], $checked, ['id' => 'isi'.$i]) !!}
							@php $j++ @endphp
							{!! Form::label('isi'.$i, $isi[$i], ['class' => 'form-check-label']) !!}
							<br>
							@if ($i < count($isi)-1)
								@if ($menu['kode_isi'][$i] == '1')
									@php $hr = '<hr>'; $j = 0 @endphp
								@else
									@php $hr = '' @endphp
								@endif
							@endif
							{{-- <input type="{{ $type }}" name="{{ $name }}" id="isi{{ $i }}" value="{{ $isi[$i] }}" checked> --}}
							{!! $hr !!}
						@endfor
					</div>
					<div id='np' style="align-self:center;"></div>
				</div>

				{{-- no_hp --}}
				<div class="form-group">
					<h3>Nomor HP</h3>
					<input id="no_hp" type="tel" name="no_hp" class="form-control" placeholder="Nomor Handphone">
				</div>

				{{-- date --}}
				<div class="form-group">
					<h3>Waktu</h3>
					{{-- <input id="date" type="text" name="date" class="form-control" placeholder="HH:mm DD/MM/YYYY" required> --}}
					{!! Form::text('date', null, ['id' => 'date', 'class' => 'form-control', 'placeholder' => 'HH:mm DD/MM/YYYY', 'autocomplete'=>'off']) !!}
				</div>

				{{-- payment = cod --}}
				{{-- lokasi_ketemuan --}}
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
						{{-- <input class="form-check-input" type="hidden" name="payment" id="cod" value="cod" required> --}}
						{!! Form::hidden('payment', 'cod') !!}
						<label class="form-check-label" for="lokasi_ketemuan">
							Cash On Delivery <b>(COD)</b>
						</label>
						<div {{--class="collapse" id="collapseCOD"--}}>
							<div class="card card-body">
								<div class="form-group">
									<label for="lokasi_ketemuan">Waktu dan Tempat ketemuan</label>
									{{-- <input type="text" class="form-control" id="lokasi-ketemuan" name="lokasi-ketemuan" required> --}}
									{!! Form::text('lokasi_ketemuan', null, ['id' => 'lokasi_ketemuan', 'class' => 'form-control']) !!}
									<small id="emailHelp" class="form-text text-muted">Pembayaran DP minimal 50%. Pembayaran DP dilakukan sebelum hari H.</small>
								</div>
							</div>
						</div>
					</div>
				</div>

				{{-- shipment --}}
				<div class="form-group shipment">
					<h3>Metode Pengantaran</h3>
					<div class="form-check">
						{{-- <input class="form-check-input" type="radio" name="shipment" id="antar" value="antar" required> --}}
						{!! Form::radio('shipment', 'antar', false, ['id'=> 'antar', 'class' => 'form-check-input']) !!}
						<label class="form-check-label" for="antar">Diantar ke Lokasi (Ongkir) * Kota Malang</label>
						<div class="collapse" id="collapseAntar">
							<div class="card card-body">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label for="kecamatan">Kecamatan</label>
											{{-- <select class="form-control" id="kecamatan" name="kecamatan">
												<option value="" selected>-- Pilih Kecamatan --</option>
												<option value="Blimbing">Blimbing</option>
												<option value="Kedungkandang">Kedungkandang</option>
												<option value="Klojen">Klojen</option>
												<option value="Lowokwaru">Lowokwaru</option>
												<option value="Sukun">Sukun</option>
											</select> --}}
											{!! Form::select('kecamatan', [
												'Blimbing' => 'Blimbing',
												'Kedungkandang' => 'Kedungkandang',
												'Klojen' => 'Klojen',
												'Lowokwaru' => 'Lowokwaru',
												'Sukun' => 'Sukun',
											], null, ['placeholder' => '-- Pilih Kecamatan --', 'id' => 'kecamatan', 'class' => 'form-control']) !!}
										</div>
										<div class="form-group">
											<label for="alamat_lengkap">Alamat Lengkap</label>
											{{-- <textarea name="alamat_lengkap" placeholder="Alamat Lengkap" class="form-control" id="alamat_lengkap"></textarea> --}}
											{!! Form::textarea('alamat_lengkap', null, ['id' => 'alamat_lengkap', 'class' => 'form-control', 'placeholder' => 'Alamat Lengkap', 'rows' => 3]) !!}
										</div>
										<div>
											<b>Ongkir : Rp. </b><b class="ongkir" id="ong"></b>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-check">
						{{-- <input class="form-check-input" type="radio" name="shipment" id="ambil" value="ambil"> --}}
						{!! Form::radio('shipment', 'ambil', false, ['id'=> 'ambil', 'class' => 'form-check-input']) !!}
						<label class="form-check-label" for="ambil">
							Ambil Sendiri
						</label>
						<div class="collapse" id="collapseAmbil">
							{{-- <div class="card card-body">
								Pengambilan langsung di Rumah {{ $dapur['nama'] }}
							</div> --}}
							{{-- {!! Form::hidden('kecamatan', $dapur['lokasi']) !!} --}}
							{!! Form::text('alamat_lengkap', $dapur['alamat'], ['id' => 'date', 'class' => 'form-control', 'readonly']) !!}
						</div>
					</div>
				</div>
				
				<button type="submit" class="btn btn-primary btn-block" role="button">Pesan</button>
				{{ csrf_field() }}
				{!! Form::hidden('menu_type', $jenis_menu) !!}
				{!! Form::hidden('menu_id', $menu_id) !!}
				{{-- {!! Form::hidden('total_price', null, ['class' => 'total']) !!} --}}
				{{-- <input type="hidden" name="_method" value="PUT"> --}}
				{{-- </form> --}}
				{!! Form::close() !!}
			</div>
			<div class="card p-3 col-4">
				<table id="invoice" class="table table-borderless">
					<tr>
						<td>{{ $menu['nama'] }}</td>
						<td id="np"><span class="kuantitas">20</span>x</td>
						<td>Rp.</td>
						<td>{{ number_format($menu['harga'], 0, ",", ".") }}</td>
					</tr>
					<tr style="border-top:1pt solid black;">
						<td colspan="2">Sub total</td>
						<td><b>Rp.</b></td>
						<td><b class="subtotal"></b></td>
					</tr>
					<tr style="display: none">
						<td colspan="2">Ongkir</td>
						<td>Rp.</td>
						<td class="ongkir">-</td>
					</tr>
					<tr>
						<td colspan="2"><b>Total</b></td>
						<td><b>Rp.</b></td>
						<td><b class="total"></b></td>
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
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
				'Accept' : 'Application/JSON'
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
			var id_dapur = "{{ $menu['id_dapur'] }}";
			var kecamatan = $(this).val();
			var sub_total = $('#np input').val() * {{ $menu['harga'] }};

			$.ajax({
				type: 'GET',
				url: "{{ route('kecamatan') }}",
				data: {id_dapur:id_dapur, kecamatan:kecamatan, sub_total:sub_total},
				success:function(data){
					$(".ongkir").html(data.success);
					$('.total').html(data.total);
				}
			});
		});
		$('input[name="shipment"]').change(function(e){
			let me = $(this);
			if(me.val() == 'ambil'){
				$(".ongkir").html('0');
				$('.total').html($('.subtotal').html());
				$('#kecamatan').val('');
				$('#invoice tr:nth-child(3)').css('display','none');
			}else{
				$('#invoice tr:nth-child(3)').css('display','table-row');
			}
		})
		$(document).ready(function () {
			dpUI.numberPicker("#np", {
				start: 20, // GANTI DENGAN MINIMAL PEMESANAN
				min: 20, // GANTI DENGAN MINIMAL PEMESANAN
				max: 100,
				// max: {{ $dapur['kuota'] == '' ? 0 : $dapur['kuota']}},
				step: 1,
			});
			const input = document.querySelector('#date');
			const picker = new MaterialDatetimePicker({
				default: moment().add(3,'days'),
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
			var subtotal = $('[name="kuantitas"]').val() * "{{ $menu['harga'] }}";
			$('.subtotal').html(rupiah(subtotal));
			$('.total').html(rupiah(subtotal));
			$('.dpui-numberPicker-increase').on('click', function () {
				$('.kuantitas').html($('[name="kuantitas"]').val());
				var subtotal = $('[name="kuantitas"]').val() * "{{ $menu['harga'] }}";
				$('.subtotal').html(rupiah(subtotal));
				if(ongkir != null){
					var ongkir = $('#ong').text(),
						ongkir = parseInt(ongkir.replace('.', ''));
						total = subtotal + ongkir;
				} else {
					var total = subtotal;
				}
				$('.total').html(rupiah(total));
			});
			$('.dpui-numberPicker-decrease').on('click', function () {
				$('.kuantitas').html($('[name="kuantitas"]').val());
				var subtotal = $('[name="kuantitas"]').val() * "{{ $menu['harga'] }}";
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
