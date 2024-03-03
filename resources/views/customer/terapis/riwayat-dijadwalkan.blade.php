<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>order baru</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('frontend/terapist/css/riwayat-dijadwalkan.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">

</head>
<body>
    <div class="container">
        <div class="topbar">
            <a href="http://127.0.0.1:8000/terapis/beranda/notifikasi-order">
                <img src="{{ asset('frontend/terapist/img/back.png') }}" alt="">

            </a>
            <div class="head">
                <h4>Pekerjaan</h4>
            </div>
        </div>

        <div class="content">
            <div class="tab">
                <a href="javascript:void(0)" onclick="order(event, 'dijadwalkan');">
                  <div class="tablink bottombar">dijadwalkan</div>
                </a>
                <a href="javascript:void(0)" onclick="order(event, 'selesai');">
                  <div class="tablink bottombar">selesai</div>
                </a>
                <a href="javascript:void(0)" onclick="order(event, 'tolak');">
                  <div class="tablink bottombar">tolak</div>
                </a>
            </div>

            <div id="dijadwalkan" class=" order" style="display:none">
                <a href="http://127.0.0.1:8000/terapis/riwayat-detailorder">
                    <div class="card">
                        <div class="paket">
                            <p id="namapaket">Paket deep tissue + Kerokan</p>
                        </div>

                        <div class="alamat">
                            <p>Jl. Raya Janti, Gg. Arjuna No.59</p>
                        </div>

                        <div class="waktu">
                            <div class="tanggal"><p>12/03/2023/09:30 AM</p></div>
                            <div class="ID"><p>ID pemesanan AN85356</p></div>
                        </div>
                    </div>
                </a>

                <div class="card">
                    <div class="paket">
                        <p id="namapaket">Paket deep tissue + Kerokan</p>
                        {{-- <p id="statuspaket">Dijadwalkan</p> --}}
                    </div>

                    <div class="alamat">
                        <p>Jl. Raya Janti, Gg. Arjuna No.59</p>
                    </div>

                    <div class="waktu">
                        <div class="tanggal"><p>12/03/2023/10:30 AM</p></div>
                        <div class="ID"><p>ID pemesanan AN85356</p></div>
                    </div>
                </div>
            </div>

            <div id="selesai" class=" order" style="display:none">
                <div class="judul"><h4>tanggal</h4></div>
                <div class="kalender">
                    <input type="date" name="kalender" id="kalender">
                </div>
                <a href="">
                    <div class="card">
                        <div class="paket">
                            <p id="namapaket">Paket deep tissue + Kerokan</p>
                        </div>

                        <div class="alamat">
                            <p>Jl. Raya Janti, Gg. Arjuna No.59</p>
                        </div>

                        <div class="waktu">
                            <div class="tanggal"><p>12/03/2023/09:30 AM</p></div>
                            <div class="ID"><p>ID pemesanan AN85356</p></div>
                        </div>
                    </div>
                </a>

                <div class="card">
                    <div class="paket">
                        <p id="namapaket">Paket deep tissue + Kerokan</p>
                        {{-- <p id="statuspaket">Dijadwalkan</p> --}}
                    </div>

                    <div class="alamat">
                        <p>Jl. Raya Janti, Gg. Arjuna No.59</p>
                    </div>

                    <div class="waktu">
                        <div class="tanggal"><p>12/03/2023/10:30 AM</p></div>
                        <div class="ID"><p>ID pemesanan AN85356</p></div>
                    </div>
                </div>
            </div>

            <div id="tolak" class=" order" style="display:none">
                <h2>tolak</h2>
                <p>ccccccccccccccccccccccccccccccc</p>
            </div>
        </div>

        <div class="footer">
            <a href="http://127.0.0.1:8000/terapis/beranda-order">
                <img src="{{ asset('frontend/terapist/img/beranda.png') }}" alt="">
                <p>Beranda</p>
            </a>
            <a href="http://127.0.0.1:8000/terapis/riwayat-dijadwalkan">
                <img src="{{ asset('frontend/terapist/img/riwayat.png') }}" alt="">
                <p>Riwayat</p>
            </a>
            <a href="">
                <img src="{{ asset('frontend/terapist/img/pendapatan.png') }}" alt="">
                <p>Pendapatan</p>
            </a>
            <a href="http://127.0.0.1:8000/terapis/profile">
                <img src="{{ asset('frontend/terapist/img/akun.png') }}" alt="">
                <p>Akun</p>
            </a>
        </div>
    </div>
    <script>
        // ketika diklik fungsi order akan mengadakan event,"sesuai nama"
        function order(evt, orderName) {
          var i, x, tablinks;
          x = document.getElementsByClassName("order");   //inisiasi var X sesuai dengan kelas yang dipanggil (div)
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablink");
          for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" border-red", "");
          }
          document.getElementById(orderName).style.display = "block";
        //   evt.currentTarget.firstElementChild.className += " border-red";
        }
        </script>
</body>
</html>
