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
            <p>Isi Saldo</p>
        </div>
        @if(auth()->check() == false)
        <div class="transaksi-terakhir">
            <!-- Isi sesuai kebutuhan -->
            <div class="transaksi-terakhir-title">
                <p>Transaksi Terakhir</p>
            </div>
        </div>
        <div class="metode-topup">
            <div class="metode-topup-title">
                <p>Metode Top Up</p>
            </div>
            <div class="metode-topup-content">
                <!-- Kolom Gambar -->
                <!-- Kolom Logo Bank -->
                <div class="logo-bank-kolom">
                    <div class="logo-bank"><img src="{{ asset('storage/foto/bri.png') }}" alt="Bank 1">
                    </div>
                    <div class="logo-bank"><img src="{{ asset('storage/foto/bni.png') }}" alt="Bank 1">
                    </div>
                    <div class="logo-bank"><img src="{{ asset('storage/foto/mandiri.png') }}" alt="Bank 1">
                    </div>
                </div>
                <!-- //nama bank  -->
                <div class="nama-bank-kolom">
                    <p style="margin-bottom: 20px;">BRI</p>
                    <p style="margin-bottom: 20px;">BNI</p>
                    <p style="margin-bottom: 0px;">MANDIRI</p>
                </div>
                <!-- Kolom Radio Buttons -->
                <div class="radio-buttons-kolom">
                    <label class="radio-button">
                        <input type="radio" name="metodeTopup" style="margin-top: 10px;" value=" metode1">
                    </label>
                    <label class="radio-button">
                        <input type="radio" name="metodeTopup" style="margin-top: 20px;" value="metode2">
                    </label>
                    <label class="radio-button">
                        <input type="radio" name="metodeTopup" style="margin-top: 25px;" value="metode3">
                    </label>
                </div>
            </div>
        </div>
        <div class="submit">
            <a href="">
                <button class="button-rekening" type="submit">Selanjutnya</button>
            </a>
        </div>
        @elseif(auth()->check() == true)
        <div class="transaksi-terakhir">
            <!-- Isi sesuai kebutuhan -->
            <div class="transaksi-terakhir-title">
                <p>Transaksi Terakhir</p>
            </div>
        </div>

        <div class="metode-topup">
            <div class="metode-topup-title">
                <p>Metode Top Up</p>
            </div>
            <div class="metode-topup-content">
                <!-- Kolom Gambar -->
                <!-- Kolom Logo Bank -->
                <div class="logo-bank-kolom">
                    <div class="logo-bank"><img src="{{ asset('storage/foto/bri.png') }}" id="bri" alt="Bank 1">
                    </div>
                    <div class="logo-bank"><img src="{{ asset('storage/foto/bni.png') }}" id="bni" alt="Bank 1">
                    </div>
                    <div class="logo-bank"><img src="{{ asset('storage/foto/mandiri.png') }}" id="mandiri" alt="Bank 1">
                    </div>
                </div>
                <!-- //nama bank  -->
                <div class="nama-bank-kolom">
                    <p style="margin-bottom: 20px;">BRI</p>
                    <p style="margin-bottom: 20px;">BNI</p>
                    <p style="margin-bottom: 0px;">MANDIRI</p>
                </div>
                <!-- Kolom Radio Buttons -->
                <form class="form-horizontal" method="POST" action="{{ route('terapis.topupPost') }}" id="form-bank">
                    @csrf
                    <div class="radio-buttons-kolom">
                        <div class="radio-button">
                            <input type="radio" name="metodeTopup" style="margin-top: 10px;" value="bri">
                            <!-- //eror  -->
                            @error('metodeTopup')
                            <div class="alert alert-danger mt-2" hidden>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="radio-button">
                            <input type="radio" name="metodeTopup" style="margin-top: 10px;" value="bni">
                        </div>
                        <div class="radio-button">
                            <input type="radio" name="metodeTopup" style="margin-top: 10px;" value="mandiri">
                        </div>

                    </div>

            </div>
        </div>
        <div class="submit">
            <button class="button-rekening" type="submit">Selanjutnya</button>
        </div>
        </form>
        @endif

        @if(auth()->check() == false)
        <div class="footer">
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
        <div class="footer">
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
    //pesan error tampilkan menggunakan toasr
    $(document).ready(function() {
        $('.alert-danger').each(function() {
            alertMessage = $(this).text();
            //tampilkan toaser 5 detik
            toastr.error(alertMessage, 'Error', {
                timeOut: 3000
            });

        });
    });
</script>