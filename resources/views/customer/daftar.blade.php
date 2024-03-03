<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- my style -->
    <link rel="stylesheet" href="{{ asset('frontend/css/homeCustomer.css') }}">

    <!-- logo tittle bar -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }}">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Tambahkan jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <title>Pijat.in</title>
</head>

<body>


    <div class="container-form">
        <a class="back" href=""><img src="{{ asset('frontend/assets/image/arrowL.svg') }}" alt=""></a>
        <div class="header">
            <img src="{{ asset('frontend/assets/image/logo2.svg') }}" alt="">
            <div class="text">Selamat Datang</div>
        </div>
        <div class="frame">
            <div class="txt">Masukan data diri anda</div>

            <div class="parent-label">
                <div class="form">
                    <label for="nama" class="form-label">NIK KTP <span>*</span> </label>
                    <input class="form-control" id="nama" required>
                </div>
                <div class="form">
                    <label for="nik" class="form-label">Nama lengkap <span>*</span> </label>
                    <input class="form-control" id="nik" required>
                </div>
                <div class="form">
                    <label for="tl" class="form-label">Tempat Lahir <span>*</span> </label>
                    <input class="form-control" id="tl" required>
                </div>
                <div class="form">
                    <label for="tanggal" class="form-label">Tanggal Lahir <span>*</span></label>
                    <input class="form-control" id="tanggal" required>
                </div>
                <div class="form">
                    <label for="tanggal" class="form-label">Jenis Kelamin <span>*</span></label>
                    <div class="select">
                        <div class="radio">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Laki-laki
                            </label>
                        </div>
                        <div class="radio">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Perempuan
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form">
                    <label for="tanggal" class="form-label">Email <span>*</span></label>
                    <input class="form-control" id="tanggal" required>
                </div>
                <div class="form">
                    <label for="tanggal" class="form-label">No Telepon <span>*</span></label>
                    <input class="form-control" id="tanggal" type="number" required>
                </div>
                <div class="form">
                    <label for="tanggal" class="form-label">Kata Sandi <span>*</span></label>
                    <input class="form-control" id="tanggal" type="password" required>
                </div>
                <div class="form">
                    <label for="tanggal" class="form-label">Konfirmasi Kata Sandi <span>*</span></label>
                    <input class="form-control" id="tanggal" type="password" required>
                </div>
            </div>
        </div>


        @if(auth()->check() == false)
        <div class="button"><a href="{{ route('tambahfoto') }}"><button>Daftar</button></a></div>
        @elseif(auth()->check() == true)
        <div class="button"><a href="{{ route('customers.formProfileAddFoto') }}"><button>Daftar</button></a></div>

        @endif

        <div class="keterangan">
            <p>Anda sudah punya akun ? </p>
            <a href="{{ route('logincustomer') }}" style="text-decoration: none;">MASUK</a>
        </div>
    </div>



    <script>
        $(function() {
            // Inisialisasi kalender pop-up
            $("#tanggal").datepicker({
                dateFormat: "dd/mm/yy", // Format tanggal yang diinginkan
                changeMonth: true,
                changeYear: true
            });
        });
    </script>

</body>

</html>