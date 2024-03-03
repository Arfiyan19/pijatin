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
            <a href="{{ url('terapis/beranda/notifikasi-order') }}">
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
                <a href="{{ url('terapis/riwayat-detailorder') }}">
                    <div class="card">
                        <div class="paket">
                            <p id="namapaket">Paket deep tissue + Kerokan</p>
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

                <div class="card">
                    <div class="paket">
                        <p id="namapaket">Paket deep tissue + Kerokan</p>
                        {{-- <p id="statuspaket">Dijadwalkan</p> --}}
                    </div>

                    <div class="alamat">
                        <p>Jl. Raya Janti, Gg. Arjuna No.59</p>
                    </div>

                    <div class="waktu">
                        <div class="tanggal">
                            <p>12/03/2023/10:30 AM</p>
                        </div>
                        <div class="ID">
                            <p>ID pemesanan AN85356</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="selesai" class=" order" style="display:none">
                <div class="judul">
                    <h5>tanggal</h5>
                </div>
                <div class="kalender">
                    <input type="date" name="kalender" id="kalender">
                </div>

                <div class="card tabselesai">
                    <div class="headtab">
                        <p>Selesai</p>
                    </div>
                    <div class="paket">
                        <p id="namapaket">Paket deep tissue + Kerokan</p>
                        <div class="harga">
                            <p>150.000</p>
                        </div>
                    </div>

                    <div class="IDselesai">
                        <p>ID Pemesanan AN22333</p>
                        <div class="selesaibtn">
                            <button type="submit" id="laporkan" onclick="openpopup()">Laporkan</button>
                        </div>

                    </div>

                    <div class="waktu">
                        <div class="tanggal">
                            <p>12/03/2023/09:30 AM</p>
                        </div>
                    </div>
                </div>


            </div>

            <div id="tolak" class=" order" style="display:none">
                <div class="card">
                    <div class="paket">
                        <p id="namapaket">Paket deep tissue + Kerokan</p>
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
            </div>
        </div>
        @if (auth()->check() == 0)
        <div class="footer">
            <a href="{{ url('terapis/beranda-order') }}">
                <img src="{{ asset('frontend/terapist/img/beranda.png') }}" alt="">
                <p>Beranda</p>
            </a>
            <a href="{{ url('terapis/riwayat-dijadwalkan') }}">
                <img src="{{ asset('frontend/terapist/img/riwayat-on.png') }}" alt="">
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
            <a href="{{ route('terapis.dashboard') }}" class="{{ request()->is('terapis/beranda') ? 'active' : '' }}">
                <img src="{{ asset('frontend/terapist/img/beranda.png') }}" alt="">
                <p>Beranda</p>
            </a>
            <a href="{{ route('terapis.riwayat') }}" class="{{ request()->is('terapis/riwayat') ? 'active' : '' }}">
                <img id="img-riwayat" src="{{ asset('frontend/terapist/img/riwayat-on.png') }}" alt="">
                <p>Riwayat</p>
            </a>
            <a href="{{ route('terapis.pendapatan') }}" class="{{ request()->is('terapis/pendapatan') ? 'active' : '' }}">
                <img src="{{ asset('frontend/terapist/img/pendapatan.png') }}" alt="">
                <p>Pendapatan</p>
            </a>
            <a href="{{ route('terapis-profile.index') }}" class="">
                <img src="{{ asset('frontend/terapist/img/akun.png') }}" alt="">
                <p>Akun</p>
            </a>
        </div>
        @endif
    </div>

    <div class="popup" id="popup">
        <div class="headpop">
            <h4>Yakin melaporkan customer ini?</h4>
            <p>Berikan laporan jika mengganggu pekerejaan anda</p>
        </div>

        <div class="content">
            <div class="kenapa">
                <p>Alasan melaporkan costomer</p>
            </div>
            <form id="form" method="post" action="">
                <div class="pilihan">
                    <input type="radio" name="reason" value="Customer tidak sopan">Customer tidak sopan<br>
                </div>

                <div class="pilihan">
                    <input type="radio" name="reason" value="Customer menolak membayar">Customer menolak
                    membayar<br>
                </div>

                <div class="pilihan">
                    <input type="radio" name="reason" value="Customer mengulur-ulur waktu">Customer mengulur-ulur
                    waktu<br>
                </div>

                <div class="pilihan">
                    <input type="radio" name="reason" value="Alamat tidak sesuai">Alamat tidak sesuai<br>
                </div>

                <div class="pilihan">
                    <input type="radio" onclick="javascript:alasanlain();" id="btnlain" name="reason" value="lainnya">Alasan lainnya
                </div>

                <input type="text" onclick="javascript:alasanlain();" id="isian" name="other_reason">

            </form>
            <div class="lapor">
                <a href="http://127.0.0.1:8000/terapis/riwayat-dijadwalkan">
                    <button type="submit">Tolak</button>
                </a>
            </div>

        </div>
    </div>


</body>

<script>
    // ketika diklik fungsi order akan mengadakan event,"sesuai nama"
    function order(evt, orderName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("order"); //inisiasi var X sesuai dengan kelas yang dipanggil (div)
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

    // ============== pop up window ==============
    let popup = document.getElementById("popup");

    function openpopup() {
        popup.classList.add("open-popup");
    }

    function closepopup() {
        popup.classList.remove("open-popup");
    }

    function alasanlain() {
        if (document.getElementById('btnlain').checked) {
            document.getElementById('isian').style.visibility = 'visible';
        } else document.getElementById('isian').style.visibility = 'hidden';
    }
</script>

</html>