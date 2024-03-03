<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Therapist || Isi Saldo </title>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href=" {{ asset('frontend/terapist/css/topup.css') }} ">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
    <!-- ======= link lib. icon ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- //import cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- //cdn jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


</head>

<body>
    <div class="container">
        <div class="topbar">
            <div class="backbtn">
                <a href="">
                    <i class="material-icons" style="font-size:36px">chevron_left</i>
                </a>
            </div>
            <!-- <h5>Rekening Therapist</h5> -->
            <p><b>Isi Saldo</b></p>
        </div>
        @if(auth()->check() == false)
        <div class="frame-bank">
            <div class="frame-bank-spanduk">
                <div class="frame-bank-spanduk-title">
                    <!-- Row 1 -->
                    <div class="frame-bank-spanduk-title-row1">
                        <div class="atasnama">An. Finance PIJAT.IN</div>
                        <div class="logokecil">
                            <img src="{{ asset('frontend/terapist/img/logoBRI.png') }}" alt="">
                        </div>
                    </div>
                    <!-- Row 2 -->
                    <div class="frame-bank-spanduk-title-row2 nomorrekening">
                        <p>0001011200099</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="tutor-topup">
            <!-- Title -->
            <div class="title">
                <p>Cara Isi Saldo E-Walllet</p>
            </div>
            <!-- Detail -->
            <div class="detail">
                <div class="detail-item">
                    <div class="circle">
                        <span>1</span>
                    </div>
                    <div class="circleText">
                        Pilih rekening dan salin nomor rekening ke M-Banking anda
                    </div>
                </div>
                <div class="detail-item">
                    <div class="circle">
                        <span>2</span>
                    </div>
                    <div class="circleText">
                        Sesuaikan nominal transfer dengan saldo yang ingin anda isikan
                    </div>
                </div>
                <div class="detail-item">
                    <div class="circle">
                        <span>3</span>
                    </div>
                    <div class="circleText">
                        Tambahkan kode 3 diigit pada akhir nominal transaksi Contoh:Rp 100.123
                    </div>
                </div>
                <div class="detail-item">
                    <div class="circle">
                        <span>4</span>
                    </div>
                    <div class="circleText">
                        Upload bukti transfer anda setelah melakukan transaksi
                    </div>
                </div>
                <div class="detail-item">
                    <div class="circle">
                        <span>5</span>
                    </div>
                    <div class="circleText">
                        Ketika pembayaran anda sudah dikonfirmasi saldo anda akan otomatis bertambah
                    </div>
                </div>

            </div>
        </div>

        <div class="submitTopup2">
            <a href="">
                <button class="button-rekening" type="submit">Selanjutnya</button>
            </a>
        </div>
        <!-- //tutorial topup  -->


        @elseif(auth()->check() == true)
        <div class="frame-bank">
            <div class="frame-bank-spanduk">
                <div class="frame-bank-spanduk-title">
                    <!-- Row 1 -->
                    <div class="frame-bank-spanduk-title-row1">
                        <div class="atasnama">An. Finance PIJAT.IN</div>
                        <div class="logokecil">

                            @if($nama_bank == 'bri')
                            <img src="{{ asset('frontend/terapist/img/logoBRI.png') }}" alt="">
                            @elseif($nama_bank == 'bni')
                            <img src="{{ asset('frontend/terapist/img/logoBNI.png') }}" alt="">
                            @elseif($nama_bank == 'mandiri')
                            <img src="{{ asset('frontend/terapist/img/logoLIVIN.png') }}" alt="">
                            @endif
                        </div>
                    </div>
                    <!-- Row 2 -->
                    <div class="frame-bank-spanduk-title-row2 nomorrekening">
                        @if($nama_bank == 'bri')
                        <p> {{ $bank['BRI']['no_rek'] }} </p>
                        @elseif($nama_bank == 'bni')
                        <p> {{ $bank['BNI']['no_rek'] }} </p>
                        @elseif($nama_bank == 'mandiri')
                        <p> {{ $bank['MANDIRI']['no_rek'] }} </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="tutor-topup">
            <!-- Title -->
            <div class="title">
                <p>Cara Isi Saldo E-Walllet</p>
            </div>
            <!-- Detail -->
            <div class="detail">
                <div class="detail-item">
                    <div class="circle">
                        <span>1</span>
                    </div>
                    <div class="circleText">
                        Pilih rekening dan salin nomor rekening ke M-Banking anda
                    </div>
                </div>
                <div class="detail-item">
                    <div class="circle">
                        <span>2</span>
                    </div>
                    <div class="circleText">
                        Sesuaikan nominal transfer dengan saldo yang ingin anda isikan
                    </div>
                </div>
                <div class="detail-item">
                    <div class="circle">
                        <span>3</span>
                    </div>
                    <div class="circleText">
                        Tambahkan kode 3 diigit pada akhir nominal transaksi Contoh:Rp 100.123
                    </div>
                </div>
                <div class="detail-item">
                    <div class="circle">
                        <span>4</span>
                    </div>
                    <div class="circleText">
                        Upload bukti transfer anda setelah melakukan transaksi
                    </div>
                </div>
                <div class="detail-item">
                    <div class="circle">
                        <span>5</span>
                    </div>
                    <div class="circleText">
                        Ketika pembayaran anda sudah dikonfirmasi saldo anda akan otomatis bertambah
                    </div>
                </div>

            </div>
        </div>
        <form action="{{ route('terapis.topup3', ['nama_bank' => $nama_bank]) }}" method="GET">
            <div class="submitTopup2">
                <button class="button-rekening" type="submit">Selanjutnya</button>
            </div>
            <!-- //tutorial topup  -->
        </form>
        @endif

        @if(auth()->check() == false)
        <div class="footer-topup2">
            <a href="http://127.0.0.1:8000/terapis/beranda-order">
                <img src="{{ asset('frontend/terapist/img/beranda.png') }}" alt="">
                <p>Beranda</p>
            </a>
            <a href="http://127.0.0.1:8000/terapis/riwayat-dijadwalkan">
                <img src="{{ asset('frontend/terapist/img/riwayat.png') }}" alt="">
                <p>Riwayat</p>
            </a>
            <a href="">
                <img src="{{ asset('frontend/terapist/img/pendapatan-on.png') }}" alt="">
                <p>Pendapatan</p>
            </a>
            <a href="http://127.0.0.1:8000/terapis/profile">
                <img src="{{ asset('frontend/terapist/img/akun.png') }}" alt="">
                <p>Akun</p>
            </a>
        </div>
        @elseif(auth()->check() == true)
        <div class="footer-topup2">
            <a href="{{ route('terapis.dashboard') }}" class="{{ request()->is('terapis/beranda') ? 'active' : '' }}">
                <img src="{{ asset('frontend/terapist/img/beranda.png') }}" alt="">
                <p>Beranda</p>
            </a>
            <a href="{{ route('terapis.riwayat') }}">
                <img src="{{ asset('frontend/terapist/img/riwayat.png') }}" alt="">
                <p>Riwayat</p>
            </a>
            <a href="">
                <img src="{{ asset('frontend/terapist/img/pendapatan.png') }}" alt="">
                <p>Pendapatan</p>
            </a>
            <a href="{{ route('terapis-profile.index') }}">
                <img src="{{ asset('frontend/terapist/img/akun-on.png') }}" alt="">
                <p>Akun</p>
            </a>
        </div>
        @endif
    </div>

</body>

</html>
<script>
    $(document).ready(function() {
        var success = document.getElementById('success').innerHTML;
        displaySuccessMessage(success);
    });

    function displaySuccessMessage(message) {
        toastr.success(message, 'Success');
    }
</script>