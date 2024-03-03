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
    <link rel="stylesheet" href="{{ asset('frontend/terapist/css/riwayat-order-ditolak.css') }}">

    <!-- logo tittle bar -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- //cdn jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <title>Detail-Pesanan-Ditolak</title>
</head>

<body>
    <div class="container">
        <div class="topbar">
            <div class="backbtn">
                <a href="">
                    <i class="material-icons" style="font-size:36px">chevron_left</i>
                </a>
            </div>
            <p>Riwayat Pekerjaan Ditolak</p>
        </div>

        <nav class="navbar navbar-expand">
            <div class="navbar-nav">
                <a class="nav-link " href="#">Dijadwalkan</a>
                <a class="nav-link " href="http://127.0.0.1:8000/terapis/riwayat-detailorder">Selesai</a>
                <a class="nav-link text-danger active" href="http://127.0.0.1:8000/terapis/riwayat-orderditolak">Tolak</a>
            </div>
        </nav>

        <br>
        <div class="detail">
            <table class="table2">
                <tr>
                    <td rowspan="2" width="80px" align="left">
                        <img class="imgprofileuser" src="{{ asset('frontend/assets/image/user_profil_black.png') }}" alt="">
                    </td>
                    <td colspan="2" align="left" style="font-size: 14px; font-weight:bold">Reza Adi</td>
                </tr>
                <tr>
                    <td width="400px" align="left" style="font-size: 12px; font-weight:bold">ID Pesanan AN85356</td>
                    <td width="300px" align="right" style="font-size: 12px; ">12/03/2023/ 09:30 AM</td>
                </tr>
            </table>
        </div>
        <br>
        <div class="detail">
            <table class="table2">
                <tr>
                    <td rowspan="2" width="80px" align="left">
                        <img class="imgprofileuser" src="{{ asset('frontend/assets/image/user_profil_black.png') }}" alt="">
                    </td>
                    <td colspan="2" align="left" style="font-size: 14px; font-weight:bold">Reza Adi</td>
                </tr>
                <tr>
                    <td width="400px" align="left" style="font-size: 12px; font-weight:bold">ID Pesanan AN85356</td>
                    <td width="300px" align="right" style="font-size: 12px; ">12/03/2023/ 09:30 AM</td>
                </tr>
            </table>
        </div>
        <br>
        <div class="detail">
            <table class="table2">
                <tr>
                    <td rowspan="2" width="80px" align="left">
                        <img class="imgprofileuser" src="{{ asset('frontend/assets/image/user_profil_black.png') }}" alt="">
                    </td>
                    <td colspan="2" align="left" style="font-size: 14px; font-weight:bold">Reza Adi</td>
                </tr>
                <tr>
                    <td width="400px" align="left" style="font-size: 12px; font-weight:bold">ID Pesanan AN85356</td>
                    <td width="300px" align="right" style="font-size: 12px; ">12/03/2023/ 09:30 AM</td>
                </tr>
            </table>
        </div>
        <br>
        <div class="detail">
            <table class="table2">
                <tr>
                    <td rowspan="2" width="80px" align="left">
                        <img class="imgprofileuser" src="{{ asset('frontend/assets/image/user_profil_black.png') }}" alt="">
                    </td>
                    <td colspan="2" align="left" style="font-size: 14px; font-weight:bold">Reza Adi</td>
                </tr>
                <tr>
                    <td width="400px" align="left" style="font-size: 12px; font-weight:bold">ID Pesanan AN85356</td>
                    <td width="300px" align="right" style="font-size: 12px; ">12/03/2023/ 09:30 AM</td>
                </tr>
            </table>
        </div>
        <br>
        <div class="detail">
            <table class="table2">
                <tr>
                    <td rowspan="2" width="80px" align="left">
                        <img class="imgprofileuser" src="{{ asset('frontend/assets/image/user_profil_black.png') }}" alt="">
                    </td>
                    <td colspan="2" align="left" style="font-size: 14px; font-weight:bold">Reza Adi</td>
                </tr>
                <tr>
                    <td width="400px" align="left" style="font-size: 12px; font-weight:bold">ID Pesanan AN85356</td>
                    <td width="300px" align="right" style="font-size: 12px; ">12/03/2023/ 09:30 AM</td>
                </tr>
            </table>
        </div>
        <br>
        <br>



        @if(auth()->check() == false)
        <div class="footer">
            <div class="nav-menu">
                <a href="http://127.0.0.1:8000/terapis/beranda-order">
                    <img src="{{ asset('frontend/terapist/img/beranda.png') }}" alt="" width="25px">
                    <p>Beranda</p>
                </a>
                <a href="http://127.0.0.1:8000/terapis/riwayat-dijadwalkan">
                    <img src="{{ asset('frontend/terapist/img/riwayat-on.png') }}" alt="" width="25px">
                    <p>Riwayat</p>
                </a>
                <a href="">
                    <img src="{{ asset('frontend/terapist/img/pendapatan.png') }}" alt="" width="25px">
                    <p>Pendapatan</p>
                </a>
                <a href="http://127.0.0.1:8000/terapis/profile">
                    <img src="{{ asset('frontend/terapist/img/akun.png') }}" alt="" width="25px">
                    <p>Akun</p>
                </a>
            </div>
        </div>
        @elseif(auth()->check() == true)
        <div class="footer">
            <div class="nav-menu">
                <a href="http://127.0.0.1:8000/terapis/beranda-order">
                    <img src="{{ asset('frontend/terapist/img/beranda.png') }}" alt="" width="25px">
                    <p>Beranda</p>
                </a>
                <a href="http://127.0.0.1:8000/terapis/riwayat-dijadwalkan">
                    <img src="{{ asset('frontend/terapist/img/riwayat-on.png') }}" alt="" width="25px">
                    <p>Riwayat</p>
                </a>
                <a href="">
                    <img src="{{ asset('frontend/terapist/img/pendapatan.png') }}" alt="" width="25px">
                    <p>Pendapatan</p>
                </a>
                <a href="http://127.0.0.1:8000/terapis/profile">
                    <img src="{{ asset('frontend/terapist/img/akun.png') }}" alt="" width="25px">
                    <p>Akun</p>
                </a>
            </div>
        </div>
        @endif

    </div>



</body>

</html>