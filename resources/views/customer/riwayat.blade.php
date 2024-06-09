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
    <link rel="stylesheet" href="{{ asset('frontend/css/homeCustomer.css') }}">

    <!-- logo tittle bar -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }}">
    <!-- //query dan temannya  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- //cdn jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <title>Pijat.in</title>
</head>

<body>
    @if(auth()->check() == false)
    <div class="topbar">
        <div class="content">
            <div class="tittle">
                <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                        <path d="M19.9492 25.9502L13.0492 19.0502C12.8992 18.9002 12.7932 18.7377 12.7312 18.5627C12.6682 18.3877 12.6367 18.2002 12.6367 18.0002C12.6367 17.8002 12.6682 17.6127 12.7312 17.4377C12.7932 17.2627 12.8992 17.1002 13.0492 16.9502L19.9492 10.0502C20.2242 9.77519 20.5742 9.6377 20.9992 9.6377C21.4242 9.6377 21.7742 9.77519 22.0492 10.0502C22.3242 10.3252 22.4617 10.6752 22.4617 11.1002C22.4617 11.5252 22.3242 11.8752 22.0492 12.1502L16.1992 18.0002L22.0492 23.8502C22.3242 24.1252 22.4617 24.4752 22.4617 24.9002C22.4617 25.3252 22.3242 25.6752 22.0492 25.9502C21.7742 26.2252 21.4242 26.3627 20.9992 26.3627C20.5742 26.3627 20.2242 26.2252 19.9492 25.9502Z" fill="white" />
                    </svg></a>
                <p>Riwayat pesanan anda</p>
            </div>
        </div>
    </div>
    <div class="container2">
        <div class="nav-btn">
            <div class="btn1">Semua</div>
            <div class="btn1">Dijadwalkan</div>
            <div class="btn1">Selesai</div>
            <div class="btn1">Dibatalkan</div>
        </div>
        <a class="frame" href="{{ route('detaildijadwalkan') }}" style="text-decoration: none;">
            <div class="card-riwayat">
                <div class="head">
                    <div class="paket">Paket tradisional + Refleksi</div>
                    <span class="status dijadwalkan">Dijadwalkan</span>
                </div>
                <div class="name">Nama Terapist A</div>
                <div class="tgl">
                    <div>12/03/2023/ 09:30 AM</div>
                    <div>Id pesanan : NU99821</div>
                </div>
            </div>
        </a>

        <a class="frame" href="{{ route('detailselesai') }}" style="text-decoration: none;">
            <div class="card-riwayat">
                <div class="head">
                    <div class="paket">Paket tradisional + Refleksi</div>
                    <span class="status lunas">selesai</span>
                </div>
                <div class="name">Nama Terapist C</div>
                <div class="tgl">
                    <div>12/03/2023/ 09:30 AM</div>
                    <div>Id pesanan : NU99821</div>
                </div>
            </div>
        </a>

        <a class="frame" href="{{ route('detaildibatalkan') }}" style="text-decoration: none;">
            <div class="card-riwayat">
                <div class="head">
                    <div class="paket">Paket tradisional + Refleksi</div>
                    <span class="status dibatalkan">Dibatalkan</span>
                </div>
                <div class="name">Nama Terapist C</div>
                <div class="tgl">
                    <div>12/03/2023/ 09:30 AM</div>
                    <div>Id pesanan : NU99821</div>
                </div>
            </div>
        </a>
    </div>
    @elseif(auth()->check() == true)
    <div class="topbar">
        <div class="content">
            <div class="tittle">
                <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                        <path d="M19.9492 25.9502L13.0492 19.0502C12.8992 18.9002 12.7932 18.7377 12.7312 18.5627C12.6682 18.3877 12.6367 18.2002 12.6367 18.0002C12.6367 17.8002 12.6682 17.6127 12.7312 17.4377C12.7932 17.2627 12.8992 17.1002 13.0492 16.9502L19.9492 10.0502C20.2242 9.77519 20.5742 9.6377 20.9992 9.6377C21.4242 9.6377 21.7742 9.77519 22.0492 10.0502C22.3242 10.3252 22.4617 10.6752 22.4617 11.1002C22.4617 11.5252 22.3242 11.8752 22.0492 12.1502L16.1992 18.0002L22.0492 23.8502C22.3242 24.1252 22.4617 24.4752 22.4617 24.9002C22.4617 25.3252 22.3242 25.6752 22.0492 25.9502C21.7742 26.2252 21.4242 26.3627 20.9992 26.3627C20.5742 26.3627 20.2242 26.2252 19.9492 25.9502Z" fill="white" />
                    </svg></a>
                <p>Riwayat pesanan anda</p>
            </div>
        </div>
    </div>

    <div class="container2">
        <div class="nav-btn">
            <a href="{{ route('customers.riwayat') }}">
                <div class="btn1 active">Semua</div>
            </a>
            <a href="{{ route('customers.riwayat-dijadwalkan') }}">
                <div class="btn1">Dijadwalkan</div>
            </a>
            <a href="{{ route('customers.riwayat-selesai') }}">
                <div class="btn1">Selesai</div>
            </a>
            <a href="{{ route('customers.riwayat-dibatalkan') }}">
                <div class="btn1">Dibatalkan</div>
            </a>
        </div>
        <!-- //old  -->
        <!-- <a class="frame" href="{{ route('detaildijadwalkan') }}" style="text-decoration: none;">
            <div class="card-riwayat">
                <div class="head">
                    <div class="paket">Paket tradisional + Refleksi</div>
                    <span class="status dijadwalkan">Dijadwalkan</span>
                </div>
                <div class="name">Nama Terapist A</div>
                <div class="tgl">
                    <div>12/03/2023/ 09:30 AM</div>
                    <div>Id pesanan : NU99821</div>
                </div>
            </div>
        </a>
        <a class="frame" href="{{ route('detailselesai') }}" style="text-decoration: none;">
            <div class="card-riwayat">
                <div class="head">
                    <div class="paket">Paket tradisional + Refleksi</div>
                    <span class="status lunas">selesai</span>
                </div>
                <div class="name">Nama Terapist C</div>
                <div class="tgl">
                    <div>12/03/2023/ 09:30 AM</div>
                    <div>Id pesanan : NU99821</div>
                </div>
            </div>
        </a>
        <a class="frame" href="{{ route('detaildibatalkan') }}" style="text-decoration: none;">
            <div class="card-riwayat">
                <div class="head">
                    <div class="paket">Paket tradisional + Refleksi</div>
                    <span class="status dibatalkan">Dibatalkan</span>
                </div>
                <div class="name">Nama Terapist C</div>
                <div class="tgl">
                    <div>12/03/2023/ 09:30 AM</div>
                    <div>Id pesanan : NU99821</div>
                </div>
            </div>
        </a> -->
        <!-- //new  -->

        @foreach($user->customers->pemesanan as $pemesanan)
        <a class="frame" href="javascript:detail({{ $pemesanan->id }})" style="text-decoration: none;">
            <div class="card-riwayat">
                <div class="head">
                    @foreach($pemesanan->pemesanan_detail as $detail)
                    <div class="paket">
                        @php
                        $layanan = \App\Models\Layanan::where('id', $detail->layanan_id)->first();
                        echo $layanan->nama_layanan;
                        @endphp
                    </div>
                    @endforeach
                    @if($pemesanan->status_pemesanan == 'Masuk')
                    <span class="status dijadwalkan" style="color: #46805f; font-weight: 500;">Masuk</span>
                    @elseif($pemesanan->status_pemesanan == 'Proses')
                    <span class="status dijadwalkan" style="font-weight: 500;">Proses</span>
                    @elseif($pemesanan->status_pemesanan == 'Sukses')
                    <span class="status lunas" style="font-weight: 500;">Selesai</span>
                    @elseif($pemesanan->status_pemesanan == 'Batal')
                    <span class="status dibatalkan" style="font-weight: 500;">Dibatalkan</span>
                    @endif
                </div>
                @php
                $terapis = \App\Models\Terapis::where('id', $pemesanan->terapis_id_1)->first();
                @endphp
                <div class="name">{{ $terapis->nama }}</div>
                <div class="tgl">
                    <div>{{ $pemesanan->tanggal_pemesanan }} / {{ date('h:i A', strtotime($pemesanan->created_at)) }}</div>
                    <div>Id pesanan : PSN{{ $pemesanan->id }}</div>
                </div>
            </div>
        </a>
        @endforeach

    </div>
    @endif

    @if(auth()->check() == false)
    <div class="footer">
        <div class="nav-menu">
            <a href="{{ route('homecustomer') }}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="26" viewBox="0 0 25 26" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M22.8625 6.2506L15.9125 1.1131C13.8796 -0.371034 11.1205 -0.371034 9.0875 1.1131L2.15 6.2506C0.806801 7.21827 0.00762729 8.77016 -1.90735e-06 10.4256V19.7131C0.0750287 22.7047 2.55831 25.0705 5.55 25.0006H19.45C22.4417 25.0705 24.925 22.7047 25 19.7131V10.4131C24.9893 8.76481 24.1959 7.21971 22.8625 6.2506ZM23.125 19.7131C23.0504 21.6693 21.4064 23.1959 19.45 23.1256H5.55C3.59622 23.189 1.95628 21.6662 1.875 19.7131V10.4256C1.88167 9.363 2.39771 8.3681 3.2625 7.7506L10.2 2.6256C11.5701 1.62507 13.4299 1.62507 14.8 2.6256L21.7375 7.7631C22.6016 8.36988 23.1186 9.35729 23.125 10.4131V19.7131ZM6.875 17.1881H18.125C18.6428 17.1881 19.0625 17.6078 19.0625 18.1256C19.0625 18.6434 18.6428 19.0631 18.125 19.0631H6.875C6.35723 19.0631 5.9375 18.6434 5.9375 18.1256C5.9375 17.6078 6.35723 17.1881 6.875 17.1881Z" fill="#626262" />
                </svg>
                <p>Beranda</p>
            </a>
            <a href="{{ route('riwayatcustomer') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="26" viewBox="0 0 21 26" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.2313 2.1125V1.9C15.2313 0.850659 14.3806 0 13.3313 0H7.65629C6.60695 0 5.75629 0.850659 5.75629 1.9V2.075C3.01718 2.30346 0.915249 4.60143 0.931289 7.35V20.65C0.931285 22.0512 1.48876 23.3948 2.48072 24.3844C3.47268 25.374 4.81761 25.9283 6.21879 25.925H14.7813C16.1825 25.9283 17.5274 25.374 18.5194 24.3844C19.5113 23.3948 20.0688 22.0512 20.0688 20.65V7.35C20.0588 4.61374 17.9581 2.33942 15.2313 2.1125ZM7.65493 1.9H13.3549V3.3875H7.65493V1.9ZM10.5584 8.925H6.65839C6.14062 8.925 5.72089 9.34473 5.72089 9.8625C5.72089 10.3803 6.14062 10.8 6.65839 10.8H10.5584C11.0762 10.8 11.4959 10.3803 11.4959 9.8625C11.4959 9.34473 11.0762 8.925 10.5584 8.925ZM13.2959 18.3625H6.65839C6.14062 18.3625 5.72089 17.9428 5.72089 17.425C5.72089 16.9072 6.14062 16.4875 6.65839 16.4875H13.2959C13.8137 16.4875 14.2334 16.9072 14.2334 17.425C14.2334 17.9428 13.8137 18.3625 13.2959 18.3625ZM6.65839 14.7H14.3334C14.8512 14.7 15.2709 14.2803 15.2709 13.7625C15.2709 13.2447 14.8512 12.825 14.3334 12.825H6.65839C6.14062 12.825 5.72089 13.2447 5.72089 13.7625C5.72089 14.2803 6.14062 14.7 6.65839 14.7Z" fill="#34CBAA" />
                </svg>
                <h1>Riwayat</h1>
            </a>
            <a href="{{ route('notifcustomer') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="26" viewBox="0 0 25 26" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2125 0.678703L22.775 6.6912C24.1062 7.62678 24.8989 9.15161 24.9 10.7787V19.6912C24.8967 21.1068 24.3312 22.4631 23.3278 23.4617C22.3245 24.4604 20.9656 25.0195 19.55 25.0162H5.45001C4.03441 25.0195 2.67548 24.4604 1.67216 23.4617C0.668838 22.4631 0.103317 21.1068 0.100006 19.6912V10.7787C0.10107 9.15161 0.89379 7.62678 2.22501 6.6912L10.7875 0.678703C11.7499 -0.226153 13.2501 -0.226153 14.2125 0.678703ZM22.002 22.1359C22.6537 21.4889 23.0217 20.6095 23.025 19.6912V10.7787C23.0075 9.7817 22.5152 8.85291 21.7 8.2787L13.1375 2.2662L13 2.1662C12.8683 2.03183 12.6881 1.9561 12.5 1.9561C12.3119 1.9561 12.1317 2.03183 12 2.1662L11.8625 2.2662L3.30001 8.2787C2.48477 8.85291 1.99251 9.7817 1.97501 10.7787V19.6912C1.97831 20.6095 2.34629 21.4889 2.99798 22.1359C3.64967 22.7829 4.53169 23.1445 5.45 23.1412H19.55C20.4683 23.1445 21.3503 22.7829 22.002 22.1359Z" fill="#626262" />
                    <path d="M20.0875 11.2662L13.1625 16.1037C12.9575 16.3088 12.676 16.4187 12.3863 16.4068C12.0966 16.3949 11.825 16.2624 11.6375 16.0412L4.9125 11.2662C4.64236 11.0326 4.26295 10.9727 3.93401 11.1119C3.60507 11.251 3.38377 11.5649 3.36328 11.9215C3.34278 12.2781 3.52667 12.6153 3.8375 12.7912L10.4625 17.5162C11.0057 18.0219 11.7203 18.3033 12.4625 18.3037C13.1605 18.286 13.826 18.0047 14.325 17.5162L21.1625 12.7412C21.5556 12.4503 21.659 11.906 21.4 11.4912C21.0971 11.0708 20.5131 10.9707 20.0875 11.2662Z" fill="#626262" />
                </svg>
                <p>Notifikasi</p>
            </a>
            <a href="{{ route('profilecustomer') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="25" viewBox="0 0 21 25" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.975 18.3875L20.275 19.8125C20.5593 21.0445 20.2786 22.3391 19.5096 23.3427C18.7405 24.3463 17.5635 24.9541 16.3 25H4.7C3.43647 24.9541 2.25946 24.3463 1.49043 23.3427C0.721403 22.3391 0.440704 21.0445 0.724996 19.8125L1.025 18.3875C1.37004 16.4585 3.02827 15.0409 4.9875 15H16.0125C17.9717 15.0409 19.63 16.4585 19.975 18.3875ZM16.3 23.1125C16.9347 23.1052 17.5321 22.8111 17.925 22.3125V22.325C18.4071 21.7203 18.5949 20.9323 18.4375 20.175L18.1375 18.75C17.971 17.694 17.0808 16.9032 16.0125 16.8625H4.9875C3.91921 16.9032 3.02895 17.694 2.8625 18.75L2.5625 20.175C2.40894 20.9283 2.59658 21.7108 3.075 22.3125C3.46792 22.8111 4.06526 23.1052 4.7 23.1125H16.3Z" fill="#626262" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.125 12.5H9.87498C7.11355 12.5 4.87498 10.2614 4.87498 7.50002V4.20002C4.87164 3.08509 5.31307 2.01487 6.10145 1.22649C6.88983 0.438114 7.96005 -0.0033144 9.07498 1.87396e-05H11.925C13.0399 -0.0033144 14.1101 0.438114 14.8985 1.22649C15.6869 2.01487 16.1283 3.08509 16.125 4.20002V7.50002C16.125 10.2614 13.8864 12.5 11.125 12.5ZM9.07498 1.87502C7.79092 1.87502 6.74998 2.91596 6.74998 4.20002V7.50002C6.74998 9.22591 8.14909 10.625 9.87498 10.625H11.125C12.8509 10.625 14.25 9.22591 14.25 7.50002V4.20002C14.25 3.58339 14.005 2.99202 13.569 2.55599C13.133 2.11997 12.5416 1.87502 11.925 1.87502H9.07498Z" fill="#626262" />
                </svg>
                <p>Akun</p>
            </a>
        </div>
    </div>
    @elseif(auth()->check() == true)
    <div class="footer">
        <div class="nav-menu">
            <a href="{{ route('customers.dashboard') }}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="26" viewBox="0 0 25 26" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M22.8625 6.2506L15.9125 1.1131C13.8796 -0.371034 11.1205 -0.371034 9.0875 1.1131L2.15 6.2506C0.806801 7.21827 0.00762729 8.77016 -1.90735e-06 10.4256V19.7131C0.0750287 22.7047 2.55831 25.0705 5.55 25.0006H19.45C22.4417 25.0705 24.925 22.7047 25 19.7131V10.4131C24.9893 8.76481 24.1959 7.21971 22.8625 6.2506ZM23.125 19.7131C23.0504 21.6693 21.4064 23.1959 19.45 23.1256H5.55C3.59622 23.189 1.95628 21.6662 1.875 19.7131V10.4256C1.88167 9.363 2.39771 8.3681 3.2625 7.7506L10.2 2.6256C11.5701 1.62507 13.4299 1.62507 14.8 2.6256L21.7375 7.7631C22.6016 8.36988 23.1186 9.35729 23.125 10.4131V19.7131ZM6.875 17.1881H18.125C18.6428 17.1881 19.0625 17.6078 19.0625 18.1256C19.0625 18.6434 18.6428 19.0631 18.125 19.0631H6.875C6.35723 19.0631 5.9375 18.6434 5.9375 18.1256C5.9375 17.6078 6.35723 17.1881 6.875 17.1881Z" fill="#626262" />
                </svg>
                <p>Beranda</p>
            </a>
            <a href="{{ route('customers.riwayat') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="26" viewBox="0 0 21 26" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.2313 2.1125V1.9C15.2313 0.850659 14.3806 0 13.3313 0H7.65629C6.60695 0 5.75629 0.850659 5.75629 1.9V2.075C3.01718 2.30346 0.915249 4.60143 0.931289 7.35V20.65C0.931285 22.0512 1.48876 23.3948 2.48072 24.3844C3.47268 25.374 4.81761 25.9283 6.21879 25.925H14.7813C16.1825 25.9283 17.5274 25.374 18.5194 24.3844C19.5113 23.3948 20.0688 22.0512 20.0688 20.65V7.35C20.0588 4.61374 17.9581 2.33942 15.2313 2.1125ZM7.65493 1.9H13.3549V3.3875H7.65493V1.9ZM10.5584 8.925H6.65839C6.14062 8.925 5.72089 9.34473 5.72089 9.8625C5.72089 10.3803 6.14062 10.8 6.65839 10.8H10.5584C11.0762 10.8 11.4959 10.3803 11.4959 9.8625C11.4959 9.34473 11.0762 8.925 10.5584 8.925ZM13.2959 18.3625H6.65839C6.14062 18.3625 5.72089 17.9428 5.72089 17.425C5.72089 16.9072 6.14062 16.4875 6.65839 16.4875H13.2959C13.8137 16.4875 14.2334 16.9072 14.2334 17.425C14.2334 17.9428 13.8137 18.3625 13.2959 18.3625ZM6.65839 14.7H14.3334C14.8512 14.7 15.2709 14.2803 15.2709 13.7625C15.2709 13.2447 14.8512 12.825 14.3334 12.825H6.65839C6.14062 12.825 5.72089 13.2447 5.72089 13.7625C5.72089 14.2803 6.14062 14.7 6.65839 14.7Z" fill="#34CBAA" />
                </svg>
                <h1>Riwayat</h1>
            </a>
            <a href="{{ route('customers.notifikasi') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="26" viewBox="0 0 25 26" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2125 0.678703L22.775 6.6912C24.1062 7.62678 24.8989 9.15161 24.9 10.7787V19.6912C24.8967 21.1068 24.3312 22.4631 23.3278 23.4617C22.3245 24.4604 20.9656 25.0195 19.55 25.0162H5.45001C4.03441 25.0195 2.67548 24.4604 1.67216 23.4617C0.668838 22.4631 0.103317 21.1068 0.100006 19.6912V10.7787C0.10107 9.15161 0.89379 7.62678 2.22501 6.6912L10.7875 0.678703C11.7499 -0.226153 13.2501 -0.226153 14.2125 0.678703ZM22.002 22.1359C22.6537 21.4889 23.0217 20.6095 23.025 19.6912V10.7787C23.0075 9.7817 22.5152 8.85291 21.7 8.2787L13.1375 2.2662L13 2.1662C12.8683 2.03183 12.6881 1.9561 12.5 1.9561C12.3119 1.9561 12.1317 2.03183 12 2.1662L11.8625 2.2662L3.30001 8.2787C2.48477 8.85291 1.99251 9.7817 1.97501 10.7787V19.6912C1.97831 20.6095 2.34629 21.4889 2.99798 22.1359C3.64967 22.7829 4.53169 23.1445 5.45 23.1412H19.55C20.4683 23.1445 21.3503 22.7829 22.002 22.1359Z" fill="#626262" />
                    <path d="M20.0875 11.2662L13.1625 16.1037C12.9575 16.3088 12.676 16.4187 12.3863 16.4068C12.0966 16.3949 11.825 16.2624 11.6375 16.0412L4.9125 11.2662C4.64236 11.0326 4.26295 10.9727 3.93401 11.1119C3.60507 11.251 3.38377 11.5649 3.36328 11.9215C3.34278 12.2781 3.52667 12.6153 3.8375 12.7912L10.4625 17.5162C11.0057 18.0219 11.7203 18.3033 12.4625 18.3037C13.1605 18.286 13.826 18.0047 14.325 17.5162L21.1625 12.7412C21.5556 12.4503 21.659 11.906 21.4 11.4912C21.0971 11.0708 20.5131 10.9707 20.0875 11.2662Z" fill="#626262" />
                </svg>
                <p>Notifikasi</p>
            </a>
            <a href="{{ route('profile.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="25" viewBox="0 0 21 25" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.975 18.3875L20.275 19.8125C20.5593 21.0445 20.2786 22.3391 19.5096 23.3427C18.7405 24.3463 17.5635 24.9541 16.3 25H4.7C3.43647 24.9541 2.25946 24.3463 1.49043 23.3427C0.721403 22.3391 0.440704 21.0445 0.724996 19.8125L1.025 18.3875C1.37004 16.4585 3.02827 15.0409 4.9875 15H16.0125C17.9717 15.0409 19.63 16.4585 19.975 18.3875ZM16.3 23.1125C16.9347 23.1052 17.5321 22.8111 17.925 22.3125V22.325C18.4071 21.7203 18.5949 20.9323 18.4375 20.175L18.1375 18.75C17.971 17.694 17.0808 16.9032 16.0125 16.8625H4.9875C3.91921 16.9032 3.02895 17.694 2.8625 18.75L2.5625 20.175C2.40894 20.9283 2.59658 21.7108 3.075 22.3125C3.46792 22.8111 4.06526 23.1052 4.7 23.1125H16.3Z" fill="#626262" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.125 12.5H9.87498C7.11355 12.5 4.87498 10.2614 4.87498 7.50002V4.20002C4.87164 3.08509 5.31307 2.01487 6.10145 1.22649C6.88983 0.438114 7.96005 -0.0033144 9.07498 1.87396e-05H11.925C13.0399 -0.0033144 14.1101 0.438114 14.8985 1.22649C15.6869 2.01487 16.1283 3.08509 16.125 4.20002V7.50002C16.125 10.2614 13.8864 12.5 11.125 12.5ZM9.07498 1.87502C7.79092 1.87502 6.74998 2.91596 6.74998 4.20002V7.50002C6.74998 9.22591 8.14909 10.625 9.87498 10.625H11.125C12.8509 10.625 14.25 9.22591 14.25 7.50002V4.20002C14.25 3.58339 14.005 2.99202 13.569 2.55599C13.133 2.11997 12.5416 1.87502 11.925 1.87502H9.07498Z" fill="#626262" />
                </svg>
                <p>Akun</p>
            </a>
        </div>
    </div>
    @endif
</body>

</html>