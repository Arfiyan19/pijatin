<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Therapist</title>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href=" {{ asset('frontend/terapist/css/profile-therapist.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
    <!-- ======= link lib. icon ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- //import cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- //cdn jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


</head>

<body>
    <div class="container">
        <div class="header">
            <div class="backbtn">
                <a href="">
                    <i class="material-icons" style="font-size:36px;color: aliceblue;">chevron_left</i>
                </a>
            </div>
            <!-- //sessios  -->
            @if (session('success'))
            <div class="text-success" id="success" hidden>{{ session('success') }}</div>
            @endif
            <!-- //end sessios  -->
            <!-- front end  -->
            @if (auth()->check() == false)
            <div class="preview">
                <div class="foto">
                    <img src="{{ asset('frontend/terapist/img/ppcustomer2.png') }}" alt="">
                    <span><img id="verified" src="{{ asset('frontend/terapist/img/verified.png') }}" alt=""></span>
                </div>
                <div class="bio">
                    <div class="idbox">
                        <p>ID therapist: </p>
                        <div class="id">1100231</div>
                    </div>

                    <h4 id="nama">Mira Setyawati</h4>
                </div>
                <div class="rating">
                    <p>XXX</p>
                </div>
            </div>
            <!-- //backend -->
            @elseif(auth()->check() == true)
            <div class="preview">
                <div class="foto">
                    <img src="{{ asset('storage/foto/' . $data->foto) }}" onclick="myFunction()" style="border-radius: 50%; width: 100px; height: 100px; object-fit: cover;">
                    <span><img id="verified" src="{{ asset('frontend/terapist/img/verified.png') }}" alt=""></span>
                </div>
                <div class="bio">
                    <div class="idbox">
                        <p>ID : </p>
                        <div class="id">Trp-{{ $data->created_at->format('ymd') }}{{ $data->id }}</div>
                    </div>

                    <h4 id="nama">{{ $data->nama }}</h4>
                </div>
                <div class="rating">
                    <p>XXX</p>
                </div>
            </div>
            @endif
        </div>
        @if (auth()->check() == false)
        <div class="content">
            <a href="{{ url('terapis/edit-profile') }}">
                <div class="menu">
                    <img src="{{ asset('frontend/terapist/img/profile_user.png') }}" alt="">
                    <label for="Editprofile">Edit profile</label>
                    <i class="material-icons">chevron_right</i>
                </div>
            </a>
            <a href="{{ url('terapis/profile-alamatbaru') }}">
                <div class=" menu">
                    <img src="{{ asset('frontend/terapist/img/profile_lokasi.png') }}" alt="">
                    <label for="lokasi">Lokasi</label>
                    <i class="material-icons">chevron_right</i>
                </div>
            </a>

            <a href="{{ url('terapis/profile-rekening') }}">
                <div class="menu">
                    <img src="{{ asset('frontend/terapist/img/profile_rekening.png') }}" alt="">
                    <label for="lokasi">Rekening Therapist</label>
                    <img id="alert" src="{{ asset('frontend/terapist/img/profile_alert.png') }}" alt="">
                    <i class="material-icons">chevron_right</i>
                </div>
            </a>

            <a href="{{ url('terapis/profile-pengaturan') }}">
                <div class="menu">
                    <img src="{{ asset('frontend/terapist/img/profile_pengaturan.png') }}" alt="">
                    <label for="pengaturan">Pengaturan</label>
                    <i class="material-icons">chevron_right</i>
                </div>
            </a>
        </div>
        @elseif(auth()->check() == true)
        <div class="content">
            <a href="{{ route('terapis-profile.edit', $data->user_id) }}">
                <div class="menu">
                    <img src="{{ asset('frontend/terapist/img/profile_user.png') }}" alt="">
                    <label for="Editprofile">Edit profile</label>
                    <i class="material-icons">chevron_right</i>
                </div>
            </a>
            <a href="{{ route('terapis.alamat', $data->user_id) }}">
                <div class="menu">
                    <img src="{{ asset('frontend/terapist/img/profile_lokasi.png') }}" alt="">
                    <label for="lokasi">Lokasi</label>
                    <i class="material-icons">chevron_right</i>
                </div>
            </a>
            <a href="{{ route('terapis.rekening', $data->user_id) }}">
                <div class="menu">
                    <img src="{{ asset('frontend/terapist/img/profile_rekening.png') }}" alt="">
                    <label for="lokasi">Rekening Therapist</label>
                    <img id="alert" src="{{ asset('frontend/terapist/img/profile_alert.png') }}" alt="">
                    <i class="material-icons">chevron_right</i>
                </div>
            </a>

            <a href="{{ route('terapis.pengaturan', $data->user_id) }}">
                <div class="menu">
                    <img src="{{ asset('frontend/terapist/img/profile_pengaturan.png') }}" alt="">
                    <label for="pengaturan">Pengaturan</label>
                    <i class="material-icons">chevron_right</i>
                </div>
            </a>
        </div>
        @endif

        @if (auth()->check() == false)
        <div class="footer">
            <a href="{{ url('terapis/beranda-order') }}">
                <img src="{{ asset('frontend/terapist/img/beranda.png') }}" alt="">
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
                <img src="{{ asset('frontend/terapist/img/akun-on.png') }}" alt="">
                <p>Akun</p>
            </a>
        </div>
        @elseif(auth()->check() == true)
        <div class="footer">
            <a href="{{ route('terapis.dashboard') }}" class="{{ request()->is('terapis/beranda') ? 'active' : '' }}">
                <img src="{{ asset('frontend/terapist/img/beranda.png') }}" alt="">
                <p>Beranda</p>
            </a>
            <a href="{{ route('terapis.riwayat') }}" class="{{ request()->is('terapis/riwayat') ? 'active' : '' }}">
                <img src="{{ asset('frontend/terapist/img/riwayat.png') }}" alt="">
                <p>Riwayat</p>
            </a>
            <a href="{{ route('terapis.pendapatan') }}" class="{{ request()->is('terapis/pendapatan') ? 'active' : '' }}">
                <img src="{{ asset('frontend/terapist/img/pendapatan.png') }}" alt="">
                <p>Pendapatan</p>
            </a>
            <a href="{{ route('terapis-profile.index') }}" class="{{ request()->is('terapis/terapis-profile') ? 'active' : '' }}">
                <img src="{{ asset('frontend/terapist/img/akun-on.png') }}" alt="">
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
        toastr.success(message, 'Success');
    }

    function myFunction() {
        //buatkan upload image 
        var x = document.createElement("INPUT");
        x.setAttribute("type", "file");
        x.setAttribute("accept", "image/*");
        x.setAttribute("name", "foto");
        document.body.appendChild(x);
        x.click();
        // ajax 
        $(document).ready(function() {
            $('input[type="file"]').change(function(e) {
                var formData = new FormData();
                formData.append("foto", e.target.files[0]);
                formData.append("_token", "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('terapis.updateFoto', $data->user_id) }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        var message = response.success;
                        if (message == true) {
                            toastr.success('Foto berhasil diperbarui', 'Success');
                            // window location reload // 500 detik
                            setTimeout(function() {
                                window.location.reload();
                            }, 500);
                        } else {
                            //buatkan foto gagal diperbarui
                            toastr.error('Foto gagal diperbarui', 'Error');

                        }
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            });
        });
    }
</script>