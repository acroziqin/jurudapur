<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Boardicle Email</title>
    <style>
        /* -------------------------------------
            GLOBAL RESETS
        ------------------------------------- */
        img {
            border: none;
            -ms-interpolation-mode: bicubic;
            max-width: 100%; }
        body {
            background-color: #f6f6f6;
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 14px;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%; }
        table {
            border-collapse: separate;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            width: 100%; }
        table td {
            font-family: sans-serif;
            font-size: 14px;
            vertical-align: top; }
        /* -------------------------------------
            BODY & CONTAINER
        ------------------------------------- */
        .body {
            background-color: #f6f6f6;
            width: 100%; }
        /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
        .container {
            display: block;
            Margin: 0 auto !important;
            /* makes it centered */
            max-width: 580px;
            padding: 10px;
            width: 580px; }
        /* This should also be a block element, so that it will fill 100% of the .container */
        .content {
            box-sizing: border-box;
            display: block;
            Margin: 0 auto;
            max-width: 580px;
            padding: 10px; }
        /* -------------------------------------
            HEADER, FOOTER, MAIN
        ------------------------------------- */
        .main {
            background: #ffffff;
            border-radius: 3px;
            width: 100%; }
        .wrapper {
            box-sizing: border-box;
            padding: 20px; }
        .content-block {
            padding-bottom: 10px;
            padding-top: 10px;
        }
        .footer {
            clear: both;
            Margin-top: 10px;
            text-align: center;
            width: 100%; }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
            color: #999999;
            font-size: 12px;
            text-align: center; }
        /* -------------------------------------
            TYPOGRAPHY
        ------------------------------------- */
        h1,
        h2,
        h3,
        h4 {
            color: #000000;
            font-family: sans-serif;
            font-weight: 400;
            line-height: 1.4;
            margin: 0;
            Margin-bottom: 30px; }
        h1 {
            font-size: 35px;
            font-weight: 300;
            text-align: center;
            text-transform: capitalize; }
        p,
        ul,
        ol {
            font-family: sans-serif;
            font-size: 14px;
            font-weight: normal;
            margin: 0;
            Margin-bottom: 15px; }
        p li,
        ul li,
        ol li {
            list-style-position: inside;
            margin-left: 5px; }
        a {
            color: #3498db;
            text-decoration: underline; }
        /* -------------------------------------
            BUTTONS
        ------------------------------------- */
        .btn {
            box-sizing: border-box;
            width: 100%; }
        .btn > tbody > tr > td {
            padding-bottom: 15px; }
        .btn table {
            width: auto; }
        .btn table td {
            background-color: #ffffff;
            border-radius: 5px;
            text-align: center; }
        .btn a {
            background-color: #ffffff;
            border: solid 1px #3498db;
            border-radius: 5px;
            box-sizing: border-box;
            color: #3498db;
            cursor: pointer;
            display: inline-block;
            font-size: 14px;
            font-weight: bold;
            margin: 0;
            padding: 12px 25px;
            text-decoration: none;
            text-transform: capitalize; }
        .btn-primary table td {
            background-color: #3498db; }
        .btn-primary a {
            background-color: #3498db;
            border-color: #3498db;
            color: #ffffff; }
        /* -------------------------------------
            OTHER STYLES THAT MIGHT BE USEFUL
        ------------------------------------- */
        .last {
            margin-bottom: 0; }
        .first {
            margin-top: 0; }
        .align-center {
            text-align: center; }
        .align-right {
            text-align: right; }
        .align-left {
            text-align: left; }
        .clear {
            clear: both; }
        .mt0 {
            margin-top: 0; }
        .mb0 {
            margin-bottom: 0; }
        .preheader {
            color: transparent;
            display: none;
            height: 0;
            max-height: 0;
            max-width: 0;
            opacity: 0;
            overflow: hidden;
            mso-hide: all;
            visibility: hidden;
            width: 0; }
        .powered-by a {
            text-decoration: none; }
        hr {
            border: 0;
            border-bottom: 1px solid #f6f6f6;
            Margin: 20px 0; }
        /* -------------------------------------
            RESPONSIVE AND MOBILE FRIENDLY STYLES
        ------------------------------------- */
        @media only screen and (max-width: 620px) {
            table[class=body] h1 {
                font-size: 28px !important;
                margin-bottom: 10px !important; }
            table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
                font-size: 16px !important; }
            table[class=body] .wrapper,
            table[class=body] .article {
                padding: 10px !important; }
            table[class=body] .content {
                padding: 0 !important; }
            table[class=body] .container {
                padding: 0 !important;
                width: 100% !important; }
            table[class=body] .main {
                border-left-width: 0 !important;
                border-radius: 0 !important;
                border-right-width: 0 !important; }
            table[class=body] .btn table {
                width: 100% !important; }
            table[class=body] .btn a {
                width: 100% !important; }
            table[class=body] .img-responsive {
                height: auto !important;
                max-width: 100% !important;
                width: auto !important; }}
        /* -------------------------------------
            PRESERVE THESE STYLES IN THE HEAD
        ------------------------------------- */
        @media all {
            .ExternalClass {
                width: 100%; }
            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%; }
            .apple-link a {
                color: inherit !important;
                font-family: inherit !important;
                font-size: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                text-decoration: none !important; }
            .btn-primary table td:hover {
                background-color: #34495e !important; }
            .btn-primary a:hover {
                background-color: #34495e !important;
                border-color: #34495e !important; } }
    </style>
</head>
<body class="">
<table border="0" cellpadding="0" cellspacing="0" class="body">
    <tr>
        <td>&nbsp;</td>
        <td class="container">
            <div class="content">
                <!-- START CENTERED WHITE CONTAINER -->
                <span class="preheader">Email Untuk Kamu !.</span>
                {{-- <table class="main"> --}}
                    <!-- START MAIN CONTENT AREA -->
                    {{-- <tr> --}}
                        {{-- <td class="wrapper"> --}}
                            {{-- <table border="0" cellpadding="0" cellspacing="0"> --}}
                                {{-- <tr>
                                    <td>
                                        <img src="{{ asset('images/logo.png') }}" alt="logo-jurudapur">
                                        <p>Hi {{ $nama }}</p>
                                        <p>Tagihan Transaksi {{$order_number}}</p>
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                            <tr>
                                                <td align="left">
                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                        <tr>
                                                            <td> <div class="container">
                                                                    <center><p>Pesanmu Yaitu :</p></center>
                                                                    <hr>
                                                                    <center><p>{{ $pesan }}</p></center>
                                                                    <hr>
                                                                    <center><p>Telah Disampaikan! <br> Terimakasih telah menghubungi kami!</p></center>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table> --}}
                                        {{--<p>This is a really simple email template. Its sole purpose is to get the recipient to click the button with no distractions.</p>--}}
                                        {{--<p>Good luck! Hope it works.</p>--}}
                                    {{-- </td>
                                </tr> --}}
                            {{-- </table> --}}
                        {{-- </td> --}}
                    {{-- </tr> --}}
                    <!-- END MAIN CONTENT AREA -->
                {{-- </table> --}}
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse:collapse;border-spacing:0;margin:0 auto;padding:0">
                    <tbody>
                        <tr>
                            <td align="left" style="border-collapse:collapse;border-spacing:0;font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;margin:0;padding:0">
                                <table width="100%" style="border-collapse:collapse;border-spacing:0;margin:0;padding:0">
                                    <tbody>
                                        <tr>
                                            <td height="20" width="30" style="border-collapse:collapse;border-spacing:0;font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;margin:0;padding:0"></td>
                                            <td height="20" width="540" style="border-collapse:collapse;border-spacing:0;font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;margin:0;padding:0"></td>
                                            <td height="20" width="30" style="border-collapse:collapse;border-spacing:0;font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;margin:0;padding:0"></td>
                                        </tr>
                                        <tr>
                                            <td width="30" style="border-collapse:collapse;border-spacing:0;font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;margin:0;padding:0"></td>
                                            <td width="540" style="border-collapse:collapse;border-spacing:0;font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;margin:0;padding:0">
                                            <img src="{{ asset('images/logo.png') }}" style="width:176px;height:45px;line-height:100%;outline:none;text-decoration:none;border:0 none" class="CToWUd">
                                            </td>
                                            <td width="30" style="border-collapse:collapse;border-spacing:0;font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;margin:0;padding:0"></td>
                                        </tr>
                                        <tr>
                                            <td height="12" width="30" style="border-collapse:collapse;border-spacing:0;font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;margin:0;padding:0"></td>
                                            <td height="12" width="540" style="border-collapse:collapse;border-spacing:0;font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;margin:0;padding:0"></td>
                                            <td height="12" width="30" style="border-collapse:collapse;border-spacing:0;font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;margin:0;padding:0"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" id="m_2752638577932141484contentContainer" style="border-collapse:collapse;border-spacing:0;font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;margin:0;padding:0">
                                <table align="left" width="100%" style="border-collapse:collapse;border-spacing:0;margin:0;padding:0">
                                    <tbody>
                                        <tr>
                                            <td height="12" width="30" style="border-collapse:collapse;border-spacing:0;font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;margin:0;padding:0"></td>
                                            <td height="12" width="540" style="border-collapse:collapse;border-spacing:0;font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;margin:0;padding:0"></td>
                                            <td height="12" width="30" style="border-collapse:collapse;border-spacing:0;font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;margin:0;padding:0"></td>
                                        </tr>
                                        <tr>
                                            <td width="30" style="border-collapse:collapse;border-spacing:0;font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;margin:0;padding:0"></td>
                                            <td align="left" width="540" style="border-collapse:collapse;border-spacing:0;font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;margin:0;padding:0">
                                                <table align="left" width="100%" style="border-collapse:collapse;border-spacing:0;margin:0;padding:0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="border-collapse:collapse;border-spacing:0;font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;margin:0;padding:0">
                                                                <div style="margin-bottom:12px">
                                                                    <h1 style="font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;font-size:20px;font-weight:normal;margin:0;padding:0">Tagihan Transaksi #{{$order_number}}</h1>
                                                                </div>
                                                                <div style="margin-bottom:30px;font-size:14px">
                                                                    <p style="font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;font-size:14px;margin:0;padding:0">Hai {{$nama}}!
                                                                    Silakan melakukan pembayaran untuk tagihan <strong style="color:#333;font-size:14px">#{{$order_number}}</strong>.</p>
                                                                </div>
                                                                <div class="m_2752638577932141484box" style="margin-bottom:18px;padding-bottom:18px;border-bottom-width:2px;border-bottom-color:#eee;border-bottom-style:solid">
                                                                    <h2 style="font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;font-size:16px;margin:0;padding:0">Detail Pemesanan</h2>
                                                                </div>
                                                        <div class="m_2752638577932141484box" style="margin-bottom:18px;padding-bottom:18px;border-bottom-width:2px;border-bottom-color:#eee;border-bottom-style:solid">
                                                            <div style="margin-bottom:24px">
                                                                <p class="m_2752638577932141484gray-text" style="font-family:&quot;Arial&quot;,sans-serif;color:#999!important;line-height:1.36;font-size:14px;margin:0 0 6px;padding:0">Selesaikan pembayaran kamu sebelum:</p>
                                                                    <p class="m_2752638577932141484larger" style="font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;font-size:20px;margin:0;padding:0">
                                                                    {{$delivery_date}}
                                                                </p>
                                                            </div>
                                                            <div style="margin-bottom:24px">
                                                                <div>
                                                                    <p class="m_2752638577932141484gray-text" style="font-family:&quot;Arial&quot;,sans-serif;color:#999!important;line-height:1.36;font-size:14px;margin:0 0 6px;padding:0">Total harga:</p>
                                                                </div>
                                                                    <p class="m_2752638577932141484larger" style="font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;font-size:20px;margin:0;padding:0">
                                                                        {{-- <span class="m_2752638577932141484currency m_2752638577932141484positive" style="font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;font-size:20px;margin:0;padding:0">Rp</span><span class="m_2752638577932141484amount m_2752638577932141484positive" style="font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;font-size:20px;margin:0;padding:0">{{$total_price}}</span> --}}
                                                                        <span class="m_2752638577932141484currency m_2752638577932141484positive" style="font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;font-size:20px;margin:0;padding:0">{{ money($total) }}</span>
                                                                    </p>
                                                                </div>
                                                                <div style="margin:0">
                                                                    <p class="m_2752638577932141484gray-text" style="font-family:&quot;Arial&quot;,sans-serif;color:#999!important;line-height:1.36;font-size:14px;margin:0;padding:0">Metode Pembayaran:</p>
                                                                    <p class="m_2752638577932141484larger" style="font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;font-size:20px;margin:0;padding:0">Cash On Delivery</p>
                                                                </div>
                                                            </div>
                                                            <div class="m_2752638577932141484box" style="margin-bottom:18px;padding-bottom:18px;border-bottom-width:2px;border-bottom-color:#eee;border-bottom-style:solid">
                                                                <div>
                                                                    <h2 style="font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;font-size:16px;margin:0 0 18px;padding:0">
                                                                    Petunjuk Pembayaran:
                                                                    </h2>
                                                                    <p style="font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;font-size:14px;margin:0;padding:0">
                                                                    Transfer dapat dilakukan ke nomor rekening Virtual Account BNI berikut ini:
                                                                        <br>
                                                                        <strong class="m_2752638577932141484text-large" style="color:#333;font-size:14px">8608523613849700</strong>
                                                                        <br>
                                                                    </p>
                                                                </div>
                                                                </div>
                                                                <div class="m_2752638577932141484box m_2752638577932141484box--darker" style="margin-bottom:18px;padding-bottom:18px;border-bottom-width:2px;border-bottom-color:#ddd;border-bottom-style:solid">
                                                                    <h2 style="font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;font-size:16px;margin:0;padding:0">Rincian Pemesanan</h2>
                                                                </div>
                                                                <div>
                                                                    <p style="font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;font-size:14px;margin:0;padding:0">
                                                                        <span style="font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;font-size:14px;margin:0;padding:0">Rincian pemesananmu dapat dilihat di halaman</span>
                                                                        <a href="https://glimpse.bukalapak.com/redirect?link=https%3A%2F%2Fwww.bukalapak.com%2Fpayment%2Finvoices%2F1904769929&amp;llstttu=5f37a6021712426d9fa0c6bb94c617b9ca9076d86f2c46a164f043ff4735b2ca&amp;subject=Tagihan+dan+Petunjuk+Pembayaran+-+Serbu+Seru+-+%5BBukalapak%5D&amp;tag=lucky-deal_non_instant_payment_instruction_buyer&amp;template_id=0&amp;type=ClickEmail&amp;user_email=achmadchoirurroziqin%40gmail.com" style="font-family:&quot;Arial&quot;,sans-serif;color:#d71149!important;line-height:1.36;text-decoration:none;font-size:14px;margin:0;padding:0" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://glimpse.bukalapak.com/redirect?link%3Dhttps%253A%252F%252Fwww.bukalapak.com%252Fpayment%252Finvoices%252F1904769929%26llstttu%3D5f37a6021712426d9fa0c6bb94c617b9ca9076d86f2c46a164f043ff4735b2ca%26subject%3DTagihan%2Bdan%2BPetunjuk%2BPembayaran%2B-%2BSerbu%2BSeru%2B-%2B%255BBukalapak%255D%26tag%3Dlucky-deal_non_instant_payment_instruction_buyer%26template_id%3D0%26type%3DClickEmail%26user_email%3Dachmadchoirurroziqin%2540gmail.com&amp;source=gmail&amp;ust=1548253275642000&amp;usg=AFQjCNETAN98zel46iWctJED6rR5NAQAmQ">detail transaksi.</a>
                                                                    </p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                        </table>
                                                            </td>
                                                            <td width="30" style="border-collapse:collapse;border-spacing:0;font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;margin:0;padding:0"></td>
                                                                </tr>
                                                                <tr>
                                                            <td height="30" width="30" style="border-collapse:collapse;border-spacing:0;font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;margin:0;padding:0"></td>
                                                            <td height="30" width="540" style="border-collapse:collapse;border-spacing:0;font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;margin:0;padding:0"></td>
                                                            <td height="30" width="30" style="border-collapse:collapse;border-spacing:0;font-family:&quot;Arial&quot;,sans-serif;color:#333;line-height:1.36;margin:0;padding:0"></td>
                                                                </tr>
                                                    </tbody>
                                                </table>
                        </td>
                        </tr>
                        </tbody></table>
                <!-- START FOOTER -->
                <div class="footer">
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="content-block">
                                <span class="apple-link">Jurudapur</span>
                                {{--<br> Don't like these emails? <a href="http://i.imgur.com/CScmqnj.gif">Unsubscribe</a>.--}}
                            </td>
                        </tr>
                        <tr>
                            <td class="content-block powered-by">
                                Powered by <a href="http://jurudapur.com">Jurudapur</a>.
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- END FOOTER -->
                <!-- END CENTERED WHITE CONTAINER -->
            </div>
        </td>
        <td>&nbsp;</td>
    </tr>
</table>
</body>
</html>