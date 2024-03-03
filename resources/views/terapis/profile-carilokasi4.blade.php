<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>cari lokasi</title>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href=" {{ asset('frontend/terapist/css/profile-carilokasi4.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
    <!-- ======= link lib. icon ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="topbar">
            <a href="http://127.0.0.1:8000/terapis/profile-carilokasi3">
            <i class="material-icons" style="font-size:36px">chevron_left</i>
            </a>
            <p>Cari Lokasi</p>
        </div>

        <div class="content">
            <div class="lokasi">
                <h4>Pilih Provinsi</h4>
                <p>DIY</p>
            </div>
            <div class="lokasi">
                <h4>Pilih Kota/kabupaten</h4>
                <p>Kab. bantul</p>
            </div>
            <div class="lokasi">
                <h4>Pilih Kecamatan</h4>
                <p>Kec. Moyudan</p>
            </div>

            <div class="submit">
                <a href="http://127.0.0.1:8000/terapis/profile-alamatbaru">
                    <button type="submit">Simpan</button>
                </a>
            </div>

        </div>
    </div>

</body>
</html>
