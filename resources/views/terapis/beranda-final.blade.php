<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beranda terapis</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href=" {{ asset('frontend/terapist/css/home-fase2.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
    <!-- ======= link lib. icon ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- //cdn jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="topbar">
            <div class="logo"><img src="{{ asset('frontend/assets/image/logo-70.png') }} " alt=""></div>
            @if (auth()->check() == 0)
            <div class="logokanan">
                <a href="http://127.0.0.1:8000/terapis/profile">
                    <div class="user">
                        <img src="{{ asset('frontend/terapist/img/ppcustomer2.png') }}" alt="">
                    </div>
                </a>
                <a href="http://127.0.0.1:8000/terapis/beranda/notifikasi">
                    <div class="lonceng">
                        <img src="{{ asset('frontend/terapist/img/lonceng.png') }}" alt="">
                    </div>

                </a>
            </div>
            @elseif(auth()->check() == 1)
            <div class="logokanan">
                <a href="{{ route('terapis-profile.index') }}">
                    <div class="user">
                        <img src="{{ asset('frontend/terapist/img/ppcustomer2.png') }}" alt="">
                    </div>
                </a>
                <a href="{{ url('terapis/notifikasi') }}">
                    <div class="lonceng">
                        <img src="{{ asset('frontend/terapist/img/lonceng.png') }}" alt="">
                    </div>

                </a>
            </div>
            @endif


            @if (session('success'))
            <div class="text-danger" id="success" hidden>{{ session('success') }}</div>
            @endif
        </div>
        <div class="saldotab">
            <div class="saldobox">
                @if (auth()->check() == true)
                <div class="baris1">
                    <p>Aktifkan untuk menerima pesanan</p>
                    <div class="toggle">
                        <label class="switch">
                            <input type="checkbox" id="statusSwitch">
                            <span class="slider round"></span>
                            <span id="statusSwitchText" hidden>{{ $data['status'] == 'active' ? 'active' : 'inactive' }}</span>
                        </label>
                    </div>
                </div>
                @elseif(auth()->check() == false)
                <div class="baris1">
                    <p>Aktifkan untuk menerima pesanan</p>
                    <div class="toggle">
                        <label class="switch">
                            <input type="checkbox" id="statusSwitch">
                            <span class="slider round"></span>
                            <span id="statusSwitchText" hidden>12.00000</span>
                        </label>
                    </div>
                </div>
                @endif
                <div class="baris2">
                    <!-- <p>saldo: </p> -->
                    <!-- //logo dompet  -->
                    <div class="logo-dompet">
                        <img src="{{ asset('frontend/terapist/img/dompet.png') }}" alt="">
                    </div>
                    @if (auth()->check() == false)
                    <div class="saldo"> Rp-</div>
                    @elseif(auth()->check() == true)
                    <div class="saldo">{{ "Rp. " . number_format($total, 2, ',', '.') }}</div>
                    @endif
                </div>
                <div class="menu-pendapatan">
                    <!-- <div class="menu-box">
                        <a href="javascript:void(0)" onclick="mytopup()" class="topup">
                            <div class="menu-image">
                                <img src="{{ asset('frontend/terapist/img/add.png') }}" alt="">
                            </div>
                            <div class="menu-text">
                                Isi saldo
                            </div>
                        </a>
                    </div> -->
                    <!-- <div class="menu-box">
                        <a href="javascript:void(0)" onclick="tariksaldo()">
                            <div class="menu-image">
                                <img src="{{ asset('frontend/terapist/img/group.png') }}" alt="">
                            </div>
                            <div class="menu-text">
                                Tarik Saldo
                            </div>
                        </a>
                    </div> -->
                    <!-- <div class="menu-box">
                        <a href="javascript:void(0)" onclick="lainnya()">
                            <div class="menu-image">
                                <img src="{{ asset('frontend/terapist/img/lainnya.png') }}" alt="">
                            </div>
                            <div class="menu-text">
                                Lainnya
                            </div>
                        </a>
                    </div> -->
                </div>


            </div>
        </div>

        <div class="peringatan"></div>

        <div class="pesanan">
            <div class="head">
                <p>Pesanan hari ini</p>
            </div>
            <div class="content">
                <a href="http://127.0.0.1:8000/terapis/riwayat-detailorder">
                    <div class="card">
                        <div class="paket">
                            <div class="namapaket">Paket deep tissue + Kerokan</div>
                            <div class="status">Dijadwalkan</div>
                        </div>

                        <div class="alamat">
                            <p>Jl. Raya Janti, Gg. Arjuna No.59</p>
                        </div>

                        <div class="waktu">
                            <div class="tanggal">
                                <p>12/03/2023/09:30 AM</p>
                            </div>
                            <div class="ID">
                                <p>ID pemesanan AN85356</p>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
        </div>
        @if (auth()->check() == 0)
        <div class="footer">
            <a href="{{ url('terapis/beranda-order') }}">
                <img src="{{ asset('frontend/terapist/img/beranda-on.png') }}" alt="">
                <p>Beranda</p>
            </a>
            <a href="{{ url('terapis/riwayat-dijadwalkan') }}">
                <img src="{{ asset('frontend/terapist/img/riwayat.png') }}" alt="">
                <p>Riwayat</p>
            </a>
            <a href="{{ url('terapis/pendapatan') }}">
                <img src="{{ asset('frontend/terapist/img/pendapatan.png') }}" alt="">
                <p>Pendapatan</p>
            </a>
            <a href="{{ url('terapis/profile') }}">
                <img src="{{ asset('frontend/terapist/img/akun.png') }}" alt="">
                <p>Akun</p>
            </a>
        </div>
        @elseif(auth()->check() == 1)
        <div class="footer">
            <a href="{{ route('terapis.dashboard') }}" class="{{ request()->is('terapis/home') ? 'active' : '' }}">
                <img src="{{ asset('frontend/terapist/img/beranda-on.png') }}" alt="">
                <p>Beranda</p>
            </a>
            </style>
            <a href="{{ route('terapis.riwayat') }}" class="{{ request()->is('terapis/riwayat') ? 'active' : '' }}">
                <img src="{{ asset('frontend/terapist/img/riwayat.png') }}" alt="">
                <p>Riwayat</p>
            </a>
            <!-- <a href="{{ route('terapis.pendapatan') }}" class="{{ request()->is('terapis/terapis-pemesanan') ? 'active' : '' }}">
                <img src="{{ asset('frontend/terapist/img/pendapatan.png') }}" alt="">
                <p>Pesanan</p>
            </a> -->
            <a href="{{ route('terapis.pemesanan') }}" class="{{ request()->is('terapis/terapis-pemesanan') ? 'active' : '' }}">
                <img src="{{ asset('frontend/terapist/img/pendapatan.png') }}" alt="">
                <p>Pesanan</p>
            </a>
            <a href="{{ route('terapis-profile.index') }}" class="{{ request()->is('terapis/profile') ? 'active' : '' }}">
                <img src="{{ asset('frontend/terapist/img/akun.png') }}" alt="">
                <p>Akun</p>
            </a>
        </div>
        @endif

    </div>

</body>

</html>

<script>
    $(document).ready(function() {
        var success = document.getElementById('success').innerHTML;
        displaySuccessMessage(success);
    });

    function displaySuccessMessage(message) {
        toastr.success(message, 'Success', {
            timeOut: 3000
        });
    }
    //function topup topup-form
    function mytopup() {
        //redirect terapis.pendapatan
        window.location.href = "{{ route('terapis.topup') }}";
    }

    function tariksaldo() {
        var x = document.getElementById("tariksaldo-form");
        alert("Anda harus login terlebih dahulu");
    }
    // lainnya
    function lainnya() {
        var x = document.getElementById("lainnya-form");
        alert("Anda harus login terlebih dahulu");
    }


    // slider round
    $(document).ready(function() {
        // Ambil elemen switch
        var statusSelected = $('#statusSwitchText').text().toLowerCase();
        //select switch
        var statusSwitch = document.getElementById("statusSwitch");
        //cek status
        if (statusSelected == "active") {
            statusSwitch.checked = true;
        } else {
            statusSwitch.checked = false;
        }
        //ajax






        //ajax post
        statusSwitch.addEventListener("change", function() {
            var newStatus = statusSwitch.checked ? "active" : "inactive";
            var token = '{{ csrf_token() }}';
            // Kirim permintaan POST untuk memperbarui status
            $.ajax({
                url: '/terapis/home/update-status',
                method: 'POST',
                data: {
                    status: newStatus,
                    _token: token
                },
                success: function(response) {
                    //toasr reload web
                    toastr.success(response.success, 'Success', {
                        timeOut: 3000
                    });
                },
                error: function(error) {
                    // Handle error, if any
                    console.error(error);
                }
            });
        });
    });
</script>