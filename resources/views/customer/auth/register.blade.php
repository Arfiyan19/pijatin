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

        .invalid-feedback {
            color: #dc3545;
            /* Red color for error text */
            display: block;
            /* Display as a block element */
            font-size: 14px;
            /* Adjust the font size */
            margin-top: 5px;
            margin-left: 10px;
            /* Add some top margin for spacing */
        }

        .tagline-login h2 {
            padding-top: 70px;
            color: black;
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

        .form-select {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 100px;
            border-color: #56AB91;
        }

        .button-masuk {
            background-color: wheat;
            color: var(--primary-primary-005, #56AB91);
            text-align: center;
            font-family: Poppins;
            font-size: 12px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            letter-spacing: -0.48px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="login-container">
                <div class="login-header">
                    <div class="tagline-login text-center">
                        <img src="{{ asset('frontend/assets/image/logo-pijatin.png') }}" alt="" class="img-login mt-5">
                        <h3 class="my-4"><strong>Selamat bergabung</strong></h3>
                        <p>Masukan data diri Anda</p>
                    </div>
                </div>

                <!-- <form class="login-form" action="#" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="username">NIK KTP</label>
                        <input type="text" id="username" name="nik" class="form-control">
                        @if ($errors->has('nik'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('nik') }}</strong>
                        </span> @endif
                    </div>
                    <div class="form-group">
                        <label for="username">Nama</label>
                        <input type="text" id="username" name="name" class="form-control">
                        @if (isset($errors) && $errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="from-group">
                        <label for="">Jenis Kelamin</label>
                    </div>
                    <div class="form-check form-check-inline ms-3">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" required>
                        <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                    </div>
                    <div class="form-check form-check-inline ms-5">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" required>
                        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                    </div>
                    <div class="form-group">
                        <label for="username">Email</label>
                        <input type="text" id="username" name="email" class="form-control">
                        @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span> @endif
                    </div>
                    <div class="form-group">
                        <label for="username">No Telepon</label>
                        <input type="text" id="username" name="no_hp" class="form-control">
                        @if ($errors->has('no_hp'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('no_hp') }}</strong>
                        </span> @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input type="password" id="password" name="password" class="form-control">
                        @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Konfirmasi Kata Sandi</label>
                        <input type="password" id="password" name="password_confirmation" class="form-control">
                        @if ($errors->has('password_confirmation'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="text-center">
                        <button type="submit" class="button-primary mt-5">Daftar</button>
                    </div>
                    <p class="text-center my-4">Anda sudah punya Akun?</p>
                    <div class="form-group text-center">
                        <a href="#">Masuk</a>
                    </div>
                </form> -->

                @if ($data == 'customer')
                <!-- buatkan form dengan action daftar/{$data} -->
                <form action="{{ url('register/customer') }}" method="POST" class="login-form">
                    @csrf
                    <!-- nik ktp  -->
                    <div class="form-group">
                        <label for="username">NIK KTP</label>
                        <input type="text" id="username" name="nik" class="form-control" placeholder="masukan nik ktp">
                        @if ($errors->has('nik'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('nik') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="username">Nama</label>
                        <input type="text" id="username" name="name" class="form-control" placeholder="masukan nama">
                        @if (isset($errors) && $errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <!-- //jenis_kelamin  -->
                    <div class="from-group">
                        <label for="">Jenis Kelamin</label>
                    </div>
                    <div class="form-check form-check-inline ms-3">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Laki-Laki">
                        <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                    </div>
                    <div class="form-check form-check-inline ms-5">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="Perempuan">
                        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                    </div>
                    <!-- //eror  -->
                    @if ($errors->has('jenis_kelamin'))
                    <span class="invalid-feedback" style="margin-bottom: 20px;">
                        <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                    </span>
                    @endif
                    <!-- //email  -->
                    <div class="form-group">
                        <label for="username">Email</label>
                        <input type="text" id="username" name="email" class="form-control" placeholder="masukan alamat email anda">
                        @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <!-- notelepon  -->
                    <div class="form-group">
                        <label for="username">No Telepon</label>
                        <input type="text" id="username" name="no_hp" class="form-control" placeholder="masukan nomor wa/telepon">
                        @if ($errors->has('no_hp'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('no_hp') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="masukan kata sandi anda">
                        @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Konfirmasi Kata Sandi</label>
                        <input type="password" id="password" name="password_confirmation" placeholder="masukan konfirmasi password anda" class="form-control">
                        @if ($errors->has('password_confirmation'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="text-center">
                        <button type="submit" class="button-primary mt-5">Daftar</button>
                    </div>
                    <p class="text-center my-4">Anda sudah punya Akun?</p>
                    <div class="form-group text-center">
                        <button type="button" class="masuk"> Masuk</button>
                    </div>
                </form>
                @elseif($data == 'terapis')
                <form action="{{ url('daftar/terapis') }}" method="POST" class="login-form">
                    @csrf
                    <!-- nik ktp  -->
                    <div class="form-group">
                        <label for="username">NIK KTP</label>
                        <input type="text" id="username" name="nik" class="form-control" placeholder="masukan nik ktp">
                        @if ($errors->has('nik'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('nik') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="username">Nama</label>
                        <input type="text" id="username" name="name" class="form-control" placeholder="masukan nama">
                        @if (isset($errors) && $errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <!-- //jenis_kelamin  -->
                    <div class="from-group">
                        <label for="">Jenis Kelamin</label>
                    </div>
                    <div class="form-check form-check-inline ms-3">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Laki-Laki">
                        <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                    </div>
                    <div class="form-check form-check-inline ms-5">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="Perempuan">
                        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                    </div>
                    <!-- //eror  -->
                    @if ($errors->has('jenis_kelamin'))
                    <span class="invalid-feedback" style="margin-bottom: 20px;">
                        <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                    </span>
                    @endif
                    <!-- email  -->
                    <div class="form-group">
                        <label for="username">Email</label>
                        <input type="text" id="username" name="email" class="form-control" placeholder="masukan alamat email anda">
                        @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <!-- no_telepon  -->
                    <div class="form-group">
                        <label for="username">No Telepon</label>
                        <input type="text" id="username" name="no_hp" class="form-control" placeholder="masukan nomor wa/telepon">
                        @if ($errors->has('no_hp'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('no_hp') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="masukan kata sandi anda">
                        @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Konfirmasi Kata Sandi</label>
                        <input type="password" id="password" name="password_confirmation" placeholder="masukan konfirmasi password anda" class="form-control">
                        @if ($errors->has('password_confirmation'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="text-center">
                        <button type="submit" class="button-primary mt-5">Daftar</button>
                    </div>
                    <p class="text-center my-4">Anda sudah punya Akun?</p>
                    <div class="form-group text-center">
                        <a href="{{ route('terapis.login') }}">Masuk</a>
                    </div>
                </form>
                @endif

            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script>
        //masuk
        $('.masuk').click(function() {
            window.location.href = "{{ url('customers/login') }}";
        });

        // /terapis
        $('.masuk-terapis').click(function() {
            window.location.href = "{{ url('customers/login') }}";
        });
    </script>
</body>
</body>



</html>