<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>order baru</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('frontend/terapist/css/tolak-order.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">

</head>
<body>
    <div class="topbar">
        <a href="http://127.0.0.1:8000/terapis/beranda/notif-order"><img src="{{ asset('frontend/terapist/img/back.png') }}" alt=""></a>
        <div class="head">
            <h4>Yakin menolak pesanan ini?</h4>
            <p>Jika tidak terpaksa jangan dibatalkan</p>
        </div>
    </div>

    <div class="content">
        <div class="kenapa">
            <p>Kenapa pesanan dibatalkan?</p>
        </div>
        <form id="form" method="post" action="" >
            <div class="pilihan">
            {{-- <label for="sakit" class="form-label">Saya sedang sakit</label>
            <input type="radio" id="sakit" name="radio" value="sakit"> --}}
            <input type="radio" name="reason" value="Saya sedang sakit">Saya sedang sakit<br>
            </div>

            <div class="pilihan">
            {{-- <label for="kecelakaan" class="form-label">Saya kecelakaan di jalan</label>
            <input type="radio" id="kecelakaan" name="radio" value="kecelakaan"> --}}
            <input type="radio" name="reason" value="Saya kecelakaan di jalan">Saya kecelakaan di jalan<br>
            </div>

            <div class="pilihan">
            {{-- <label for="jauh" class="form-label">jarak tempuh terlalu jauh</label>
            <input type="radio" id="jauh" name="radio" value="jauh"> --}}
            <input type="radio" name="reason" value="jarak tempuh terlalu jauh">jarak tempuh terlalu jauh<br>
            </div>

            <div class="pilihan">
            {{-- <label for="Transportasi" class="form-label">Kendaraan berkendala</label>
            <input type="radio" id="Transportasi" name="radio" value="Transportasi"> --}}
            <input type="radio" name="reason" value="Kendaraan berkendala">Kendaraan berkendala<br>
            </div>

            <div class="pilihan">
            {{-- <label for="lain" class="form-label">Alasan lainnya</label>
            <input type="radio" id="lain" name="radio" value="lain"><br><input type="text" class="lainlain" id="alasan" placeholder="Ketik disini"> --}}
            <input type="radio" name="reason" value="lainnya">lainnya <input type="text" id="isian" name="other_reason" />
            </div>
        </form>

        <div class="lapor">
            <button type="submit">Kirim</button>
        </div>
    </div>

</body>
</html>

