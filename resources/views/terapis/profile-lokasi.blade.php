<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Therapist</title>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href=" {{ asset('frontend/terapist/css/profile-lokasi.css') }}">
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
            <p>Pilih alamat</p>
        </div>
        <!-- //buatkan list alamat  -->
        <!-- //end list alamat  -->


        <div class="content">
            <!-- //list alamat  -->

            <a href="http://127.0.0.1:8000/terapis/profile-alamatbaru">
                <button type="button">+ Tambah alamat</button>
            </a>

        </div>
    </div>
</body>

</html>