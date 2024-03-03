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
    <link rel="stylesheet" href="{{ asset('frontend/css/loginstyle.css') }}">

    <title>Hello, world!</title>
</head>

<body>
    <section class="vh-120 bg-image" style="background-image: url('https://i.pinimg.com/564x/7c/93/6d/7c936d335de4a8c149e9f87de39d94f5.jpg');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                                <form method="POST" action="{{ url('register') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-outline mb-1">
                                        <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="name" />
                                        <label class="form-label" for="form3Example1cg">Nama Lengkap</label>
                                    </div>

                                    <div class="form-outline mb-1">
                                        <select name="jenis_kelamin" id="jenis_kelamin" id="form3Example1cg" class="form-control form-control-lg" required>
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                            @error('jenis_kelamin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </select>
                                        <!-- <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="jenis_kelamins" /> -->
                                        <label class="form-label" for="form3Example1cg">Jenis Kelamin</label>
                                    </div>
                                    <div class="form-outline mb-1">
                                        <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email" />
                                        <label class="form-label" for="form3Example3cg">Your Email</label>
                                    </div>

                                    <div class="form-outline mb-1">
                                        <input type="status" id="form3Example3cg" class="form-control form-control-lg" name="status" />
                                        <label class="form-label" for="form3Example3cg">Status</label>
                                    </div>

                                    <div class="form-outline mb-1">
                                        <input type="phone" id="form3Example3cg" class="form-control form-control-lg" name="no_hp" />
                                        <label class="form-label" for="form3Example3cg">Your Phone Number</label>
                                    </div>
                                    <!-- daftar sebagai  -->
                                    <div class="form-outline mb-1">
                                        <select name="is_admin" id="is_admin" id="form3Example1cg" class="form-control form-control-lg" required>
                                            <option value="">-- Daftar Sebagai --</option>
                                            <option value="0">Customers</option>
                                            <option value="2">Terapis</option>
                                        </select>
                                        <label class="form-label" for="form3Example3cg" text-align="center">Daftar Sebagai</label>
                                    </div>

                                    <div class="form-outline mb-1">
                                        <input type="text" id="form3Example3cg" class="form-control form-control-lg" name="nik_ktp" />
                                        <label class="form-label" for="form3Example3cg">NIK</label>
                                    </div>
                                    <div class="form-outline mb-1">
                                        <input type="file" id="form3Example3cg" class="form-control form-control-lg" name="ktp" />
                                        <label class="form-label" for="form3Example3cg">Foto KTP</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="tempat" id="form3Example3cg" class="form-control form-control-lg" name="tempat_lahir" />
                                        <label class="form-label" for="form3Example3cg">Tempat Lahir</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="date" id="form3Example3cg" class="form-control form-control-lg" name="tanggal_lahir" />
                                        <label class="form-label" for="form3Example3cg">Tanggal Lahir</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example3cg" class="form-control form-control-lg" name="alamat" />
                                        <label class="form-label" for="form3Example3cg">Alamat</label>
                                    </div>


                                    <div class="form-outline mb-1">
                                        <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password" />
                                        <label class="form-label" for="form3Example4cg">Password</label>
                                    </div>
                                    <!-- password_confirmation -->
                                    <div class="form-outline mb-1">
                                        <input type="password" id="form3Example4cdg" class="form-control form-control-lg" name="password_confirmation" />
                                        <label class="form-label" for="form3Example4cdg">Konfirmasi password</label>
                                    </div>
                                    <!-- //foto  -->
                                    <div class="form-outline mb-1">
                                        <input type="file" id="form3Example2cdg" class="form-control form-control-lg" name="foto" />
                                        <label class="form-label" for="form3Example4cdg">Foto</label>
                                        <!-- Sija -->
                                    </div>

                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                                        <label class="form-check-label" for="form2Example3g">
                                            I agree all statements in <a href="#!" class="text-body"><u>Terms of
                                                    service</u></a>
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!" class="fw-bold text-body"><u>Login here</u></a></p>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>