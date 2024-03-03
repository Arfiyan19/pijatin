<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit profile</title>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href=" {{ asset('frontend/terapist/css/edit-profile.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
    <!-- ======= link lib. icon ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="topbar">
            <div class="backbtn">
                <a href="">
                    <i class="material-icons" style="font-size:36px">chevron_left</i>
                </a>
            </div>
            <h4>Edit profile</h4>
        </div>

        <div class="content">
            <div class="foto">
                <img src="{{ asset('frontend/terapist/img/ppcustomer2.png') }}" alt="">
            </div>

            <form id="form" method="post" action="" autocomplete="off" >

                <label for="nama" class="form-label">Nama lengkap<span>*</span></label>
                <div class="input-field">
                    <input type="text" class="form-input" id="nama" placeholder="min. 2 huruf" >
                    <div class="error"></div>
                </div>

                <label for="kota" class="form-label">Tempat lahir<span>*</span></label>
                <div class="input-field">
                    <input type="text" class="form-input" id="kota" placeholder="ex: Semarang">
                    <div class="error"></div>
                </div>

                <label for="lahir" class="form-label">Tanggal Lahir<span>*</span></label>
                <div class="input-field">
                    <input type="date" class="form-input" id="lahir"  >
                    <div class="error"></div>
                </div>

                <label for="kelamin" class="form-label">Jenis Kelamin<span>*</span></label>
                <div class="input-field radio">
                    <input type="radio" id="laki-laki" name="kelamin" value="laki-laki">
                    <label for="laki-laki">Laki-laki</label><br>
                    <input type="radio" id="perempuan" name="kelamin" value="perempuan">
                    <label for="perempuan">Perempuan</label><br>
                    <div class="error"></div>
                </div>

                <label for="email" class="form-label">Email<span>*</span></label>
                <div class="input-field">
                    <input type="email" class="form-input" id="email" placeholder="ex: XXX@mail.com">
                    <div class="error"></div>
                </div>

                <label for="telp" class="form-label">No.telp<span>*</span></label>
                <div class="input-field">
                    <input type="text" class="form-input" id="telp" placeholder="0111 2222 3333">
                    <div class="error"></div>
                </div>

                <div class="tombol">
                    <input type="reset" value="Edit">
                    <input type="submit" value="Simpan">
                </div>
            </form>
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
