<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat Bantuan </title>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href=" {{ asset('frontend/terapist/css/setting-bantuanchat.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
    <!-- ======= link lib. icon ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="topbar">
            <a href="http://127.0.0.1:8000/terapis/setting-bantuan">
            <i class="material-icons" style="font-size:36px">chevron_left</i>
            </a>
            <p>Bantuan (Admin)</p>
        </div>

        <div class="content">
            <div class="chatbox therapist">
                <p> p ingpo </p>
                <span>10:00</span>
            </div>
            <div class="chatbox admin">
                <p> Ada yang bisa admin bantu?</p>
                <span>10:00</span>
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
