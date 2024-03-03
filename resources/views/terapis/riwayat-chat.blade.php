<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notifikasi</title>
    <!-- ======= lib. icon google ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('frontend/terapist/css/riwayat-chat.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
</head>
<body>
    <div class="container">
        <div class="topbar">
            <a href="http://127.0.0.1:8000/terapis/riwayat-detailorder">
                <i class="material-icons" style="font-size:36px; color:#fff">chevron_left</i>
            </a>
            <div class="namacustomer">
                <img src="{{ asset('frontend/terapist/img/ppcustomer.png') }}" alt="">
                <p>Rika Salsabila</p>
            </div>
        </div>

        <div class="chatbox">
            <div class="pesan pesanku">
                <p>hai<br>  </p>
                <span>09:30</span>
            </div>

            <div class="pesan pesanmu">
                <p>hai juga<br>  </p>
                <span>09:30</span>
            </div>
        </div>


        <div class="footer">
            <i class="material-icons">attach_file</i>
            <input type="text" placeholder="ketik Disini">
            <button type="submit">
                <i class="material-icons">arrow_forward</i>
            </button>
        </div>

    </div>

</body>
</html>
