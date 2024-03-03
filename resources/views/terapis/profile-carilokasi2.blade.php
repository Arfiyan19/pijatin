<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile cari lokasi</title>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href=" {{ asset('frontend/terapist/css/profile-carilokasi2.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
    <!-- ======= link lib. icon ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="topbar">
            <a href="http://127.0.0.1:8000/terapis/profile-carilokasi">
            <i class="material-icons" style="font-size:36px">chevron_left</i>
            </a>
            <p>Cari Lokasi</p>
        </div>

        <div class="content">
            <div class="lokasi">
                <h4>Pilih Provinsi</h4>
                <p>DIY</p>
            </div>
            <div class="lokasi2">
                <h4>Pilih Kota/kabupaten</h4>
            </div>
            <a href="http://127.0.0.1:8000/terapis/profile-carilokasi3">
                <div class="provinsi">Kab. Bantul</div>
            </a>
            <div class="provinsi">Kab. Gunungkidul</div>
            <div class="provinsi">Kab. Kulon Progo</div>
            <div class="provinsi">Kab. Sleman</div>
            <div class="provinsi">Kab. Yogyakarta</div>
        </div>
    </div>

</body>
</html>
