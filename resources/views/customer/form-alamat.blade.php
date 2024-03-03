<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Alamat baru</title>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href=" {{ asset('frontend/terapist/css/profile-alamatbaru.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
    <!-- ======= link lib. icon ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="topbar">
            <a href="{{ route('customers.alamat', ['id' => $data->id]) }}">
                <i class="material-icons" style="font-size:36px">chevron_left</i>
            </a>
            <p>Alamat baru</p>
        </div>
        <div class="content">
            <div class="lokasi">Lokasi</div>
            <a href="{{ route('customers.cariLokasi', ['id' => $data->id]) }}">
                <div class="cari">
                    <label for="cari">Cari lokasi anda</label>
                    <i class="material-icons" style="font-size:36px">chevron_right</i>
                </div>
            </a>
            <div class="manual">
                <label for="alamat">Alamat lengkap</label>
                <textarea name="alamat" id="alamat" cols="50" rows="5" placeholder="masukkan alamat lengkap anda"></textarea>
            </div>

            <div class="tombol">
                <button type="button" onclick="history.back()">batal</button>
                <button type="submit">Simpan</button>
            </div>

        </div>
    </div>
</body>

</html>