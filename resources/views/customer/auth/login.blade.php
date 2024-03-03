<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pijat.in</title>
    <!-- Memasukkan file CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Logo title bar -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-pijatin.png') }}">

    <style>
        body {
            background-color: #f8f9fa;

        }

        .login-header {
            text-align: center;
        }

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

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 100px;
            border-color: #56AB91;
        }

        .login-form button {
            width: 70%;
            padding: 10px;
            background-color: #56AB91;
            color: white;
            border: none;
            border-radius: 16px;
        }

        .half-circle {
            height: 190px;
            background-color: #036666;
            border-radius: 0 0 600px 600px;
        }

        .tagline-login h2 {
            font-size: 16px;
            padding-top: 70px;
            color: white;
        }

        .img-login {
            margin-top: 30px;
            width: 40px;
            height: 20px;
        }

        .login-form a {
            text-decoration: none;
            color: #56AB91;
        }

        /* CSS untuk tata letak SweetAlert versi mobile */
        .mobile-swal-container {
            width: 100%;
        }

        .mobile-swal-popup {
            width: 80%;
            max-width: 300px;
            /* Sesuaikan lebar maksimum sesuai kebutuhan */
            margin: 20px auto;
        }

        .mobile-swal-title {
            font-size: 18px;
        }

        .mobile-swal-button {
            width: 100%;
        }
    </style>
</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- //cdn jquery -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<body>
    <div class="container">
        <div class="row">
            <div class="login-container">
                <div class="login-header">
                    <div class="half-circle ">
                        <div class="tagline-login text-center">
                            <h2>Selamat datang kembali! Silahkan login</h2>
                            <img src="{{ asset('frontend/assets/image/logo-reglog.png')}}" alt="" class="img-login">
                        </div>
                    </div>
                    @if (session('errorMessage'))
                    <div class="text-danger" id="dataeror" hidden>{{ session('errorMessage') }}</div>
                    @endif
                    <!-- success -->
                    @if (session('successMessage'))
                    <div class="text-success" id="datasuccess" hidden>{{ session('successMessage') }}</div>
                    @endif
                    <script>
                        $(document).ready(function() {
                            // dataeror
                            var dataeror = document.getElementById('dataeror').innerHTML;
                            $(document).ready(function() {
                                // dataeror
                                var dataeror = document.getElementById('dataeror').innerHTML;
                                toastr.error(dataeror, 'Error', {
                                    timeOut: 3000
                                })
                            })
                        })
                        $(document).ready(function() {
                            var dataSuccess = document.getElementById('datasuccess').innerHTML;
                            toastr.success(dataSuccess, 'Success', {
                                timeOut: 3000
                            })
                        })
                    </script>
                </div>
                <form class="login-form" method="POST" action="{{ route('customers.login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="username">Email/Username</label>
                        <input type="text" id="username" name="email" class="form-control">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input type="password" id="password" name="password" class="form-control">
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3 text-end">
                        <a href="lupa_password.html">Lupa Kata Sandi?</a>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="button-primary mt-4">Masuk</button>
                    </div>
                    <div class="text-center mt-5    ">
                        <span>Belom Punya Akun? <a href="">Masuk</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">

    </script>
</body>

</html>