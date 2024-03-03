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

    <!-- ======= link lib. icon ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- //import cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- my style -->
    <link rel="stylesheet" href="{{ asset('frontend/terapist/css/riwayat-detail-laporkan-customer.css') }}">

    <!-- logo tittle bar -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- //cdn jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <title>Laporkan Customer</title>
</head>

<body>
    <div class="container">
        <div class="topbar">
            <div class="backbtn">
                <a href="http://127.0.0.1:8000/terapis/riwayat-detailorder">
                    <i class="material-icons" style="font-size:36px">chevron_left</i>
                </a>
            </div>
            <p>Laporkan</p>
        </div>

        <div class="containerform">
            <form id="" action="" method="">
                <p class="pesanan">Id pesanan : AV06798</p>
                <p class="textdeskripsi">Tambahkan link berisi foto atau video, sebagai bukti pendukung jika ada</p>
                <input type="url" placeholder="masukan link disini" required>
                <br>
                <p class="textdeskripsi required">Tulis alasan anda dengan jelas dan detail</p>
                <textarea required></textarea>

                <div class="btn">
                    <button type="submit" class="btn-laporkancustomer">Kirim</button>
                </div>
            </form>
        </div>

    </div>
    <br>
    <br>


</body>

</html>