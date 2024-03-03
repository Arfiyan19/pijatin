<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notifikasi</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('frontend/terapist/css/riwayat-detail.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
</head>
<body>
    <div class="container">
        <div class="topbar">
            <a href="http://127.0.0.1:8000/terapis/riwayat-dijadwalkan">
                <img src="{{ asset('frontend/terapist/img/back.png') }}" alt="">
            </a>
            <h4>Detail Pesanan</h4>
        </div>

        <div class="content">
            <div class="head">
                <h4>Timer Pekerjaan (menit)</h4>
                <div class="timer" id="countdown">00:00</div>
            </div>

            <div class="order">
                <table>
                    <thead>
                        <tr>
                            <td >ID pesanan</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td align="right">AV06701</td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <td>Customer</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td align="right">Rika Teardrop</td>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td align="right">AN85356</td>
                        </tr>
                    <thead>
                        <tr>
                            <td> Alamat</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2" align="left">Karangjambe, Gg. Arjuna No.59, Jaranan, Banguntapan,
                                Kec. Banguntapan, Kabupaten Bantul,
                                Daerah Istimewa Yogyakarta 55198</td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <td>Detail Pesanan</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Total Pemesan</td>
                            <td align="right">1 Orang</td>
                        </tr>
                        <tr>
                            <td>jenis Kelamin</td>
                            <td align="right">Perempuan</td>
                        </tr>
                        <tr>
                            <td>layanan</td>
                            <td align="right">Full Body massage</td>
                        </tr>
                        <tr>
                            <td>layanan Tambahan</td>
                            <td align="right">Kerokan</td>
                        </tr>
                        <tr>
                            <td>Durasi</td>
                            <td align="right">90 menit</td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <td>Jadwal pesanan</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tanggal</td>
                            <td align="right">27/12/2023</td>
                        </tr>
                        <tr>
                            <td>Jam</td>
                            <td align="right">10:00-11:00 WIB</td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <td>Detail pembayaran</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Harga layanan</td>
                            <td align="right">Rp.150.000</td>
                        </tr>
                        <tr>
                            <td>Metode Pembayaran</td>
                            <td align="right">transfer</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td align="right">Belum Lunas</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="kirim">
                <a href="http://127.0.0.1:8000/terapis/riwayat/chat">
                    <button type="submit" id="chat">hubungi</button>
                </a>

                <button type="submit" id="mulai">Mulai</button>
            </div>

        </div>

    </div>

</body>
</html>
