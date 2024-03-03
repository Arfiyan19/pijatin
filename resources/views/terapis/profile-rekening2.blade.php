<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rekening Therapist</title>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href=" {{ asset('frontend/terapist/css/profile-rekening2.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
    <!-- ======= link lib. icon ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="topbar">
            <a href="http://127.0.0.1:8000/terapis/profile-rekening">
            <i class="material-icons" style="font-size:36px">chevron_left</i>
            </a>
            <p>Rekening Therapist</p>
        </div>

        <div class="content">
            <form action="" method="post">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" placeholder="min. 2 huruf">

                <label for="rekening">No. Rekening</label>
                <input type="number" name="rekening" id="rekening" placeholder="12345678">

                <label for="bank">Nama Bank</label>
                <input type="text" name="bank" id="bank" placeholder="XXX">


            </form>

            <div class="tombol">
                <button type="reset">Edit</button>
                <a href="http://127.0.0.1:8000/terapis/profile-rekening3">
                <button type="submit">Simpan</button>
                </a>
            </div>
        </div>

    </div>

</body>
</html>
