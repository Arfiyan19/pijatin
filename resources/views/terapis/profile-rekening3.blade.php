<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rekening Therapist</title>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href=" {{ asset('frontend/terapist/css/profile-rekening3.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
    <!-- ======= link lib. icon ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="topbar">
            <a href="http://127.0.0.1:8000/terapis/profile-rekening2">
            <i class="material-icons" style="font-size:36px">chevron_left</i>
            </a>
            <p>Rekening Therapist</p>
        </div>

        <div class="content">
            <div class="rekening">
                <h4>Nama lengkap</h4>
                <p>Conan Doyle</p>
            </div>
            <div class="rekening">
                <h4>No.Rekening</h4>
                <p>1234567890</p>
            </div>
            <div class="rekening">
                <h4>Nama bank</h4>
                <p>BCA</p>
            </div>

            <div class="submit">
                <a href="http://127.0.0.1:8000/terapis/profile">
                    <button type="submit">Kembali</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
