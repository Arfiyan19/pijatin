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

    <!-- ======= link lib. icon ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- //import cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- my style -->
    <link rel="stylesheet" href="{{ asset('frontend/terapist/css/riwayat-detail-order-selesai.css') }}">

    <!-- logo tittle bar -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- //cdn jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Ulasan Terapis</title>
</head>

<body>
    <div class="container">
        <div class="topbar">
            <div class="backbtn">
                <a href="">
                    <i class="material-icons" style="font-size:36px">chevron_left</i>
                </a>
            </div>
            <p>Riwayat Pekerjaan Selesai</p>
        </div>

        <div class="identitas">
            <br>
            <table class="tableidentitas">
                <tr style="color: white;">
                    <th colspan="2" height="50px" style="float: left; font-size:16px">Pekerjaan Selesai</th>
                </tr>
                <tr style="color:white; ">
                    <td width="350px" align="left" style="font-size:14px">Rezha Adhi</td>
                    <td width="200px" style="font-size:14px" align="right">ID Pesanan AV06798</td>
                </tr>
            </table>
        </div>

        <div class="detailpesan">
            <div>
                <img class="imglogo" src="{{ asset('frontend/assets/image/logo-70.png') }}" alt="">
            </div>
            <div class="jdldes">
                <p class="judul">Pesanan Sudah Kami Jadwalkan</p>
                <p class="deskripsi">Anda sudah melunasi tagihan</p>
            </div>
            <table class="table1">
                <tr>
                    <th colspan="3" style="font-weight: bold; float:left">Jadwal</th>
                </tr>
                <tr>
                    <td width="300px" align="left">Tanggal</td>
                    <td width="200px" align="right" colspan="2">12-10-2023</td>
                </tr>
                <tr>
                    <td width="300px" align="left">Waktu</td>
                    <td width="200px" align="right" colspan="2">09:00 - Selesai</td>
                </tr>
                <!-- ALAMAT  -->
                <tr>
                    <th colspan="3" style="font-weight: bold; float:left;padding-top:10px">Alamat</th>
                </tr>
                <tr>
                    <td colspan="3" align="left">Karangjambe, Gg. Arjuna No.59, Jaranan, Banguntapan, Kec. Banguntapan, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55198</td>
                </tr>
                <!-- LAYANAN -->
                <tr>
                    <th colspan="3" style="font-weight: bold; float:left; padding-top:10px">Layanan</th>
                </tr>
                <tr>
                    <td width="300px" align="left">Thai Massage</td>
                    <td width="200px" align="right" colspan="2">60 menit</td>
                </tr>
                <tr>
                    <td width="300px" align="left">Keroan</td>
                    <td width="200px" align="right" colspan="2">30 menit</td>
                </tr>

                <!-- PEMESAN -->
                <tr>
                    <th colspan="3" style="font-weight: bold; float:left; padding-top:10px">Pemesan</th>
                </tr>
                <tr>
                    <td width="300px" align="left">Fahri (L)</td>
                    <td width="200px" align="right" colspan="2">Customer</td>
                </tr>
                <tr>
                    <td width="300px" align="left">Slamet Santoso</td>
                    <td width="200px" align="right" colspan="2">Terapis</td>
                </tr>
                <tr>
                    <td width="300px" align="left">Layanan Tambahan</td>
                    <td width="200px" align="right" colspan="2">Kerokan</td>
                </tr>

                <!-- DETAIL HARGA -->
                <tr>
                    <th colspan="2" style="font-weight: bold; float:left; padding-top:10px">Detail Harga</th>
                </tr>
                <tr>
                    <td width="300px" align="left">Thai Massage</td>
                    <td align="right">x1</td>
                    <td width="200px" align="right">Rp. 55.000</td>
                </tr>
                <tr>
                    <td width="300px" align="left">Kerokan</td>
                    <td align="right">x1</td>
                    <td width="200px" align="right">Rp. 10.000</td>
                </tr>
                <tr>
                    <td width="300px" align="left">Total Harga</td>
                    <td width="200px" align="right" colspan="2">Rp. 65.000</td>
                </tr>

                <!-- PEMBAYARAN -->
                <tr>
                    <th colspan="3" style="font-weight: bold; float:left; padding-top:10px">Pembayaran</th>
                </tr>
                <tr>
                    <td width="300px" align="left">Nama Pengirim</td>
                    <td width="200px" align="right" colspan="2">Reza Adhi</td>
                </tr>
                <tr>
                    <td width="300px" align="left">Metode Pembayaran</td>
                    <td width="200px" align="right" colspan="2">Transfer</td>
                </tr>
                <tr>
                    <td width="300px" align="left">Status Pembayaran</td>
                    <td width="200px" align="right" colspan="2" class="text-success">Lunas</td>
                </tr>

                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
            </table>

        </div>


        <!-- ULASAN AKAN MUNCUL BILA SUDAH DI APPROVED OLEH ADMIN -->

        <diV class="ulasan">
            <p>Ulasan</p>
        </diV>
        <div class="halamanulasan">
            <table class="table2">
                <tr>
                    <td rowspan="3" width="60px"><img class="imgprofileuser" src="{{ asset('frontend/assets/image/user_profile.png') }}" alt=""></td>
                    <td width="300px" align="left" style="font-size: 14px; font-weight:bold">Fahri</td>
                    <td align="right">12/10/2023</td>
                </tr>
                <tr>
                    <td colspan="2" align="left">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="left">Enak banget pelayanan yang ini, Therapisnya juga enak buat diajak komunikasi</td>
                </tr>
            </table>
            <br>

        </div>


        <div class="navbarselesai">
            <p>Terima kasih sudah menyelesaikan pekerjaan anda</p>
        </div>
        <br>


    </div>
    <br>

</body>

</html>