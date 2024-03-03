<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Therapist || PIN E-WALLET </title>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href=" {{ asset('frontend/terapist/css/pin-eWallet.css') }} ">
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
                <a href="{{ route('terapis.pengaturan', auth()->user()->id) }}">
                    <i class="material-icons" style="font-size:36px">chevron_left</i>
                </a>
            </div>
            <!-- <h5>Rekening Therapist</h5> -->
            <p>Pin E-Wallet</p>
        </div>
        @if(auth()->check() == false)
        <div class="frame-buat-pin">
            <!-- frame-buat-pin-title  -->
            <div class="frame-buat-pin-title">
                <p>Buat PIN</p>
            </div>
            <!-- Buat PIN yang sulit ditebak oleh orang lain agar transaksi dan akunmu lebih aman. -->
            <div class="frame-buat-pin-content">
                <p>Buat PIN yang sulit ditebak oleh orang lain agar transaksi dan akunmu lebih aman.</p>
            </div>
            <!-- frame-buat-pin-content input -->
            <div class="frame-buat-pin-content-input">
                <input type="text" maxlength="1" />
                <input type="text" maxlength="1" />
                <input type="text" maxlength="1" />
                <input type="text" maxlength="1" />
                <input type="text" maxlength="1" />
                <input type="text" maxlength="1" />
            </div>
        </div>
        <div class="submit">
            <button class="button-rekening" type="submit">Selanjutnya</button>
        </div>
        @elseif(auth()->check() == true)
        <div class="frame-buat-pin">
            <!-- frame-buat-pin-title  -->
            <div class="frame-buat-pin-title">
                <p>Buat PIN</p>
            </div>
            <!-- Buat PIN yang sulit ditebak oleh orang lain agar transaksi dan akunmu lebih aman. -->
            <div class="frame-buat-pin-content">
                <p>Buat PIN yang sulit ditebak oleh orang lain agar transaksi dan akunmu lebih aman.</p>
            </div>
            <!-- frame-buat-pin-content input -->
            <!-- //if saldo null  -->
            @if($saldo->pin == null)
            <div class="frame-buat-pin-content-input">
                <input type="text" maxlength="1" />
                <input type="text" maxlength="1" />
                <input type="text" maxlength="1" />
                <input type="text" maxlength="1" />
                <input type="text" maxlength="1" />
                <input type="text" maxlength="1" />
            </div>
            <!-- //if saldo not null  -->
            @elseif($saldo->pin != null)
            <div class="frame-buat-pin-content-input">
                @for($i = 0; $i < 6; $i++) <!-- //input kotak2 isi ** -->
                    <input type="text" maxlength="1" value="*" disabled class="pin-digit" />
                    @endfor
                    <i class="fa fa-eye" id="eye-icon" onclick="togglePinVisibility()"></i>
            </div>
            @endif

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <!-- //buatkan ikon eye disamping nya  -->

        </div>
        <div class="submit">
            <button class="button-rekening" type="submit">Selanjutnya</button>
        </div>
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
@if(auth()->check() == true)

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
    //functioon untuk submit
    $(document).ready(function() {
        $('.button-rekening').click(function() {
            // All input values
            var array = [];
            var input = $('.frame-buat-pin-content-input input').each(function() {
                array.push($(this).val());
            });

            // Check if any input is empty or not a number
            var isValid = true;
            for (var i = 0; i < array.length; i++) {
                if (array[i] === '' || isNaN(array[i])) {
                    isValid = false;
                    break;
                }
            }
            if (isValid) {
                $.ajax({
                    url: "{{ route('terapis.postPinEwallet', auth()->user()->id) }}",
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "pin": array.join('')
                    },
                    success: function(response) {
                        if (response.success) {
                            //splash screen atas lingkaran img posisi tengah
                            //modifi  toasr img posisi tengah
                            toastr.success(response.success);

                            // toastr.success(response.success);
                            // setTimeout(function() {
                            // window.location.href = "{{ route('terapis-profile.index') }}";
                            // }, 2000);
                        } else {
                            toastr.error(response.error);
                        }
                    }
                });
            } else {
                toastr.error('PIN Kurang lengkap');
            }
        });
    });

    //open eye atau edit 
    function togglePinVisibility() {
        var pinDigits = document.querySelectorAll('.pin-digit');
        var eyeIcon = document.getElementById('eye-icon');

        if (eyeIcon.classList.contains('fa-eye')) {
            // If the eye icon is open, hide the PIN and change the icon to closed eye
            //enable
            pinDigits.forEach(function(digitInput) {
                digitInput.removeAttribute('disabled');
                //apend

            });

            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            // If the eye icon is closed, reveal the PIN and change the icon to open eye
            pinDigits.forEach(function(digitInput) {
                //disabloe
                digitInput.setAttribute('disabled', true);
            });
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }
</script>
@endif