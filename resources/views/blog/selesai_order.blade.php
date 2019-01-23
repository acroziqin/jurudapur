@extends('layouts.master')

@section('title', 'Jurudapur')


{{-- Butuh kode pemesanan yg digenerate ketika membuat pemesanan
	Butuh value lokasi ketemuan dari form pemesanan sebelumnya --}}


@section('content')
    <main class="container d-flex align-items-center">
        <div class="row justify-content-center align-items-center" style="flex: 1;">
            <div class="col-12 col-md-8">
                <div class="card p-4 text-center">
					{{-- <h3 class="text-success">{{ __('Selamat!! Pesanan telah berhasil dibuat') }}</h3> --}}
					<h3 class="text-success">{{ __('Selamat!! Pesanan telah berhasil dibuat dan tagihan telah terkirim ke email Anda.') }}</h3>
					<br>
					<h5>Untuk selanjutnya silahkan hubungi Admin untuk konfirmasi kembali waktu dan tempat pembayaran DP.<br>Minimal DP 50% dari biaya total.</h5>
					<br>
					<a target="_blank"href="https://wa.me/6285236335124?text=Saya sudah pesan, dengan kode pemesanan {{ "kode pesan" }}. Pembayaran DP {{ "value dari form pesan" }}.">
						<button type="button" class="btn btn-primary">Hubugi Admin Via WhatsApp</button>
					</a>
                </div>
            </div>
        </div>
    </main>
@endsection
