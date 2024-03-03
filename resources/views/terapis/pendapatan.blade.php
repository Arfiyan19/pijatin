<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pendapatan Therapist</title>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href=" {{ asset('frontend/terapist/css/pendapatan.css') }}">
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
            <p><b>Pendapatan</b></p>

        </div>
        @if(auth()->check() == false)
        <div class="content-frame">
            <div class="frame-saldo">
                <!-- //row1  -->
                <div class="frame-saldo-row1">
                    <div class="ikon-dompet">
                        <img src="{{ asset('frontend/terapist/img/dompet.png') }}" alt="">
                    </div>
                    <div class="nominal-col">Rp.1000.000,00</div>
                </div>
                <div class="menu-pendapatan">
                    <div class="menu-box">
                        <a href="javascript:void(0)" onclick="mytopup()" class="topup">
                            <div class="menu-image">
                                <img src="{{ asset('frontend/terapist/img/add.png') }}" alt="">
                            </div>
                            <div class="menu-text">
                                Isi saldo
                            </div>
                        </a>
                    </div>
                    <!-- //menu2 -->
                    <div class="menu-box">
                        <a href="javascript:void(0)" onclick="tariksaldo()">
                            <div class="menu-image">
                                <img src="{{ asset('frontend/terapist/img/group.png') }}" alt="">
                            </div>
                            <div class="menu-text">
                                Tarik Saldo
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /riwayat terakhir  -->
            <div class="frame-riwayat">
                <div class="frame-riwayat-title">
                    <span>Riwayat Terakhir</span>
                </div>
            </div>
            <div class="frame-riwayat-content">
                <!-- Baris 1 -->
                <div class="riwayat-row">
                    <div class="riwayat-item">
                        <p>Anda berhasil menarik saldo</p>
                    </div>
                </div>
                <!-- Baris 2 -->
                <div class="riwayat-row">
                    <div class="riwayat-item kolom-kiri">
                        <p>Terima kasih atas kerja samanya</p>
                    </div>
                    <div class="riwayat-item kolom-kanan">
                        <p>5 April 2023 / 18:00 PM</p>
                    </div>
                </div>
            </div>

            <div class="frame-riwayat-content">
                <!-- Baris 1 -->
                <div class="riwayat-row">
                    <div class="riwayat-item">
                        <p>Anda berhasil menarik saldo</p>
                    </div>
                </div>
                <!-- Baris 2 -->
                <div class="riwayat-row">
                    <div class="riwayat-item kolom-kiri">
                        <p>Terima kasih atas kerja samanya</p>
                    </div>
                    <div class="riwayat-item kolom-kanan">
                        <p>5 April 2023 / 18:00 PM</p>
                    </div>
                </div>
            </div>
            <div class="frame-riwayat-content">
                <!-- Baris 1 -->
                <div class="riwayat-row">
                    <div class="riwayat-item">
                        <p>Anda berhasil menarik saldo</p>
                    </div>
                </div>
                <!-- Baris 2 -->
                <div class="riwayat-row">
                    <div class="riwayat-item kolom-kiri">
                        <p>Terima kasih atas kerja samanya</p>
                    </div>
                    <div class="riwayat-item kolom-kanan">
                        <p>5 April 2023 / 18:00 PM</p>
                    </div>
                </div>
            </div>
            <div class="frame-riwayat-content">
                <!-- Baris 1 -->
                <div class="riwayat-row">
                    <div class="riwayat-item">
                        <p>Anda berhasil menarik saldo</p>
                    </div>
                </div>
                <!-- Baris 2 -->
                <div class="riwayat-row">
                    <div class="riwayat-item kolom-kiri">
                        <p>Terima kasih atas kerja samanya</p>
                    </div>
                    <div class="riwayat-item kolom-kanan">
                        <p>5 April 2023 / 18:00 PM</p>
                    </div>
                </div>
            </div>
        </div>

        @elseif(auth()->check() == true)
        <div class="content-frame">
            <div class="frame-saldo">
                <!-- //row1  -->
                <div class="frame-saldo-row1">
                    <div class="ikon-dompet">
                        <img src="{{ asset('frontend/terapist/img/dompet.png') }}" alt="">
                    </div>
                    <div class="nominal-col">Rp. {{ number_format($terapis->saldo->saldo, 0, ',', '.') }},00</div>
                </div>
                <div class="menu-pendapatan">
                    <div class="menu-box">
                        <a href="javascript:void(0)" onclick="mytopup()" class="topup">
                            <div class="menu-image">
                                <img src="{{ asset('frontend/terapist/img/add.png') }}" alt="">
                            </div>
                            <div class="menu-text">
                                Isi saldo
                            </div>
                        </a>
                    </div>
                    <!-- //menu2 -->
                    <div class="menu-box">
                        <a href="javascript:void(0)" onclick="tariksaldo()">
                            <div class="menu-image">
                                <img src="{{ asset('frontend/terapist/img/group.png') }}" alt="">
                            </div>
                            <div class="menu-text">
                                Tarik Saldo
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /riwayat terakhir  -->
            <div class="frame-riwayat">
                <div class="frame-riwayat-title">
                    <span>Riwayat Terakhir</span>
                </div>
            </div>
            <div class="frame-riwayat-content">
                <!-- Baris 1 -->
                <div class="riwayat-row">
                    <div class="riwayat-item">
                        <p>Anda berhasil menarik saldo</p>
                    </div>
                </div>
                <!-- Baris 2 -->
                <div class="riwayat-row">
                    <div class="riwayat-item kolom-kiri">
                        <p>Terima kasih atas kerja samanya</p>
                    </div>
                    <div class="riwayat-item kolom-kanan">
                        <p>5 April 2023 / 18:00 PM</p>
                    </div>
                </div>
            </div>

            <div class="frame-riwayat-content">
                <!-- Baris 1 -->
                <div class="riwayat-row">
                    <div class="riwayat-item">
                        <p>Anda berhasil menarik saldo</p>
                    </div>
                </div>
                <!-- Baris 2 -->
                <div class="riwayat-row">
                    <div class="riwayat-item kolom-kiri">
                        <p>Terima kasih atas kerja samanya</p>
                    </div>
                    <div class="riwayat-item kolom-kanan">
                        <p>5 April 2023 / 18:00 PM</p>
                    </div>
                </div>
            </div>
            <div class="frame-riwayat-content">
                <!-- Baris 1 -->
                <div class="riwayat-row">
                    <div class="riwayat-item">
                        <p>Anda berhasil menarik saldo</p>
                    </div>
                </div>
                <!-- Baris 2 -->
                <div class="riwayat-row">
                    <div class="riwayat-item kolom-kiri">
                        <p>Terima kasih atas kerja samanya</p>
                    </div>
                    <div class="riwayat-item kolom-kanan">
                        <p>5 April 2023 / 18:00 PM</p>
                    </div>
                </div>
            </div>
            <div class="frame-riwayat-content">
                <!-- Baris 1 -->
                <div class="riwayat-row">
                    <div class="riwayat-item">
                        <p>Anda berhasil menarik saldo</p>
                    </div>
                </div>
                <!-- Baris 2 -->
                <div class="riwayat-row">
                    <div class="riwayat-item kolom-kiri">
                        <p>Terima kasih atas kerja samanya</p>
                    </div>
                    <div class="riwayat-item kolom-kanan">
                        <p>5 April 2023 / 18:00 PM</p>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if(auth()->check() == false)
        <div class="footer">
            <a href="{{ url('terapis/beranda-order') }}">
                <img src="{{ asset('frontend/terapist/img/beranda.png') }}" alt="">
                <p>Beranda</p>
            </a>
            <a href="{{ url('terapis/riwayat-dijadwalkan') }}">
                <img src="{{ asset('frontend/terapist/img/riwayat.png') }}" alt="">
                <p>Riwayat</p>
            </a>
            <a href="{{ url('terapis/pendapatan') }}">
                <img src="{{ asset('frontend/terapist/img/pendapatan-on.png') }}" alt="">
                <p>Pendapatan</p>
            </a>
            <a href="{{ url('terapis/profile') }}">
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
            <a href="{{ route('terapis.riwayat') }}" class="{{ request()->is('terapis/riwayat') ? 'active' : '' }}">
                <img src="{{ asset('frontend/terapist/img/riwayat.png') }}" alt="">
                <p>Riwayat</p>
            </a>
            <a href="{{ route('terapis.pendapatan') }}" class="{{ request()->is('terapis/terapis-pendapatan') ? 'active' : '' }}">
                <img src="{{ asset('frontend/terapist/img/pendapatan-on.png') }}" alt="">
                <p>Pendapatan</p>
            </a>
            <a href="{{ route('terapis-profile.index') }}" class="{{ request()->is('terapis/profile') ? 'active' : '' }}">
                <img src="{{ asset('frontend/terapist/img/akun.png') }}" alt="">
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
    myfunction = () => {
        var historyElement = document.getElementById('history');
        historyElement.classList.toggle('active');

        // Perbarui tinggi content-ringkasan-pendapatan menjadi 90%
        var ringkasanElement = document.querySelector('.content-ringkasan-pendapatan');
        ringkasanElement.style.height = historyElement.classList.contains('active') ? '65%' : 'auto';
        var syaratElement = document.querySelector('.syarat-ketentuan');
        //geser ke bawah
        syaratElement.style.top = historyElement.classList.contains('active') ? '90%' : 'auto';
        var footerElement = document.querySelector('.footer');
        footerElement.style.top = historyElement.classList.contains('active') ? '20%' : 'auto';
    }

    function mytopup() {
        window.location.href = "{{ route('terapis.topup') }}";
    }
</script>