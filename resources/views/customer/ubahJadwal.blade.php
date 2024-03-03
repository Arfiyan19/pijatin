<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- my style -->
    <link rel="stylesheet" href="{{ asset('frontend/css/homeCustomer.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/customer/ubahJadwal.css') }}">

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
    <div class="topbar">
        <div class="content">
            <div class="tittle">
                <a href="{{ route('alamat') }}"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                        <path d="M19.9492 25.9502L13.0492 19.0502C12.8992 18.9002 12.7932 18.7377 12.7312 18.5627C12.6682 18.3877 12.6367 18.2002 12.6367 18.0002C12.6367 17.8002 12.6682 17.6127 12.7312 17.4377C12.7932 17.2627 12.8992 17.1002 13.0492 16.9502L19.9492 10.0502C20.2242 9.77519 20.5742 9.6377 20.9992 9.6377C21.4242 9.6377 21.7742 9.77519 22.0492 10.0502C22.3242 10.3252 22.4617 10.6752 22.4617 11.1002C22.4617 11.5252 22.3242 11.8752 22.0492 12.1502L16.1992 18.0002L22.0492 23.8502C22.3242 24.1252 22.4617 24.4752 22.4617 24.9002C22.4617 25.3252 22.3242 25.6752 22.0492 25.9502C21.7742 26.2252 21.4242 26.3627 20.9992 26.3627C20.5742 26.3627 20.2242 26.2252 19.9492 25.9502Z" fill="white" />
                    </svg></a>
                <p>Ubah Jadwal</p>
            </div>
        </div>
    </div>



    <div class="container-tambah">
        <div class="txt-ubahJadwal text-start">
            <h6>Syarat & Ketentuan</h6>
            <p> 1. Batas perubahan jadwal maksimal 2 Jam sebelum keberangkatan Terapis <br>
                2. Biaya perubahan jadwal akan dikenakan denda sebesar 10% dari tarif nominal pembayaran anda <br>
                3. Anda hanya bisa mengubah tanggal dan jam layanan saja.
            </p>
        </div>

        <div class="head-jadwal">
            <div class="txt mb-3">Ubah Jadwal Layanan</div>
        </div>

        <div class="date-time">
            <div class="frame">
                <div class="date">
                    <div class="txt">Tanggal</div>
                    <div class="content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 20 22" fill="none">
                            <path d="M10 13.018C9.68519 13.018 9.42148 12.9212 9.20889 12.7275C8.99556 12.5344 8.88889 12.295 8.88889 12.0091C8.88889 11.7233 8.99556 11.4835 9.20889 11.2898C9.42148 11.0967 9.68519 11.0002 10 11.0002C10.3148 11.0002 10.5789 11.0967 10.7922 11.2898C11.0048 11.4835 11.1111 11.7233 11.1111 12.0091C11.1111 12.295 11.0048 12.5344 10.7922 12.7275C10.5789 12.9212 10.3148 13.018 10 13.018ZM5.55556 13.018C5.24074 13.018 4.97667 12.9212 4.76333 12.7275C4.55074 12.5344 4.44444 12.295 4.44444 12.0091C4.44444 11.7233 4.55074 11.4835 4.76333 11.2898C4.97667 11.0967 5.24074 11.0002 5.55556 11.0002C5.87037 11.0002 6.13444 11.0967 6.34778 11.2898C6.56037 11.4835 6.66667 11.7233 6.66667 12.0091C6.66667 12.295 6.56037 12.5344 6.34778 12.7275C6.13444 12.9212 5.87037 13.018 5.55556 13.018ZM14.4444 13.018C14.1296 13.018 13.8659 12.9212 13.6533 12.7275C13.44 12.5344 13.3333 12.295 13.3333 12.0091C13.3333 11.7233 13.44 11.4835 13.6533 11.2898C13.8659 11.0967 14.1296 11.0002 14.4444 11.0002C14.7593 11.0002 15.023 11.0967 15.2356 11.2898C15.4489 11.4835 15.5556 11.7233 15.5556 12.0091C15.5556 12.295 15.4489 12.5344 15.2356 12.7275C15.023 12.9212 14.7593 13.018 14.4444 13.018ZM10 17.0537C9.68519 17.0537 9.42148 16.9568 9.20889 16.7631C8.99556 16.5701 8.88889 16.3306 8.88889 16.0448C8.88889 15.7589 8.99556 15.5195 9.20889 15.3264C9.42148 15.1327 9.68519 15.0359 10 15.0359C10.3148 15.0359 10.5789 15.1327 10.7922 15.3264C11.0048 15.5195 11.1111 15.7589 11.1111 16.0448C11.1111 16.3306 11.0048 16.5701 10.7922 16.7631C10.5789 16.9568 10.3148 17.0537 10 17.0537ZM5.55556 17.0537C5.24074 17.0537 4.97667 16.9568 4.76333 16.7631C4.55074 16.5701 4.44444 16.3306 4.44444 16.0448C4.44444 15.7589 4.55074 15.5195 4.76333 15.3264C4.97667 15.1327 5.24074 15.0359 5.55556 15.0359C5.87037 15.0359 6.13444 15.1327 6.34778 15.3264C6.56037 15.5195 6.66667 15.7589 6.66667 16.0448C6.66667 16.3306 6.56037 16.5701 6.34778 16.7631C6.13444 16.9568 5.87037 17.0537 5.55556 17.0537ZM14.4444 17.0537C14.1296 17.0537 13.8659 16.9568 13.6533 16.7631C13.44 16.5701 13.3333 16.3306 13.3333 16.0448C13.3333 15.7589 13.44 15.5195 13.6533 15.3264C13.8659 15.1327 14.1296 15.0359 14.4444 15.0359C14.7593 15.0359 15.023 15.1327 15.2356 15.3264C15.4489 15.5195 15.5556 15.7589 15.5556 16.0448C15.5556 16.3306 15.4489 16.5701 15.2356 16.7631C15.023 16.9568 14.7593 17.0537 14.4444 17.0537ZM2.22222 21.0893C1.61111 21.0893 1.08778 20.8919 0.652222 20.4971C0.217407 20.1016 0 19.6264 0 19.0715V4.94677C0 4.39187 0.217407 3.91701 0.652222 3.52219C1.08778 3.1267 1.61111 2.92895 2.22222 2.92895H3.33333V0.911133H5.55556V2.92895H14.4444V0.911133H16.6667V2.92895H17.7778C18.3889 2.92895 18.9122 3.1267 19.3478 3.52219C19.7826 3.91701 20 4.39187 20 4.94677V19.0715C20 19.6264 19.7826 20.1016 19.3478 20.4971C18.9122 20.8919 18.3889 21.0893 17.7778 21.0893H2.22222ZM2.22222 19.0715H17.7778V8.9824H2.22222V19.0715Z" fill="#56AB91" />
                        </svg>
                        <label for="tanggal" class="form-label"><span></span></label>
                        <input class="form-control" id="tanggal" required placeholder="Pilih Tanggal">
                    </div>
                </div>

                <div class="date">
                    <div class="txt">Jam</div>
                    <div class="content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="31" viewBox="0 0 30 31" fill="none">
                            <path d="M14.9823 25.0788C20.275 25.0788 24.5656 20.7882 24.5656 15.4954C24.5656 10.2027 20.275 5.91211 14.9823 5.91211C9.68953 5.91211 5.39893 10.2027 5.39893 15.4954C5.39893 20.7882 9.68953 25.0788 14.9823 25.0788Z" fill="white" />
                            <path d="M15 8.41211V15.4954V8.41211ZM19.8458 15.4971H15.0346H19.8458Z" fill="white" />
                            <path d="M14.9823 25.0788C20.275 25.0788 24.5656 20.7882 24.5656 15.4954C24.5656 10.2027 20.275 5.91211 14.9823 5.91211C9.68953 5.91211 5.39893 10.2027 5.39893 15.4954C5.39893 20.7882 9.68953 25.0788 14.9823 25.0788Z" stroke="#56AB91" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15 8.41211V15.4954M19.8458 15.4971H15.0346" stroke="#56AB91" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <label for="jam" class="form-label"><span></span></label>
                        <input type="text" class="form-control" id="jam" required pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" value="00:00">
                    </div>
                </div>
            </div>

            <a type="button" class="btn-simpan" href="{{route('simpanJadwal')}}">Simpan</a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>