<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notifikasi</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('frontend/terapist/css/notif-terapis.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
</head>

<body>
    <div class="topbar">
        <a href=""><img src="{{ asset('frontend/terapist/img/back.png') }}" alt=""></a>
        <p>Notifikasi</p>
    </div>

    <div class="container2">
        <div class="new">
            <p>NEW</p>
            <div class="jumlah"></div>
        </div>
        <div class="notif">
            <a href="{{ route('notif-order') }}">
                <div class="timestamp">
                    <div class="tgl">
                        <p><span>Tanggal:</span>5 mei 2023</p>
                    </div>
                    <div class="jam">
                        <p><span>Waktu:</span>14:00</p>
                    </div>

                </div>
                <div class="konten">
                    <h3 id="subjek">Hallo Mira,</h3>
                    <p id="isi">Anda mendapat pesan baru!</p>
                </div>
            </a>
        </div>
        <div class="notif">
            <div class="timestamp">
                <div class="tgl">
                    <p><span>Tanggal:</span>5 mei 2023</p>
                </div>
                <div class="jam">
                    <p><span>Waktu:</span>14:00</p>
                </div>
            </div>
            <div class="konten">
                <h3 id="subjek">Hallo Mira,</h3>
                <p id="isi">Anda mendapat pesan baru!</p>
            </div>
        </div>
        <div class="notif">
            <div class="timestamp">
                <div class="tgl">
                    <p><span>Tanggal:</span>5 mei 2023</p>
                </div>
                <div class="jam">
                    <p><span>Waktu:</span>14:00</p>
                </div>
            </div>
            <div class="konten">
                <h3 id="subjek">Hallo Mira,</h3>
                <p id="isi">Anda mendapat pesan baru!</p>
            </div>
        </div>

        <div class=" sistem">
            <div class="atas">
                <h4>Komisi sudah kami kirim,mohon cek saldo anda</h4>
            </div>
            <p>Terimakasih atas kerja samanya</p>
            <div class="bawah">

                <p>1 April 2023/09:00AM</p>
            </div>
        </div>

        <div class=" sistem">
            <div class="atas">
                <h4>Saldo anda telah dikurangi</h4>
            </div>
            <div class="bawah">
                <p>5 April 2023/18:00PM</p>
            </div>
        </div>
    </div>
</body>

</html>
