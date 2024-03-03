<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Therapist</title>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href=" {{ asset('frontend/terapist/css/profile-therapist.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
    <!-- ======= link lib. icon ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="header">
            <div class="backbtn">
                <a href="">
                    <i class="material-icons" style="font-size:36px">chevron_left</i>
                </a>
            </div>

            <div class="preview">
                <div class="foto">
                    <img src="{{ asset('frontend/terapist/img/ppcustomer2.png') }}" alt="">
                    <span><img id="verified" src="{{ asset('frontend/terapist/img/verified.png') }}" alt=""></span>
                </div>
                <div class="bio">
                    <div class="idbox">
                        <p>ID therapist: </p>
                        <div class="id">1100231</div>
                    </div>

                    <h4 id="nama">Mira Setyawati</h4>
                </div>
                <div class="rating">
                    <p>XXX</p>
                </div>
            </div>
        </div>

        <div class="content">
            <a href="http://127.0.0.1:8000/terapis/edit-profile">
                <div class="menu">
                    <img src="{{ asset('frontend/terapist/img/profile_user.png') }}" alt="">
                    <label for="Editprofile">Edit profile</label>
                    <i class="material-icons">chevron_right</i>
                </div>
            </a>

            <a href="http://127.0.0.1:8000/terapis/ktp-skck">
                <div class="menu">
                    <img src="{{ asset('frontend/terapist/img/profile_ktp.png') }}" alt="">
                    <label for="ktp">KTP & SKCK</label>
                    <i class="material-icons">chevron_right</i>
                </div>
            </a>

            <a href="http://127.0.0.1:8000/terapis/profile-lokasi">
                <div class="menu">
                    <img src="{{ asset('frontend/terapist/img/profile_lokasi.png') }}" alt="">
                    <label for="lokasi">Lokasi</label>
                    <i class="material-icons">chevron_right</i>
                </div>
            </a>

            <a href="http://127.0.0.1:8000/terapis/profile-pengaturan">
                <div class="menu">
                    <img src="{{ asset('frontend/terapist/img/profile_pengaturan.png') }}" alt="">
                    <label for="pengaturan">Pengaturan</label>
                    <i class="material-icons">chevron_right</i>
                </div>
            </a>
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

    </div>

</body>
</html>
