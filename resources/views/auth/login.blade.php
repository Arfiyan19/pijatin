<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- my style -->
    <link rel="stylesheet" href="{{ asset('frontend/css/loginstyle.css') }}">

    <title>Hello, world!</title>
</head>

<style>
    .card {
        width: 800px;
        height: 495px;
        padding: 25px 50px;
        align-items: center;
        gap: 30px;
        border-radius: 25px;
        background: #FFF;
        box-shadow: 0px 0px 50px 0px rgba(0, 0, 0, 0.10);
    }

    .card-body h2 {
        color: #626262;
        text-align: center;
        font-family: Poppins;
        font-size: 36px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        letter-spacing: -1.44px;
    }

    .card-body p {
        color: rgba(98, 98, 98, 0.50);
        text-align: center;
        font-family: Poppins;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .login-from input[type="email"],
    .login-from input[type="password"] {
        display: flex;
        padding: 13px 20px;
        align-items: flex-start;
        gap: 10px;
        align-self: stretch;
        border-radius: 5px;
        border: 1px solid rgba(48, 48, 48, 0.50);
    }

    .login-from {
        margin-top: 50px;
    }

    .button-login {
        width: 520px;
        padding: 10px 0px;
        gap: 10px;
        border-radius: 5px;
        background: #34CBAA;
        border: #34CBAA;
        color: #FFF;
        font-family: Poppins;
        font-size: 24px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }
</style>

<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <section>
        <div class="container">
            <div class="row justify-content-center align-items-center" style="height: 100vh;">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Selamat Datang, Super Admin</h2>
                        <p class="text-center">Silahkan masukkan email dan password Anda</p>
                        <form class="login-from" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control" id="email"
                                    placeholder="Masukkan email anda" name="email" required>
                            </div>
                            <div class="form-group mt-4">
                                <input type="password" class="form-control" id="password"
                                    placeholder="Masukkan password anda" name="password" required>
                            </div>
                            <button type="submit" class="button-login mt-4">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    @if (session('errorMessage'))
        <div class="alert alert-danger" hidden>
            {{ session('errorMessage') }}
        </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        var errorMessage = document.querySelector('.alert-danger').innerHTML;

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: errorMessage,
        });
    </script>
</body>

</html>
