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
    <link rel="stylesheet" href="{{ asset('frontend/css/verifikasi.css') }}">

    <!-- logo tittle bar -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }}">

    <title>Pijat.in</title>
</head>

<style>
    .login-form {
        padding: 20px;
        margin-top: 20px;
        color: #000;
        font-family: Poppins;
        font-size: 14px;
    }

    .login-form .form-group {
        margin-bottom: 20px;
    }

    .login-form label {
        margin-bottom: 10px;
        margin-left: 10px;
    }

    .login-form input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 2px solid #ddd;
        border-radius: 100px;
        border-color: #56AB91;
    }

    .text-center button {
        margin-top: 32px;
        border-radius: 20px;
        background: var(--primary-primary-006, #56ab91);
        width: 145px;
        height: 35px;
        justify-content: center;
        align-items: center;
        color: white;
        border: none;
    }

    .pin-input {
        border-radius: 10px;
        border: 1px solid var(--primary-primary-005, #56ab91);
        background: var(--neu-2-neu-2009, #fff);
        width: 45px;
        height: 45px;
        color: #000;
        text-align: center;

        /* paragraph/18px paragraph */
        font-family: Poppins;
        font-size: 1px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        letter-spacing: -0.72px;
    }
</style>

<body>
    <section>
        <div class="container">
            <div class="row">
                <h6 class="text-center mt-5">Masukan password baru <br> kamu
                    dengan jumlah maksimal <br>
                    8 digit </h6>
            </div>
            <form class="login-form" method="POST" action="{{ route('customers.login') }}">
                @csrf
                <div class="form-group">
                    <label for="password">Masukan ulang kata sandi anda</label>
                    <input type="password" id="password" name="password" class="form-control">
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Masukan kata sandi baru</label>
                    <input type="password" id="password" name="password" class="form-control">
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>