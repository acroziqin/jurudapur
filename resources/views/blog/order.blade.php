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
            <form action="" method="post">
                <div>
                    <h3>Pesan</h3>
                </div>
                <div class="p-1 p-md-3 mb-3 item-order">
                    <img src="https://www.bing.com/th?id=OIP.JTajyakNyf3yl72b6cmBAgHaE8&pid=Api&w=5616&h=3744&rs=1&p=0"
                        alt="" class="mini-img">
                    <div class="title">{{ $makanan['nama'] }}</div>
                    <div id='np' style="align-self:center;"></div>
                </div>
                <div class="form-group">
                    <h3>Waktu</h3>
                    <input id="date" type="text" name="date" class="form-control" placeholder="HH:mm DD/MM/YYYY"
                        required>
                </div>
                <div class="form-group payment">
                    <h3>Metode Pembayaran</h3>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment" id="bank-tf" value="bank-transfer"
                            required>
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
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment" id="cod" value="cod">
                        <label class="form-check-label" for="cod">
                            Cash On Delivery <b>(COD)</b>
                        </label>
                        <div class="collapse" id="collapseCOD">
                            <div class="card card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Lokasi Ketemuan</label>
                                    <input type="email" class="form-control" id="lokasi-ketemuan" name="lokasi-ketemuan">
                                    <small id="emailHelp" class="form-text text-muted">Pembayaran DP minimal 50%.
                                        Pembayaran DP dilakukan sebelum
                                        hari H.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                            <label for="z">Kecamatan</label>
                                            <select class="form-control" id="z">
                                                <option>Blimbing</option>
                                                <option>Kedungkandang</option>
                                                <option>Klojen</option>
                                                <option>Lowokwaru</option>
                                                <option>Sukun</option>
                                            </select>
                                        </div>
                                        <div>
                                            Ongkir : <b>Rp.20.000</b>
                                            // ONGKIR dihitung di backend.
                                            Misal dapur berada di kecamatan Blimbing. Lalu pengantaran di kec. Sukun.
                                            Maka langsung ambil dari database kita Blimbing ke Sukun.
                                            Blimbing ke Sukun != Sukun ke Blimbing.
                                            Membuat relasi many to many
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
                <span>Dengan menekan tombol "Pesan" Saya telah membaca dan menyetujui <a href="http://google.com">syarat & ketentuan yang berlaku</a></span>
                <button id="btn-submit" type="submit" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModalLong">Pesan</button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Syarat & Ketentuan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body px-5">
                                <p><strong>Pemesanan</strong></p>
                                <ol>
                                    <li>Harap dicermati bahwa beberapa Menu tidak dapat dikonsumsi orang-orang dalam
                                        kondisi tertentu, termasuk namun tidak terbatas kepada orang-orang dengan
                                        kondisi kesehatan atau umur tertentu, Kami menyarankan agar Anda memeriksa
                                        terlebih dahulu apakah Menu yang dipesan tidak memberikan kontraindikasi
                                        terhadap orang yang mengonsumsi.</li>
                                    <li>Foto-foto Menu yang ditampilkan di Situs sekedar ilustrasi, hanya menggambarkan
                                        komposisi umum Menu, oleh karenanya Jurudapur atau Dapur Mitra tidak memberikan
                                        jaminan bahwa penyajian Menu yang diterima Konsumen persis sama dengan foto
                                        Menu.</li>
                                    <li>Pesanan dilakukan maksimal h-3 sebelum pesanan diambil atau diantar ke
                                        konsumen. Pesanan yang melewati batas akan dianggap tidak bisa diproses oleh
                                        Jurudapur.</li>
                                    <li>Kami menyarankan Anda untuk memeriksa ulang Pesanan sebelum mengirimkannya, dan
                                        bila diperlukan Anda dapat mengisi catatan atau instruksi tertentu sehubungan
                                        dengan detail pemesanan. Sesaat setelah Anda mengirimkan Pesanan maka Kami akan
                                        memberikan notifikasi melalui surel, telephone atau layanan pesan singkat (SMS)
                                        bahwa detail pemesanan Anda telah masuk, Anda wajib memberikan koreksi kepada
                                        Kami apabila terdapat hal-hal yang keliru atau tidak tepat.</li>
                                    <li>Selanjutnya Kami akan memeriksa ketersediaan Menu dan kapasitas pesanan dari
                                        Dapur Mitra. Kami akan melakukan konfirmasi via telephone kepada Anda apabila
                                        terdapat Menu yang tidak tersedia atau kekurangan kapasitas pesanan. Dalam hal
                                        semua Menu yang dipesan seluruhnya tersedia dan kapasitas pengantaran mencukupi
                                        maka Kami akan melakukan konfirmasi melalui surel, telephone atau layanan pesan
                                        singkat (SMS) kepada Anda yang berisi detail pengantaran atau pengambilan
                                        termasuk nomor pemesanan (order number), estimasi waktu pengantaran atau
                                        pengambilan dan Biaya Pesanan.</li>
                                    <li>Perubahan menu, komposisi menu atau tanggal pesanan diterima konsumen maksimal
                                        dilakukan h-3 sebelum tanggal pesanan diterima oleh konsumen.</li>
                                </ol>
                                <p>&nbsp;</p>
                                <p><strong><strong>Harga dan Cara Pembayaran</strong></strong></p>
                                <ol>
                                    <li>Harga Menu dan Jasa yang ditawarkan menggunakan mata uang Rupiah. Kecuali
                                        dengan tegas disebutkan lain, harga yang tercantum tidak termasuk beban layanan
                                        yang sepenuhnya ditanggung oleh Konsumen.</li>
                                    <li>Semua harga yang tercantum di Situs adalah benar pada saat publikasi; meski
                                        demikian Kami berhak untuk merubahnya sewaktu-waktu. Kami berusaha untuk
                                        menjaga agar harga yang tercantum senantiasa terbaru (update). Dalam hal
                                        terjadi kenaikan harga sesaat setelah Anda memasukkan pesanan maka Kami akan
                                        memberitahukan perubahan itu kepada Anda dan Anda memiliki hak untuk
                                        membatalkan pesanan.</li>
                                    <li>Biaya Pesanan akan ditampilkan di Situs ketika Anda memasukkan Pesanan.
                                        Pembayaran harus dilakukan secara penuh. Metode pembayaran yang Kami layani
                                        yaitu: Transfer bank (via atm, iBanking, m-Banking) &nbsp;ke Rekening Jurudapur
                                        melalui pihak ketika (payment gateway).</li>
                                    <li>Bila Anda memilih metode pembayaran secara tranfer bank maka pembayaran wajib
                                        dilakukan sesaat setelah Pesanan Terkonfirmasi.</li>
                                    <li>Pembayaran bisa langsung lunas atau down payment (DP) sebesar 25% dari total
                                        biaya pesanan serta wajib dilunasi ketika pesanan sudah diterima oleh konsumen.
                                        Apabila total pesanan lebih dari nominal 10 juta maka akan mendapat keringanan
                                        berupa penundaan pelunasan setelah 7 hari terhitung sejak pesanan diterima oleh
                                        konsumen.</li>
                                </ol>
                                <p><strong><strong>&nbsp;</strong></strong></p>
                                <p><strong><strong>Pembatalan Pesanan</strong></strong></p>
                                <p>Anda berhak melakukan pembatalan Pesanan setiap saat sepanjang status Pesanan belum
                                    berubah menjadi Pesanan Terkonfirmasi.</p>
                                <p>&nbsp;</p>
                                <p><strong><strong>Pengantaran Pesanan</strong></strong></p>
                                <ol>
                                    <li>Pengantaran Pesanan dilakukan oleh Jurudapur. Oleh karenanya Konsumen setuju
                                        untuk membebaskan Jurudapur dari segala bentuk keluhan, klaim atau gugatan yang
                                        timbul sehubungan pengantaran Pesanan yang dilakukan oleh Jurudapur.</li>
                                    <li>Jam Pengantaran bersifat perkiraan dan hasilnya mungkin berbeda karena turut
                                        dipengaruhi oleh faktor-faktor luar termasuk namun tidak terbatas kepada
                                        kepadatan lalu lintas. Jurudapur &nbsp;berupaya sunguh-sungguh agar waktu
                                        pengantaran tidak meleset dari yang disampaikan.</li>
                                    <li>&nbsp;Dalam hal Pesanan gagal diantar sampai alamat tujuan akibat Konsumen
                                        tidak memberikan informasi alamat dan nomor telephone secara detail, lengkap
                                        dan akurat maka Pesanan dianggap telah diterima Konsumen begitu Kami
                                        mengirimkan notifikasi mengenai hal ini melalui surel atau layanan pesan
                                        singkat (SMS); Konsumen wajib melunasi Biaya Pesanan dan beban-beban lain
                                        sehubungan penanganan Pesanan termasuk namun tidak terbatas kepada biaya
                                        penyimpanan atau pembuangan.</li>
                                    <li>Segala manfaat atau resiko yang timbul atas Pesanan menjadi keuntungan atau
                                        tanggung jawab Konsumen saat Pesanan diterima oleh Konsumen. Kami tidak dapat
                                        dimintakan pertanggungjawaban atas segala bentuk kerugian yang timbul dan
                                        dialami Konsumen pada saat/setelah Pesanan diterima oleh Konsumen.</li>
                                </ol>
                                <p>&nbsp;</p>
                                <p><strong><strong>Keluhan dan Penanganan</strong></strong></p>
                                <ol>
                                    <li>Jurudapur menampung segala bentuk saran, kritik atau keluhan Anda. Kami
                                        menyediakan ruang dan fasilitas bagi Anda untuk menyampaikan saran, kritik dan
                                        keluhan melalui email <a href="mailto:jurudapur@gmail.com">jurudapur@gmail.com</a></li>
                                    <li>Jurudapur akan menangani saran, kritik atau keluhan yang Anda sampaikan secara
                                        proporsional sesuai dengan kemampuan atau kewenangan yang Kami miliki. Kami
                                        tidak berwenang untuk memutuskan, memberikan atau mengmplementasikan solusi
                                        terhadap saran, kritik atau keluhan sehubungan dengan hal-hal yang menjadi
                                        tanggung jawab Dapur Mitra.</li>
                                    <li>Dalam hal saran, kritik dan keluhan yang disampaikan berkaitan dengan tanggung
                                        jawab Dapur Mitra a maka Kami akan menyampaikannya kepada yang bersangkutan.</li>
                                    <li>Konsumen setuju untuk membebaskan Jurudapur dari segala bentuk tanggung jawab
                                        dan tidak melibatkan Kami dalam hal-hal yang terkait dengan tanggung jawab
                                        Dapur Mitra, termasuk namun tidak terbatas pada kerugian yang ditimbulkan
                                        akibat mengkonsumsi Menu dari Dapur Mitra.</li>
                                </ol>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">OK, Saya Setuju</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card p-3 col-4">
            <table class="table">
                <tr>
                    <td>Menu Ayam Bakar Z</td>
                    <td>100x</td>
                    <td>Rp.20.000</td>
                </tr>
                <tr>
                    <td colspan="2">Sub total</td>
                    <td><b>Rp.2.000.000</b></td>
                </tr>
                <tr>
                    <td colspan="2">Ongkir</td>
                    <td>Rp.30.000</td>
                </tr>
                <tr>
                    <td colspan="2"><b>Total</b></td>
                    <td><b>Rp.2.030.000</b></td>
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
    $(document).ready(function () {
        dpUI.numberPicker("#np", {
            start: 20, // GANTI DENGAN MINIMAL PEMESANAN
            min: 20, // GANTI DENGAN MINIMAL PEMESANAN
            step: 1,
        });
        $('#btn-submit').submit(function (e) {
            e.preventDefault();

        });
        const input = document.querySelector('#date');
        const picker = new MaterialDatetimePicker({
                default: moment().add(2, 'days'),
                dateValidator: function (d) {
                    var m = moment(d);
                    var y = m.year();
                    var f = 'MM-DD-YYYY';
                    var start = moment().add(10, 'years').endOf('day');
                    var end = moment().add(2, 'days');
                    return m.isBefore(start) && m.isAfter(end);
                },
            })
            .on('submit', (val) => {
                if (val.isAfter(moment().add(2, 'days')))
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
    });

</script>
@endsection
