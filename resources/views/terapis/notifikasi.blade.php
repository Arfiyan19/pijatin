<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pesanan Therapist</title>

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
            <p><b>Pesanan</b></p>

        </div>
        @if(auth()->check() == false)
        <div class="content-frame" style="margin-top: 20px;">
            <!-- /riwayat terakhir  -->
            <div class="frame-riwayat">
                <div class="frame-riwayat-title">
                    <span>New</span>
                </div>
            </div>
            <div class="frame-riwayat-content">
                <!-- Baris 1 -->
                <div class="riwayat-row">
                    <div class="riwayat-item">
                        <p style="font-size:14px ;">Pemberitahuan</p>
                    </div>
                </div>
                <div class="riwayat-row">
                    <div class="riwayat-item">
                        <p>Anda mendapatkan pesanan baru</p>
                    </div>
                </div>
                <!-- Baris 2 -->
                <div class="riwayat-row" style="color: #000000;font-family: Poppins;font-size: 10px;font-style: normal;font-weight: 400;line-height: normal;padding-top: 5px;">
                    <p>5 April 2023 / 18:00 PM</p>
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
        <div class="content-frame" style="margin-top: 20px;">
            <!-- /riwayat terakhir  -->
            <div class="frame-riwayat">
                <div class="frame-riwayat-title">
                    <span>New</span>
                </div>
            </div>

            @foreach($terapis->pemesanan1 as $pemesanan)
            <!-- //if pemesanan->read = 1 maka frame-riwayat-content else frame-riwayat-content active -->
            <div class="frame-riwayat-content{{ $pemesanan->read ? '' : ' active' }}" style="cursor: pointer;" onclick="konfirmasi('{{ $pemesanan->id }}')">

                <!-- <div class="frame-riwayat-content" style="cursor: pointer;" javascript:void(0) onclick="konfirmasi('{{ $pemesanan->id }}')"> -->
                <!-- Baris 1 -->
                <div class="riwayat-row">
                    <!-- <p>Tanggal : 5 Mei</p> -->
                    <div class="riwayat-item kolom-kiri">
                        <!-- Format PMSN-ID-NAMA_pEMESAN1 2 digit  -->
                        <p>ID : PMSN-0000{{ $pemesanan->id }}-{{ substr($pemesanan->nama_pemesan_1, 0, 2) }}
                    </div>
                    <div class="riwayat-item kolom-kanan">
                        <!-- fortmat 25 April 2023 / 18:00 PM -->
                        <p>{{ $pemesanan->created_at->format('d F Y / H:i A') }}</p>
                    </div>
                </div>

                <div class="riwayat-row">
                    <div class="riwayat-item">
                        <p style="font-size:14px ;">Pemberitahuan</p>
                    </div>
                </div>
                <div class="riwayat-row">
                    <div class="riwayat-item">
                        <p>Anda mendapatkan pesanan baru !</p>
                    </div>
                </div>


            </div>
            @endforeach

            <!-- <div class="frame-riwayat-content">
                <div class="riwayat-row">
                    <div class="riwayat-item">
                        <p>Anda berhasil menarik saldo</p>
                    </div>
                </div>
                <div class="riwayat-row">
                    <div class="riwayat-item kolom-kiri">
                        <p>Terima kasih atas kerja samanya</p>
                    </div>
                    <div class="riwayat-item kolom-kanan">
                        <p>5 April 2023 / 18:00 PM</p>
                    </div>
                </div>
            </div> -->
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
            <a href="{{ route('terapis.pemesanan') }}" class="{{ request()->is('terapis/terapis-pemesanan') ? 'active' : '' }}">
                <img src="{{ asset('frontend/terapist/img/pendapatan-on.png') }}" alt="">
                <p>Pesanan</p>
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
    // konfirmasi
    function konfirmasi(id) {
        window.location.href = "{{ route('terapis.konfirmasi', '') }}" + '/' + id;
    }
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