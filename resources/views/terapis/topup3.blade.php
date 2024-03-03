<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Therapist || Isi Saldo </title>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href=" {{ asset('frontend/terapist/css/topup.css') }} ">
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
        <div class="topbar">
            <div class="backbtn">
                <a href="">
                    <i class="material-icons" style="font-size:36px">chevron_left</i>
                </a>
            </div>
            <!-- <h5>Rekening Therapist</h5> -->
            <p>Tanda Bukti</p>
        </div>
        @if(auth()->check() == false)
        <!-- baris pertama div frame title  -->
        <div class="frame-tanda-bukti-1">
            <p>Tanda bukti </p>
        </div>
        <!-- //frame tanda bukti isinya title beranda di tengah bawah kotak seperti image upload /picture ada teks dibawah nya upload foto bawah lagi teks keterangan format fto -->
        <div class="frame-tanda-bukti-2">
            <!-- Title -->
            <div class="frame-tanda-bukti-2-title">
                <p>Tambahkan Tanda Bukti</p>
            </div>
            <!-- Content -->
            <div class="frame-tanda-bukti-2-content" id="content">
                <!-- Centered Box -->
                <div class="center-box">
                    <!-- Image placeholder, replace with your image source -->
                    <img src="{{ asset('frontend/terapist/img/picture-img.png') }}" alt="">
                </div>

                <!-- Text Below the Center Box -->
                <div class="center-text">
                    Anda harus melampirkan foto dengan format
                    PNG/JPG/JPEG.
                </div>
            </div>
            <input type="file" id="imageInput" style="display: none;">
        </div>
        <!-- //frame-tanda bukti 3  isinya div dengan teks beraada ditengah/center dengan tulisan perhatian baris pertama baris bawahnya kata kata div isinya conytoh struk 3 image ditengah dan bawahnya list 1.2.3-->
        <div class="frame-tanda-bukti-3">
            <div class="frame-tanda-bukti-3-title">
                <div class="center-text">
                    <b>Perhatian</b>
                    <p>Kami harap anda melakukan pengiriman tanda bukti transaksi pada kami sebagai bukti pendukung</p>
                </div>
            </div>
            <!-- //contoj-struk  -->
            <div class="frame-tanda-bukti-3-contoh">
                <div class="left-text">
                    <b>Contoh Struk</b>
                </div>
            </div>
        </div>
        <!-- //frame tanda bukti 4  -->
        <div class="frame-tanda-bukti-4">
            <div class="frame-tanda-bukti-4-kotak">
                <div class="frame-tanda-bukti-4-kotak1">
                    <img src="{{ asset('frontend/terapist/img/bukti-tf1.png') }}" alt="">
                </div>
                <div class="frame-tanda-bukti-4-kotak2">
                    <img src="{{ asset('frontend/terapist/img/bukti-tf2.png') }}" alt="">
                </div>
            </div>
            <!-- Frame for List/Keterangan -->
            <div class="frame-tanda-bukti-4-list">
                <ul>
                    <li>Perhatikan kualitas cahaya foto yang anda unggah</li>
                    <li>Perhatikan kualitas foto jangan blur</li>
                    <li>Pastikan nominal sesuai dengan pembayaran anda agar segera kami proses</li>
                </ul>
            </div>
        </div>


        <div class="submit">
            <a href="">
                <button class="button-rekening" type="submit">Selanjutnya</button>
            </a>
        </div>

        @elseif(auth()->check() == true)
        <!-- baris pertama div frame title  -->
        <div class="frame-tanda-bukti-1">
            <p>Tanda bukti </p>
        </div>
        <!-- //frame tanda bukti isinya title beranda di tengah bawah kotak seperti image upload /picture ada teks dibawah nya upload foto bawah lagi teks keterangan format fto -->
        <div class="frame-tanda-bukti-2">
            <!-- Title -->
            <div class="frame-tanda-bukti-2-title">
                <p>Tambahkan Tanda Bukti</p>
            </div>
            <!-- Content -->
            <div class="frame-tanda-bukti-2-content" id="content">
                <!-- Centered Box -->
                <div class="center-box">
                    <!-- Image placeholder, replace with your image source -->
                    <img src="{{ asset('frontend/terapist/img/picture-img.png') }}" alt="">
                </div>

                <!-- Text Below the Center Box -->
                <div class="center-text">
                    Anda harus melampirkan foto dengan format
                    PNG/JPG/JPEG.
                </div>
            </div>
            <input type="file" id="imageInput" style="display: none;">
        </div>
        <!-- //frame-tanda bukti 3  isinya div dengan teks beraada ditengah/center dengan tulisan perhatian baris pertama baris bawahnya kata kata div isinya conytoh struk 3 image ditengah dan bawahnya list 1.2.3-->
        <div class="frame-tanda-bukti-3">
            <div class="frame-tanda-bukti-3-title">
                <div class="center-text">
                    <b>Perhatian</b>
                    <p>Kami harap anda melakukan pengiriman tanda bukti transaksi pada kami sebagai bukti pendukung</p>
                </div>
            </div>
            <!-- //contoj-struk  -->
            <div class="frame-tanda-bukti-3-contoh">
                <div class="left-text">
                    <b>Contoh Struk</b>
                </div>
            </div>
        </div>
        <!-- //frame tanda bukti 4  -->
        <div class="frame-tanda-bukti-4">
            <div class="frame-tanda-bukti-4-kotak">
                <div class="frame-tanda-bukti-4-kotak1">
                    <img src="{{ asset('frontend/terapist/img/bukti-tf1.png') }}" alt="">
                </div>
                <div class="frame-tanda-bukti-4-kotak2">
                    <img src="{{ asset('frontend/terapist/img/bukti-tf2.png') }}" alt="">
                </div>
            </div>
            <!-- Frame for List/Keterangan -->
            <div class="frame-tanda-bukti-4-list">
                <ul>
                    <li>Perhatikan kualitas cahaya foto yang anda unggah</li>
                    <li>Perhatikan kualitas foto jangan blur</li>
                    <li>Pastikan nominal sesuai dengan pembayaran anda agar segera kami proses</li>
                </ul>
            </div>
        </div>
        <input type="hidden" name="nama_bank" id="nama_bank" value="{{ $nama_bank }}">
        <div class="submitTopup3">
            <a href="">
                <button class="button-rekening" type="submit">Selanjutnya</button>
            </a>
        </div>
        @endif

        @if(auth()->check() == false)
        <div class="footer-topup3">
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
        <div class="footer-topup3">
            <a href="{{ route('terapis.dashboard') }}" class="{{ request()->is('terapis/beranda') ? 'active' : '' }}">
                <img src="{{ asset('frontend/terapist/img/beranda.png') }}" alt="">
                <p>Beranda</p>
            </a>
            <a href="{{ route('terapis.riwayat') }}" class="{{ request()->is('terapis/riwayat') ? 'active' : '' }}">
                <img src="{{ asset('frontend/terapist/img/riwayat.png') }}" alt="">
                <p>Riwayat</p>
            </a>
            <a href="{{ route('terapis.pendapatan') }}" class="{{ request()->is('terapis/terapis-pendapatan') ? 'active' : '' }}">
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
    <!-- //splash screen  -->
    <div class="splash-screen" id="splashScreen">
        <div class="splash-text">Pengisian saldo sedang diproses</div>
        <img class="splash-logo" src="{{ asset('frontend/terapist/img/logo-loading.png') }}" alt="">
        <div class="loading-dots">
            <div class="loading-dot"></div>
            <div class="loading-dot"></div>
            <div class="loading-dot"></div>
        </div>
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
    //upload image 
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("content").addEventListener("click", function() {
            // Trigger the hidden file input
            document.getElementById("imageInput").click();
        });

        document.getElementById("imageInput").addEventListener("change", function(event) {
            // Handle the file selection
            handleFileUpload(event.target.files[0]);
        });
    });

    function handleFileUpload(file) {
        if (file) {
            // Create a FileReader
            var reader = new FileReader();

            // Set the onload function to display the uploaded image
            reader.onload = function(e) {
                // setting width and height
                //buat image

                var image = new Image();
                image.src = e.target.result;
                //timpa content
                document.getElementById("content").innerHTML = "";
                //append image
                document.getElementById("content").appendChild(image);
                //style
                image.style.width = "50%";
                image.style.paddingTop = "20px";
                //bawah nya tulisan
                var text = document.createElement("div");
                text.innerHTML = "Anda harus melampirkan foto dengan format PNG/JPG/JPEG.";
                //tambahkan style font size 12 color #AABBCBBC center
                text.style.fontSize = "14px";
                text.style.color = "#AABBCBBC";
                text.style.textAlign = "center";
                //append text
                document.getElementById("content").appendChild(text);
                // frame-tanda-bukti-2-title
                document.getElementById("content").style.padding = "0px";
                document.getElementById("content").style.margin = "0px";
                document.getElementById("content").style.marginTop = "10px";
                document.getElementById("content").style.marginBottom = "10px";
                document.getElementById("content").style.display = "flex";
                //size dipanjaang

            };

            // Read the selected file as a data URL
            reader.readAsDataURL(file);
        }
    }

    ///splash screeen
    // Add this function to display the splash screen
    function showSplashScreen() {
        document.getElementById('splashScreen').style.display = 'flex';
    }
    // Example: Call this function when the "Selanjutnya" button is clicked
    document.querySelector('.submitTopup3 button').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah perilaku default
        //jika img kosong maka notifikasi toasr upload img file
        if (document.getElementById("imageInput").files.length == 0) {
            toastr.error('Upload foto terlebih dahulu', 'Error');
        } else {
            //jika img tidak kosong maka splash screen dan ajak post img
            var imgForm = document.getElementById("imageInput").files[0];

            showSplashScreen();

            // Simulasi penundaan (Anda dapat menggantinya dengan logika pengambilan gambar aktual)
            setTimeout(function() {
                // Buat objek FormData untuk mengirim gambar
                var token = '{{ csrf_token() }}';
                var formData = new FormData();
                var nama_bank = document.getElementById("nama_bank").value;
                formData.append('image', imgForm);

                $.ajax({
                    url: '{{ url("terapis/terapis-pendapatan/topup") }}/' + nama_bank + '/upload',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    success: function(response) {
                        // Handle success response
                        //             return response()->json([
                        //     'success' => true,
                        //     'message' => 'Berhasil upload bukti transfer',
                        //     'data' => $deposit,
                        // ], 200);

                        hideSplashScreen();
                        toastr.success(response.message, 'Success');

                        // toastr.success('Gambar berhasil diunggah', 'Success');
                    },
                    error: function(error) {
                        // Handle error response
                        hideSplashScreen();
                        toastr.error('Gagal mengunggah gambar', 'Error');
                    }
                });
            }, 3000);
        }
        // showSplashScreen();

        // Simulate a delay (you can replace this with actual loading logic)
        // setTimeout(function() {
        //     // Redirect to the next page or perform other actions
        //     window.location.href = "{{ url('terapis/topup') }}";
        // }, 5000);
    });

    function hideSplashScreen() {
        document.getElementById('splashScreen').style.display = 'none';
    }
</script>       