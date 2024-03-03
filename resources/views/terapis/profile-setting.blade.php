<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengaturan</title>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href=" {{ asset('frontend/terapist/css/profile-setting.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
    <!-- ======= link lib. icon ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="topbar">
            <a href="http://127.0.0.1:8000/terapis/profile">
            <i class="material-icons" style="font-size:36px">chevron_left</i>
            </a>
            <p>Pengaturan</p>
        </div>

        <div class="content">
            <a href="http://127.0.0.1:8000/terapis/edit-profile">
                <div class="menu">
                    <img src="{{ asset('frontend/terapist/img/profile_user.png') }}" alt="">
                    <label for="Editprofile">Notifikasi</label>
                    <i class="material-icons">chevron_right</i>
                </div>
            </a>

            <a href="http://127.0.0.1:8000/terapis/ubah-sandi">
                <div class="menu">
                    <img src="{{ asset('frontend/terapist/img/profile_ktp.png') }}" alt="">
                    <label for="ktp">Ubah Katasandi</label>
                    <i class="material-icons">chevron_right</i>
                </div>
            </a>

            <a href="http://127.0.0.1:8000/terapis/setting-ewallet">
                <div class="menu">
                    <img src="{{ asset('frontend/terapist/img/e-wallet.png') }}" alt="">
                    <label for="lokasi">Pin E-wallet</label>
                    <i class="material-icons">chevron_right</i>
                </div>
            </a>

            <a href="http://127.0.0.1:8000/terapis/setting-bantuan">
                <div class="menu">
                    <img src="{{ asset('frontend/terapist/img/profile_rekening.png') }}" alt="">
                    <label for="lokasi">Bantuan</label>
                    <i class="material-icons">chevron_right</i>
                </div>
            </a>


                <div class="menu" onclick="openpopup()">
                    <img src="{{ asset('frontend/terapist/img/profile_pengaturan.png') }}" alt="">
                    <label for="pengaturan">Keluar</label>
                    <i class="material-icons">chevron_right</i>
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
            <a href="http://127.0.0.1:8000/terapis/pendapatan">
                <img src="{{ asset('frontend/terapist/img/pendapatan.png') }}" alt="">
                <p>Pendapatan</p>
            </a>
            <a href="http://127.0.0.1:8000/terapis/profile">
                <img src="{{ asset('frontend/terapist/img/akun-on.png') }}" alt="">
                <p>Akun</p>
            </a>
        </div>

    </div>

    <div class="popup" id="popup">
        <div class="headpop">
            <h4>Keluar?</h4>
        </div>

        <div class="isi">
            <div class="kenapa">
                <p>Yakin ingin keluar dari akun?</p>
            </div>

            <div class="lapor">
                <a href="http://127.0.0.1:8000/terapis/profile-setting">
                    <button class="tidak">Tidak</button>
                </a>

                <a href="http://127.0.0.1:8000/terapis/login-terapis">
                    <button class="iya">Iya</button>
                </a>
            </div>

        </div>
    </div>

</body>
<script>
    // ============== pop up window ==============
let popup = document.getElementById ("popup");
function openpopup(){
    popup.classList.add("open-popup");
}
function closepopup(){
    popup.classList.remove("open-popup");
}

function alasanlain() {
    if (document.getElementById('btnlain').checked) {
        document.getElementById('isian').style.visibility = 'visible';
    } else document.getElementById('isian').style.visibility = 'hidden';
}
</script>

</html>
