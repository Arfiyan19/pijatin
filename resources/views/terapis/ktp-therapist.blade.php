<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KTP & SKCK</title>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href=" {{ asset('frontend/terapist/css/ktp-therapist.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
    <!-- ======= link lib. icon ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="topbar">
            <a href="">
                <i class="material-icons" style="font-size:36px">chevron_left</i>
            </a>


            <div class="judul">
                <h4>File KTP & SKCK</h4>
            </div>
        </div>
        @if (auth()->check() == false)
            <div class="ktpbar">
                <h4>File KTP</h4>
            </div>
            <div class="ktpbox">
                <div class="ktpbox2">
                    <div class="card">
                        <p>Foto KTP</p>
                        <div class="foto">
                            <img src="{{ asset('frontend/terapist/img/ktp_upload.png') }}" alt="">
                        </div>
                    </div>

                    <div class="card">
                        <p>Foto selfie</p>
                        <div class="foto">
                            <img src="{{ asset('frontend/terapist/img/ktp_selfie.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="skckbar">
                <h4>File SKCK</h4>
            </div>
            <div class="skckbox">
                <div class="skckbox2">
                    <img src="{{ asset('frontend/terapist/img/skck_upload.png') }}" alt="">
                </div>
            </div>
            <div class="footer">
                <a href="http://127.0.0.1:8000/terapis/beranda-order">
                    <img src="{{ asset('frontend/terapist/img/beranda.png') }}" alt="">
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
                <a href="http://127.0.0.1:8000/terapis/profile">
                    <img src="{{ asset('frontend/terapist/img/akun-on.png') }}" alt="">
                    <p>Akun</p>
                </a>
            </div>
        @elseif(auth()->check() == true)
            <div class="ktpbar">
                <h4>File KTP</h4>
            </div>
            <div class="ktpbox">
                <div class="ktpbox2">
                    <div class="card">
                        <p>Foto KTP</p>
                        <div class="foto">
                            <img src="{{ asset('storage/foto_ktp/' . $data['foto_ktp']) }}" alt="">
                        </div>
                    </div>

                    <div class="card">
                        <p>Foto selfie</p>
                        <div class="foto">
                            <img src="{{ asset('storage/foto/' . $data['foto']) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="skckbar">
                <h4>File SKCK</h4>
            </div>
            <div class="skckbox">
                <div class="skckbox2">
                    <img src="{{ asset('storage/foto_skck/' . $data['foto_skck']) }}" alt="">
                </div>
            </div>
            <div class="footer">
                <a href="">
                    <img src="{{ asset('frontend/terapist/img/beranda.png') }}" alt="">
                    <p>Beranda</p>
                </a>
                <a href="">
                    <img src="{{ asset('frontend/terapist/img/riwayat.png') }}" alt="">
                    <p>Riwayat</p>
                </a>
                <a href="">
                    <img src="{{ asset('frontend/terapist/img/pendapatan.png') }}" alt="">
                    <p>Pendapatan</p>
                </a>
                <a href="">
                    <img src="{{ asset('frontend/terapist/img/akun-on.png') }}" alt="">
                    <p>Akun</p>
                </a>
            </div>
        @endif



    </div>

</body>

</html>
