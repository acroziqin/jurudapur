@extends('layouts.master')

@section('title', 'Jurudapur')

@section('content')
    <main class="container d-flex align-items-center">
        <div class="row justify-content-center align-items-center" style="flex: 1;">
            <div class="col-12 col-md-8">
                <div class="card p-4">
                    <h3 class="text-center">{{ __('Syarat Dan Ketentuan') }}</h3>
                    <div class="card" style="max-height: 70vh; overflow:auto;">
                        <div class="card-body" style="padding: 30px">
                            <p style="text-align: justify;"><strong>Pemesanan</strong></p>
                            <ol style="text-align: justify;">
                            <li style="text-align: justify;">Harap dicermati bahwa beberapa Menu tidak dapat dikonsumsi orang-orang dalam kondisi tertentu, termasuk namun tidak terbatas kepada orang-orang dengan kondisi kesehatan atau umur tertentu, Kami menyarankan agar Anda memeriksa terlebih dahulu apakah Menu yang dipesan tidak memberikan kontraindikasi terhadap orang yang mengonsumsi.</li>
                            <li style="text-align: justify;">Foto-foto Menu yang ditampilkan di Situs sekedar ilustrasi, hanya menggambarkan komposisi umum Menu, oleh karenanya Jurudapur atau Dapur Mitra tidak memberikan jaminan bahwa penyajian Menu yang diterima Konsumen persis sama dengan foto Menu.</li>
                            <li style="text-align: justify;">Pesanan dilakukan maksimal h-3 sebelum pesanan diambil atau diantar ke konsumen. Pesanan yang melewati batas akan dianggap tidak bisa diproses oleh Jurudapur.</li>
                            <li style="text-align: justify;">Kami menyarankan Anda untuk memeriksa ulang Pesanan sebelum mengirimkannya, dan bila diperlukan Anda dapat mengisi catatan atau instruksi tertentu sehubungan dengan detail pemesanan. Sesaat setelah Anda mengirimkan Pesanan maka Kami akan memberikan notifikasi melalui surel, telephone atau layanan pesan singkat (SMS) bahwa detail pemesanan Anda telah masuk, Anda wajib memberikan koreksi kepada Kami apabila terdapat hal-hal yang keliru atau tidak tepat.</li>
                            <li style="text-align: justify;">Selanjutnya Kami akan memeriksa ketersediaan Menu dan kapasitas pesanan dari Dapur Mitra. Kami akan melakukan konfirmasi via telephone kepada Anda apabila terdapat Menu yang tidak tersedia atau kekurangan kapasitas pesanan. Dalam hal semua Menu yang dipesan seluruhnya tersedia dan kapasitas pengantaran mencukupi maka Kami akan melakukan konfirmasi melalui surel, telephone atau layanan pesan singkat (SMS) kepada Anda yang berisi detail pengantaran atau pengambilan termasuk nomor pemesanan (order number), estimasi waktu pengantaran atau pengambilan dan Biaya Pesanan.</li>
                            <li style="text-align: justify;">Perubahan menu, komposisi menu atau tanggal pesanan diterima konsumen maksimal dilakukan h-3 sebelum tanggal pesanan diterima oleh konsumen.</li>
                            </ol>
                            <p style="text-align: justify;">&nbsp;</p>
                            <p style="text-align: justify;"><strong><strong>Harga dan Cara Pembayaran</strong></strong></p>
                            <ol style="text-align: justify;">
                            <li style="text-align: justify;">Harga Menu dan Jasa yang ditawarkan menggunakan mata uang Rupiah. Kecuali dengan tegas disebutkan lain, harga yang tercantum tidak termasuk beban layanan yang sepenuhnya ditanggung oleh Konsumen.</li>
                            <li style="text-align: justify;">Semua harga yang tercantum di Situs adalah benar pada saat publikasi; meski demikian Kami berhak untuk merubahnya sewaktu-waktu. Kami berusaha untuk menjaga agar harga yang tercantum senantiasa terbaru (update). Dalam hal terjadi kenaikan harga sesaat setelah Anda memasukkan pesanan maka Kami akan memberitahukan perubahan itu kepada Anda dan Anda memiliki hak untuk membatalkan pesanan.</li>
                            <li style="text-align: justify;">Biaya Pesanan akan ditampilkan di Situs ketika Anda memasukkan Pesanan. Pembayaran harus dilakukan secara penuh. Metode pembayaran yang Kami layani yaitu: Transfer bank (via atm, iBanking, m-Banking) &nbsp;ke Rekening Jurudapur melalui pihak ketika (payment gateway).</li>
                            <li style="text-align: justify;">Bila Anda memilih metode pembayaran secara tranfer bank maka pembayaran wajib dilakukan sesaat setelah Pesanan Terkonfirmasi.</li>
                            <li style="text-align: justify;">Pembayaran bisa langsung lunas atau down payment (DP) sebesar 25% dari total biaya pesanan serta wajib dilunasi ketika pesanan sudah diterima oleh konsumen. Apabila total pesanan lebih dari nominal 10 juta maka akan mendapat keringanan berupa penundaan pelunasan setelah 7 hari terhitung sejak pesanan diterima oleh konsumen.</li>
                            </ol>
                            <p style="text-align: justify;"><strong><strong>&nbsp;</strong></strong></p>
                            <p style="text-align: justify;"><strong><strong>Pembatalan Pesanan</strong></strong></p>
                            <p style="padding-left: 30px; text-align: justify;">Anda berhak melakukan pembatalan Pesanan setiap saat sepanjang status Pesanan belum berubah menjadi Pesanan Terkonfirmasi.</p>
                            <p style="padding-left: 30px; text-align: justify;">&nbsp;</p>
                            <p style="text-align: justify;"><strong><strong>Pengantaran Pesanan</strong></strong></p>
                            <ol style="text-align: justify;">
                            <li>Pengantaran Pesanan dilakukan oleh Jurudapur. Oleh karenanya Konsumen setuju untuk membebaskan Jurudapur dari segala bentuk keluhan, klaim atau gugatan yang timbul sehubungan pengantaran Pesanan yang dilakukan oleh Jurudapur.</li>
                            <li>Jam Pengantaran bersifat perkiraan dan hasilnya mungkin berbeda karena turut dipengaruhi oleh faktor-faktor luar termasuk namun tidak terbatas kepada kepadatan lalu lintas. Jurudapur &nbsp;berupaya sunguh-sungguh agar waktu pengantaran tidak meleset dari yang disampaikan.</li>
                            <li>&nbsp;Dalam hal Pesanan gagal diantar sampai alamat tujuan akibat Konsumen tidak memberikan informasi alamat dan nomor telephone secara detail, lengkap dan akurat maka Pesanan dianggap telah diterima Konsumen begitu Kami mengirimkan notifikasi mengenai hal ini melalui surel atau layanan pesan singkat (SMS); Konsumen wajib melunasi Biaya Pesanan dan beban-beban lain sehubungan penanganan Pesanan termasuk namun tidak terbatas kepada biaya penyimpanan atau pembuangan.</li>
                            <li>Segala manfaat atau resiko yang timbul atas Pesanan menjadi keuntungan atau tanggung jawab Konsumen saat Pesanan diterima oleh Konsumen. Kami tidak dapat dimintakan pertanggungjawaban atas segala bentuk kerugian yang timbul dan dialami Konsumen pada saat/setelah Pesanan diterima oleh Konsumen.</li>
                            </ol>
                            <p style="text-align: justify;"><strong><strong>&nbsp;</strong></strong><strong><strong>&nbsp;</strong></strong></p>
                            <p style="text-align: justify;"><strong><strong>Keluhan dan Penanganan</strong></strong></p>
                            <ol>
                            <li style="text-align: justify;">Jurudapur menampung segala bentuk saran, kritik atau keluhan Anda. Kami menyediakan ruang dan fasilitas bagi Anda untuk menyampaikan saran, kritik dan keluhan melalui email jurudapur@gmail.com</li>
                            <li style="text-align: justify;">Jurudapur akan menangani saran, kritik atau keluhan yang Anda sampaikan secara proporsional sesuai dengan kemampuan atau kewenangan yang Kami miliki. Kami tidak berwenang untuk memutuskan, memberikan atau mengmplementasikan solusi terhadap saran, kritik atau keluhan sehubungan dengan hal-hal yang menjadi tanggung jawab Dapur Mitra.</li>
                            <li style="text-align: justify;">Dalam hal saran, kritik dan keluhan yang disampaikan berkaitan dengan tanggung jawab Dapur Mitra a maka Kami akan menyampaikannya kepada yang bersangkutan.</li>
                            <li style="text-align: justify;">Konsumen setuju untuk membebaskan Jurudapur dari segala bentuk tanggung jawab dan tidak melibatkan Kami dalam hal-hal yang terkait dengan tanggung jawab Dapur Mitra, termasuk namun tidak terbatas pada kerugian yang ditimbulkan akibat mengkonsumsi Menu dari Dapur Mitra.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
