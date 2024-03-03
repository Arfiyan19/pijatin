<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beranda terapis</title>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href=" {{ asset('frontend/terapist/css/home-fase2.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
    <!-- ======= link lib. icon ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
rr
</head>
<body>
    <div class="container">
        <div class="topbar">
            <div class="logo"><img src="{{ asset('frontend/assets/image/logo-70.png') }} " alt=""></div>
            <div class="logokanan">
                <a href="">
                    <div class="user">
                        <img src="{{ asset('frontend/terapist/img/ppcustomer2.png') }}" alt="">
                    </div>
                </a>
                <a href="">
                    <div class="lonceng">
                        <img src="{{ asset('frontend/terapist/img/lonceng.png') }}" alt="">
                    </div>

                </a>
            </div>

        </div>
        <div class="saldotab">
            <div class="saldobox">
                <div class="baris1">
                    <p>Aktifkan untuk menerima pesanan</p>
                    <div class="toggle">
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="baris2">
                    <p>saldo: </p>
                    <div class="saldo"> Rp-</div>
                </div>
                <p>Terima pesanan untuk mengisi saldo</p>
            </div>
        </div>

        <div class="peringatan"></div>

        <div class="pesanan">
            <div class="head">
                <p>Pesanan hari ini</p>
            </div>
            <div class="content">
                <a href="http://127.0.0.1:8000/terapis/riwayat-detailorder">
                    <div class="card">
                        <div class="paket">
                            <div class="namapaket">Paket deep tissue + Kerokan</div>
                            <div class="status">Dijadwalkan</div>
                        </div>

                        <div class="alamat">
                            <p>Jl. Raya Janti, Gg. Arjuna No.59</p>
                        </div>

                        <div class="waktu">
                            <div class="tanggal"><p>12/03/2023/09:30 AM</p></div>
                            <div class="ID"><p>ID pemesanan AN85356</p></div>
                        </div>
                    </div>
                </a>

            </div>
        </div>

        <div class="footer">
            <a href="http://127.0.0.1:8000/terapis/beranda-order">
                <img src="{{ asset('frontend/terapist/img/beranda-on.png') }}" alt="">
                <p>Beranda</p>
            </a>
            <a href="http://127.0.0.1:8000/terapis/riwayat-dijadwalkan">
                <img src="{{ asset('frontend/terapist/img/riwayat.png') }}" alt="">
                <p>Riwayat</p>
            </a>
            <a href="">
                <img src="{{ asset('frontend/terapist/img/pendapatan.png') }}" alt="">
                <p>Pendapatan</p>
            </a>
            <a href="">
                <img src="{{ asset('frontend/terapist/img/akun.png') }}" alt="">
                <p>Akun</p>
            </a>
        </div>

    </div>

</body>
</html>
