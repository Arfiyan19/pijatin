<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bantuan</title>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href=" {{ asset('frontend/terapist/css/setting-bantuan.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
    <!-- ======= link lib. icon ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="topbar">
            <a href="http://127.0.0.1:8000/terapis/profile-setting">
            <i class="material-icons" style="font-size:36px">chevron_left</i>
            </a>
            <p>Bantuan</p>
        </div>

        <div class="content">
            <div class="pertanyaan">
                <a href="">
                    <p>Bagaimana top up saldo Body Message Partner ?</p>
                </a>

                <a href="">
                    <p>Bagaimana cara menyelesaikan pesanan layanan ?</p>
                </a>

                <a href="">
                    <p>Bagaimana cara ubah data profile ?</p>
                </a>

                <a href="">
                    <p>Bagaimana mengatasi lupa kata sandi ?</p>
                </a>

                <a href="">
                    <p>Bagaimana cara masuk aplikasi ?</p>
                </a>

                <a href="">
                    <p>Bagaimana cara memulihkan akun suspend?</p>
                </a>
            </div>


            <div class="chat">
                <a href="http://127.0.0.1:8000/terapis/setting-bantuanchat">
                    <img src="{{ asset('frontend/terapist/img/chat.png') }}" alt="">
                    {{-- <i class="material-icons" style="font-size:48px;color:#56ab91">chat</i> --}}
                </a>
            </div>
        </div>

    </div>
</body>
</html>
