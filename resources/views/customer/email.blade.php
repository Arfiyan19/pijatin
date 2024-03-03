<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- my style -->
    <link rel="stylesheet" href="{{ asset('frontend/css/homeCustomer.css') }}">

    <!-- logo tittle bar -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }}">

    <title>Pijat.in</title>
</head>

<body>


    <div class="container-email">
        <div class="img-grup">
            <img src="{{ asset('frontend/assets/image/arw-left.svg') }}" alt="">
            <div class="subgroup">
                <img src="{{ asset('frontend/assets/image/download.svg') }}" alt="">
                <img src="{{ asset('frontend/assets/image/delete.svg') }}" alt="">
                <img src="{{ asset('frontend/assets/image/mail.svg') }}" alt="">
                <img src="{{ asset('frontend/assets/image/dots.svg') }}" alt="">
            </div>
        </div>

        <div class="head">
            <div class="txt">Pesanan anda dijadwalkan</div>
            <div class="label">Kontak masuk</div>
        </div>

        <div class="header">
            <img src="{{ asset('frontend/assets/image/roun.svg') }}" alt="">
            <div class="title">
                <div class="txt">
                    <div class="tit">
                        Body Massage App
                        <div class="icon-grup">
                            <img src="{{ asset('frontend/assets/image/back.svg') }}" alt="">
                            <img src="{{ asset('frontend/assets/image/dots2.svg') }}" alt="">
                        </div>
                    </div>
                    <div class="me">Kepada saya
                        <img src="{{ asset('frontend/assets/image/arwdwn.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-mail">
            <img src="{{ asset('frontend/assets/image/logo.svg') }}" alt="">
            <table>
                <thead>
                    <tr>
                        <td>Jadwal pelayanan untuk anda</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Halo SUPRIADI JALALUDIN</td>
                    </tr>
                    <tr>
                        <td>Berikut detail jadwal anda</td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <td>Link Apps</td>
                        <td><a href="{{ route('homecustomer') }}" style="text-decoration: none;">Klik Sini</a></td>
                    </tr>
                    <tr>
                        <td>Terapis</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>Siti Rohani</td>
                    </tr>
                    <tr>
                        <td>ID</td>
                        <td>03262548PL</td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <td>Detail Harga</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Thai Massage </td>
                        <td>Rp. 450.000</td>
                    </tr>
                    <tr>
                        <td>Durasi </td>
                        <td>60 Menit</td>
                    </tr>
                    <tr>
                        <td>Jadwal</td>
                        <td>01/03/2023</td>
                    </tr>
                    <tr>
                        <td>waktu</td>
                        <td>05.00 AM-Selesai</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>Rp. 450.000</td>
                    </tr>
                    <tr>
                        <td>Metode Pembayaran</td>
                        <td>Cash</td>
                    </tr>
                    <tr>
                        <td>Nama pengirim</td>
                        <td>Supriadi Jalaludin</td>
                    </tr>
                    <tr>
                        <td>No Rekening</td>
                        <td>133117493559</td>
                    </tr>
                    <tr>
                        <td>Nama Bank</td>
                        <td>BCA</td>
                    </tr>
                    <tr>
                        <td>Status Pembayaran</td>
                        <td><span class="status dibatalkan">Belum lunas</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="rectangle"></div>

    </div>





</body>

</html>