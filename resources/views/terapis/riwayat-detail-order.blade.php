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
    <link rel="stylesheet" href="{{ asset('frontend/terapist/css/riwayat-detail.css') }}">

    <!-- logo tittle bar -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- //cdn jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Bootstrap dan Template Datepicker-->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('frontend/terapist/css/datepicker.css') }}">

    <title>Detail-Pesanan-Selesai</title>
</head>

<body>
    <div class="container">
        <div class="topbar">
            <div class="backbtn">
                <a href="">
                    <i class="material-icons" style="font-size:36px">chevron_left</i>
                </a>
            </div>
            <p>Riwayat Pekerjaan Selesai</p>
        </div>

        <nav class="navbar navbar-expand">
            <div class="navbar-nav">
                <a class="nav-link " href="#">Dijadwalkan</a>
                <a class="nav-link active" href="http://127.0.0.1:8000/terapis/riwayat-detailorder">Selesai</a>
                <a class="nav-link text-danger" href="http://127.0.0.1:8000/terapis/riwayat-orderditolak">Tolak</a>
            </div>
        </nav>

        <div class="card-tanggal bg-body-tertiary">
            <p>Tanggal</p>

            <div class="form-group">
                <img class="imgtgl" src="{{ asset('frontend/assets/image/vectortgl.png') }}" alt="">
                <input type="text" name="tanggal" class="form-control datepicker" required />
            </div>
        </div>

        <div class="group-selesai">
            <p>Selesai</p>
            <div class="status">
                <div class="judul-pesan">
                    <p>Paket deep Tisuue + Kerokan</p>
                </div>
                <div class="harga">
                    <p>100.000</p>
                </div>
            </div>
            <div class="status">
                <div class="judul-pesan">
                    <p class="deskripsi">ID Customer ANB5356</p>
                    <p class="deskripsi">08/03/2023/ 10:30 AM</p>
                </div>
                <div class="btn">
                    <button type="submit" class="btn-laporkan" onClick="myFunction()">Laporkan</button>
                </div>

            </div>
            <hr>
            <p>Selesai</p>
            <div class="status">
                <div class="judul-pesan">
                    <p>Paket deep Tisuue + Kerokan</p>
                </div>
                <div class="harga">
                    <p>100.000</p>
                </div>
            </div>
            <div class="status">
                <div class="judul-pesan">
                    <p class="deskripsi">ID Customer ANB5356</p>
                    <p class="deskripsi">08/03/2023/ 10:30 AM</p>
                </div>
                <div class="btn">
                    <button type="submit" class="btn-laporkan" onClick="myFunction()">Laporkan</button>
                </div>

            </div>
            <hr>
            <p>Selesai</p>
            <div class="status">
                <div class="judul-pesan">
                    <p>Paket deep Tisuue + Kerokan</p>
                </div>
                <div class="harga">
                    <p>100.000</p>
                </div>
            </div>
            <div class="status">
                <div class="judul-pesan">
                    <p class="deskripsi">ID Customer ANB5356</p>
                    <p class="deskripsi">08/03/2023/ 10:30 AM</p>
                </div>
                <div class="btn">
                    <button type="submit" class="btn-laporkan" onClick="myFunction()">Laporkan</button>
                </div>

            </div>
            <hr>
            <p>Selesai</p>
            <div class="status">
                <div class="judul-pesan">
                    <p>Paket deep Tisuue + Kerokan</p>
                </div>
                <div class="harga">
                    <p>100.000</p>
                </div>
            </div>
            <div class="status">
                <div class="judul-pesan">
                    <p class="deskripsi">ID Customer ANB5356</p>
                    <p class="deskripsi">08/03/2023/ 10:30 AM</p>
                </div>
                <div class="btn">
                    <button type="submit" class="btn-laporkan" onClick="myFunction()">Laporkan</button>
                </div>
            </div>
            <hr>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>

        @if(auth()->check() == false)
        <div class="footer">
            <div class="nav-menu">
                <a href="http://127.0.0.1:8000/terapis/beranda-order">
                    <img src="{{ asset('frontend/terapist/img/beranda.png') }}" alt="" width="25px">
                    <p>Beranda</p>
                </a>
                <a href="http://127.0.0.1:8000/terapis/riwayat-dijadwalkan">
                    <img src="{{ asset('frontend/terapist/img/riwayat-on.png') }}" alt="" width="25px">
                    <p>Riwayat</p>
                </a>
                <a href="">
                    <img src="{{ asset('frontend/terapist/img/pendapatan.png') }}" alt="" width="25px">
                    <p>Pendapatan</p>
                </a>
                <a href="http://127.0.0.1:8000/terapis/profile">
                    <img src="{{ asset('frontend/terapist/img/akun.png') }}" alt="" width="25px">
                    <p>Akun</p>
                </a>
            </div>
        </div>
        @elseif(auth()->check() == true)
        <div class="footer">
            <div class="nav-menu">
                <a href="http://127.0.0.1:8000/terapis/beranda-order">
                    <img src="{{ asset('frontend/terapist/img/beranda.png') }}" alt="" width="25px">
                    <p>Beranda</p>
                </a>
                <a href="http://127.0.0.1:8000/terapis/riwayat-dijadwalkan">
                    <img src="{{ asset('frontend/terapist/img/riwayat-on.png') }}" alt="" width="25px">
                    <p>Riwayat</p>
                </a>
                <a href="">
                    <img src="{{ asset('frontend/terapist/img/pendapatan.png') }}" alt="" width="25px">
                    <p>Pendapatan</p>
                </a>
                <a href="http://127.0.0.1:8000/terapis/profile">
                    <img src="{{ asset('frontend/terapist/img/akun.png') }}" alt="" width="25px">
                    <p>Akun</p>
                </a>
            </div>
        </div>
        @endif

    </div>

    <!-- Script Tanggal -->
    <script type="text/javascript">
        $(function() {
            $(".datepicker").datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true,
            });
        });
    </script>

    <!-- Script Function Button Laporkan -->
    <script>
        function myFunction() {
            window.location.href = "http://127.0.0.1:8000/terapis/riwayat-laporkan-customer";
        }
    </script>

</body>

</html>