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

    <title>Pijat.in</title>
</head>

<body style="overflow: hidden;">
    <div class="container-splash" id="splash-screen">
        <img class="flower1" src="{{ asset('frontend/assets/image/flower1.png') }}" alt="">
        <img class="flower2" src="{{ asset('frontend/assets/image/flower2.png') }}" alt="">
        <img class="flower3" src="{{ asset('frontend/assets/image/flower3.png') }}" alt="">
        <div class="content-splash">
            <img src="{{ asset('frontend/assets/image/logo1.png') }}" alt="">
            <div class="txt">
                Body Massage App
            </div>
        </div>
    </div>

    <script>
        // Tambahkan ini ke dalam JavaScript Anda yang akan mengalihkan ke halaman utama
        // Setelah waktu tertentu (misalnya, 2 detik)
        setTimeout(function() {
            window.location.href = '/customer'; // Alihkan ke halaman utama
        }, 2000); // Ubah angka ini sesuai dengan waktu tampilan splash screen
    </script>
</body>

</html>