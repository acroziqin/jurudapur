<form action="" class="form">
	<div class="form-group">
		<input type="checkbox" class="form-control" disabled {{ $data['order']->isdone ? 'checked' : '' }}/>
		<label for="" class="bmd-label-floating">Status Pemesanan</label>
	</div>
	<div class="form-group">
		<label for="" class="bmd-label-floating">Nomor Pemesanan</label>
		<input type="text" class="form-control" value="{{ $data['order']->order_number }}"disabled/>
	</div>
	<div class="form-group">
		<label for="" class="bmd-label-floating">Tipe</label>
		<input type="text" class="form-control" value="{{ $data['menu']->tipe }}"disabled/>
	</div>
	<div class="form-group">
		<label for="" class="bmd-label-floating">Nama Pemesan</label>
		<input type="text" class="form-control" value="{{ $data['user']->name }}"disabled/>
	</div>
	<div class="form-group">
		<label for="" class="bmd-label-floating">Nama Menu</label>
		<input type="text" class="form-control" value="{{ $data['menu']->nama }}"disabled/>
	</div>
	<div class="form-group">
		<label for="" class="bmd-label-floating">Dapur</label>
		<input type="text" class="form-control" value="{{ $data['dapur']->nama }}" disabled/>
	</div>
	<div class="form-group">
		<label for="" class="bmd-label-floating">Kuantitas</label>
		<input type="text" class="form-control" value="{{ $data['order']->quantity }}" disabled/>
	</div>
	<div class="form-group">
		<label for="" class="bmd-label-floating">Total Biaya</label>
		<input type="text" class="form-control" value="{{ money($data['order']->total_price) }}" disabled/>
	</div>
	<div class="form-group">
		<label for="" class="bmd-label-floating">Nomor Telphone</label>
		<input type="text" class="form-control" value="{{ $data['order']->phone_number }}" disabled/>
	</div>
	<div class="form-group">
		<label for="" class="bmd-label-floating">Tanggal Pesan</label>
		<input type="text" class="form-control" value="{{ $data['order']->delivery_date }}" disabled/>
	</div>
	<div class="form-group">
		<label for="" class="bmd-label-floating">Lokasi Pembayaran DP</label>
		<input type="text" class="form-control" value="{{ $data['order']->payment_location }}" disabled/>
	</div>
	<div class="form-group">
		<label for="" class="bmd-label-floating">Metode Pengantaran Pesanan</label>
		<input type="text" class="form-control" value="{{ $data['order']->shipment_method }}" disabled/>
	</div>
	<div class="form-group">
		<label for="" class="bmd-label-floating">Lokasi Kecamatan</label>
		<input type="text" class="form-control" value="{{ $data['order']->shipment_subdistrict }}" disabled/>
	</div>
	<div class="form-group">
		<label for="" class="bmd-label-floating">Alamat Lengkap</label>
		<input type="text" class="form-control" value="{{ $data['order']->shipment_location }}" disabled/>
	</div>
</form>