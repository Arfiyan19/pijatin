<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Therapist</title>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href=" {{ asset('frontend/terapist/css/profile-pengaturan.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
    <!-- ======= link lib. icon ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- //import cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- //cdn jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


</head>

<body>
    <div class="container">
        <div class="topbar">
            <div class="backbtn">
                <a href="{{ route('terapis-profile.index') }}">
                    <i class="material-icons" style="font-size:36px">chevron_left</i>
                </a>
            </div>
            <!-- <h5>Rekening Therapist</h5> -->
            <p>Pengaturan</p>

        </div>
        @if(auth()->check() == false)
        <div class="content">
            <a href="javascript:void(0)">
                <div class="menu">
                    <img src="{{ asset('frontend/terapist/img/lonceng1.png') }}" alt="">
                    <label for="lokasi">Notifikasi</label>
                    <!-- <inpur type toogle  -->
                    <div class="toggle">
                        <label class="switch">
                            <input type="checkbox" id="statusSwitch">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
            </a>

            <a href="">
                <div class=" menu">
                    <img src="{{ asset('frontend/terapist/img/gembok.png') }}" alt="">
                    <label for="lokasi">Ganti Kata Sandi</label>
                </div>
            </a>
            <a href="">
                <div class="menu">
                    <img src="{{ asset('frontend/terapist/img/kunci.png') }}" alt="">
                    <label for="lokasi">PIN E-Wallet</label>
                    <!-- <img id="alert" src="{{ asset('frontend/terapist/img/profile_alert.png') }}" alt=""> -->
                    <!-- <i class="material-icons">chevron_right</i> -->
                </div>
            </a>
            <a href="">
                <div class=" menu">
                    <img src="{{ asset('frontend/terapist/img/info.png') }}" alt="">
                    <label for="lokasi">Bantuan</label>
                </div>
            </a>
            <a href="">
                <div class=" menu">
                    <img src="{{ asset('frontend/terapist/img/keluar.png') }}" alt="">
                    <label for="lokasi">Keluar</label>
                </div>
            </a>
        </div>
        @elseif(auth()->check() == true)
        <div class="content">
            <a href="javascript:void(0)">
                <div class="menu">
                    <img src="{{ asset('frontend/terapist/img/lonceng1.png') }}" alt="">
                    <label for="lokasi">Notifikasi</label>
                    <!-- <inpur type toogle  -->
                    <div class="toggle">
                        <label class="switch">
                            <input type="checkbox" id="statusSwitch">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
            </a>

            <a href="">
                <div class=" menu">
                    <img src="{{ asset('frontend/terapist/img/gembok.png') }}" alt="">
                    <label for="lokasi">Ganti Kata Sandi</label>
                </div>
            </a>
            <a href="{{ url('terapis/terapis-profile/pengaturan', auth()->user()->id) }}/pin-e-wallet">
                <div class="menu">
                    <img src="{{ asset('frontend/terapist/img/kunci.png') }}" alt="">
                    <label for="lokasi">PIN E-Wallet</label>
                    <!-- <img id="alert" src="{{ asset('frontend/terapist/img/profile_alert.png') }}" alt=""> -->
                    <!-- <i class="material-icons">chevron_right</i> -->
                </div>
            </a>
            <a href="">
                <div class=" menu">
                    <img src="{{ asset('frontend/terapist/img/info.png') }}" alt="">
                    <label for="lokasi">Bantuan</label>
                </div>
            </a>
            <a href="{{ route('terapis.logout') }}">
                <div class=" menu">
                    <img src="{{ asset('frontend/terapist/img/keluar.png') }}" alt="">
                    <label for="lokasi">Keluar</label>
                </div>
            </a>
        </div>
        @endif

        @if(auth()->check() == false)
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
        <div class="footer">
            <a href="{{ route('terapis.dashboard') }}" class="{{ request()->is('terapis/beranda') ? 'active' : '' }}">
                <img src="{{ asset('frontend/terapist/img/beranda.png') }}" alt="">
                <p>Beranda</p>
            </a>
            <a href="{{ route('terapis.riwayat') }}">
                <img src="{{ asset('frontend/terapist/img/riwayat.png') }}" alt="">
                <p>Riwayat</p>
            </a>
            <a href="">
                <img src="{{ asset('frontend/terapist/img/pendapatan.png') }}" alt="">
                <p>Pendapatan</p>
            </a>
            <a href="{{ route('terapis-profile.index') }}">
                <img src="{{ asset('frontend/terapist/img/akun-on.png') }}" alt="">
                <p>Akun</p>
            </a>
        </div>
        @endif
    </div>

</body>

</html>
<script>
    $(document).ready(function() {
        var success = document.getElementById('success').innerHTML;
        displaySuccessMessage(success);
    });

    function displaySuccessMessage(message) {
        toastr.success(message, 'Success');
    }
</script>