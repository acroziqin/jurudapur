@extends('layouts.master')

@section('title', 'Jurudapur')


{{-- Butuh kode pemesanan yg digenerate ketika membuat pemesanan
Butuh value lokasi ketemuan dari form pemesanan sebelumnya --}}


@section('content')
<main class="container d-flex align-items-center">
    <div class="row justify-content-center align-items-center" style="flex: 1;">
        <div class="col-12 col-md-8">
            <div class="card p-4 text-center">
                <h3 class="text-success">{{ __('Selamat!! Pesanan telah berhasil dibuat') }}</h3>
                <br>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Nomor Pemesanan</td>
                            <td>:</td>
                            <td>{{ $order->order_number }}</td>
                        </tr>
                        <tr>
                            <td>Menu</td>
                            <td>:</td>
                            <td>{{ $menu->nama }}</td>
						</tr>
						<tr>
                            <td>Harga</td>
							<td>:</td>
                            <td>{{ money($harga) }}</td>
                        </tr>
                        <tr>
                            <td>Kuantitas</td>
                            <td>:</td>
                            <td>{{ $order->quantity }}</td>
                        </tr>
						@if($antar)
						<tr>
                            <td><b>Sub Total</b></td>
                            <td><b>:</b></td>
                            <td><b>{{ money($subTotal) }}</b></td>
						</tr>
						<tr>
                            <td>Ongkir</td>
                            <td>:</td>
                            <td>{{ money($ongkir) }}</td>
						</tr>
						@endif
						<tr>
                            <td><b>Total</b></td>
                            <td><b>:</b></td>
                            <td><b>{{ money($total) }}</b></td>
						</tr>
                    </tbody>
                </table>
                <br>
                <h5>Untuk selanjutnya silahkan hubungi Admin untuk konfirmasi kembali waktu dan tempat pembayaran DP.<br>Minimal
                    DP 50% dari biaya total.</h5>
                <br>
                <a target="_blank" href="https://wa.me/6285236335124?text=Saya sudah pesan, dengan kode pemesanan {{ $order->order_number }}. Pembayaran DP : {{ $order->payment_location }}.">
                    <button type="button" class="btn btn-primary">Hubugi Admin Via WhatsApp</button>
                </a>
            </div>
        </div>
    </div>
</main>
@endsection
