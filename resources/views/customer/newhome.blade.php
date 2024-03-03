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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- //cdn jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <title>Pijat.in</title>
</head>

<body>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="header">
                <div class="in-head">
                    <span id="closeModal" class="close"><svg fill="none" font-family="Times New Roman" font-size="16" height="17.33" viewBox="0 0 10 17" width="10.67" xmlns="http://www.w3.org/2000/svg" style="width:10.67px; height:17.33px; font-family:'Times New Roman'; font-size:16px; fill:none">
                            <g id="feArrowUp0">
                                <g id="feArrowUp1">
                                    <path clip-rule="evenodd" d="M8 16.998L0 8.99805L8 0.998047L10 2.99805L4 8.99805L10 14.998L8 16.998Z" fill="black" fill-rule="evenodd" id="feArrowUp2" />
                                </g>
                            </g>
                        </svg></span>
                    <div class="tittle2">
                        <div class="judul">Persayaratan jadi mitra
                            Body Massage
                        </div>
                        <div class="line">
                            <svg xmlns="http://www.w3.org/2000/svg" width="122" height="4" viewBox="0 0 122 4" fill="none">
                                <path d="M2 2H120" stroke="#036666" stroke-width="3" stroke-linecap="round" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="member">
                <h6>Member Terapis</h6>
                <ul style="list-style-type: disc;">
                    <li>Warga Negara Indonesia</li>
                    <li>Maksimal umur 85 Tahun saat mendaftar</li>
                </ul>
            </div>

            <div class="member">
                <h6>Dokumen</h6>
                <ul style="list-style-type: disc;">
                    <li>KTP asli (masih berlaku)</li>
                    <li>SKCK asli / Legalisir (dalam masa berlaku)</li>
                    <li>Buku Rekening Tabungan</li>
                </ul>
            </div>
            <div class="title2">
                <div class="cara">Cara daftar jadi mitra <br>
                    Body Massage
                </div>
                <div class="line2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="122" height="4" viewBox="0 0 122 4" fill="none">
                        <path d="M2 2H120" stroke="#036666" stroke-width="3" stroke-linecap="round" />
                    </svg>
                </div>

            </div>
            <div class="member">
                <h6>Lengkapi data diri pendaftaran</h6>
                <p>
                    Kandidat melakukan registrasi dengan menginput data diri <br>
                    Beserta kelengkapan dokumen
                </p>
            </div>
            <div class="member">
                <h6>Member Terapis</h6>
                <ul style="list-style-type: disc;">
                    <li>Apabila data lolos verifikasi kandidat akan menerima pemberitahuan untuk langkah selanjutnya.
                    </li>
                    <li>Status Pendaftaran kandidat dapat dicek langsung di laman aplikasi.</li>
                    <li>Apablia data kandidat kurang tepat. Kandidat akan mendapat pemeritahuan melalui Email</li>
                </ul>
            </div>
            <div class="member">
                <h6>Training </h6>
                <p>
                    Selesai lolos tahapan interview kandidat diwajibkan <br> mengikuti training dan breafing
                </p>
            </div>
            <div class="end">
                <div class="gambar">
                    <img src="{{ asset('frontend/assets/image/grup.svg') }}" alt="">
                </div>
                <div class="end-title">
                    <p>Sudah siap menjadi mitra Pijat.in?</p>
                </div>
                <button>Daftar Sekarang</button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="top">
            <img class="image1" src="{{ asset('frontend/assets/image/top.png') }}" alt="">
            <div class="logo">
                <img class="image2" src="{{ asset('frontend/assets/image/logo1.png') }}" alt="">
                <div class="title">Pijat.in</div>

                @if (session('success'))
                <div class="text-danger" id="success" hidden>{{ session('success') }}</div>
                @endif
            </div>
            <div class="txt">Selamat Datang di</div>



            <div class="header">
                Penawaran Menarik
            </div>

        </div>

        <div class="scroll-container">
            <div class="scroll-content">
                <!-- Isi konten horizontal di sini -->
                <div class="item1">
                    <img class="img1" src="{{ asset('frontend/assets/image/element1.png') }}" alt="">
                    <img class="img2" src="{{ asset('frontend/assets/image/element2.png') }}" alt="">
                    <img class="img3" src="{{ asset('frontend/assets/image/talent.png') }}" alt="">
                    <div class="txt">Gabung jadi Terapis</div>
                    <div class="txt2">Jadilah bagian dari tim <br>
                        terapis profesional kami!</div>
                    <div class="btn" id="openModal" style="cursor: pointer;">Selengkapnya</div>
                </div>

                <div class="item2">
                    <img class="img2" src="{{ asset('frontend/assets/image/vec1.svg') }}" alt="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="129" height="158" viewBox="0 0 129 158" fill="none">
                        <circle cx="46" cy="83" r="83" fill="#34CBAA" fill-opacity="0.49" />
                    </svg>
                    <img class="img1" src="{{ asset('frontend/assets/image/bg1.png') }}" alt="">
                    <div class="txt">Nikmati pengalaman pijat <br> profesional di rumah anda</div>
                    <div class="btn">Pesan Sekarang</div>

                    <img class="img3" src="{{ asset('frontend/assets/image/vec2.svg') }}" alt="">
                </div>
                <div class="item3">
                    <img class="img1" src="{{ asset('frontend/assets/image/orang.png') }}" alt="">
                    <div class="txt">Jadilah bagian dari tim terapis kami <br> dan bawa kenyamanan kepada <br>
                        pelanggan baru!</div>
                    <div class="btn" id="openModal">Daftar Terapis</div>
                </div>
                <div class="item4">
                    <img class="img1" src="{{ asset('frontend/assets/image/elipse.svg') }}" alt="">
                    <img class="img2" src="{{ asset('frontend/assets/image/orang3.png') }}" alt="">
                    <div class="txt">Dengan waktu yang fleksibel, <br> tentukan sendiri jadwal pijat yang <br> anda
                        inginkan.</div>
                    <div class="btn">Pesan Sekarang</div>
                </div>
                <!-- Tambahkan lebih banyak item sesuai kebutuhan -->
            </div>
        </div>
        @if(auth()->check() == false)
        <div class="header2">
            <span>Layanan</span>
            <a href="{{ route('layanan') }}" style="text-decoration: none;">Selengkapnya</a>
        </div>
        @elseif(auth()->check() == true)
        <div class="header2">
            <span>Layanan</span>
            <a href="{{ route('customers.layanan') }}" style="text-decoration: none;">Selengkapnya</a>
        </div>
        @endif
        <div class="scroll-container" style="margin-top: 20px;">
            <div class="scroll-content">
                <!-- Isi konten horizontal di sini -->
                @foreach ($layanan_utama as $item)
                <div class="layanan">
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="">
                    <div class="gradient"></div>
                    <div class="head">{{ $item->nama_layanan }}</div>
                    <div class="konten">Pijat di seluruh bagian <br> tubuh... Lihat selengkapnya</div>
                    <div class="price">{{ 'Rp.', number_format($item->harga, 0, ',', '.') }}</div>
                </div>
                @endforeach
                <div class="layanan">
                    <img src="{{ asset('frontend/assets/image/slide2.svg') }}" alt="">
                    <div class="gradient"></div>
                    <div class="head">Hot Stone Massage</div>
                    <div class="konten">Nikmati sensasi hangat <br> yang... Lihat selengkapnya</div>
                    <div class="price">IDR 150k/jam</div>
                </div>
                <div class="layanan">
                    <img src="{{ asset('frontend/assets/image/slide3.svg') }}" alt="">
                    <div class="gradient"></div>
                    <div class="head">Thai Massage </div>
                    <div class="konten">Bawa diri Anda ke tanah eksotis <br> Thailand... Lihat selengkapnya</div>
                    <div class="price"></div>
                </div>
                <div class="layanan">
                    <img src="{{ asset('frontend/assets/image/slide4.svg') }}" alt="">
                    <div class="gradient"></div>
                    <div class="head">Deep Tissue Massage</div>
                    <div class="konten">Teknik yang kuat ini fokus pada... <br> Lihat selengkapnya</div>
                    <div class="price">IDR 150k/jam</div>
                </div>
                <div class="layanan">
                    <img src="{{ asset('frontend/assets/image/slide5.svg') }}" alt="">
                    <div class="gradient"></div>
                    <div class="head">Swedish Massage</div>
                    <div class="konten">Kami menawarkan kombinasi yang <br> sempurna... Lihat selengkapnya</div>
                    <div class="price">IDR 150k/jam</div>
                </div>
                <div class="layanan">
                    <img src="{{ asset('frontend/assets/image/slide6.svg') }}" alt="">
                    <div class="gradient"></div>
                    <div class="head">Traditional Massage</div>
                    <div class="konten">kami menghormati warisan budaya <br>pijat kuno... Lihat selengkapnya</div>
                    <div class="price">IDR 150k/jam</div>
                </div>
                <!-- Tambahkan lebih banyak item sesuai kebutuhan -->
            </div>
        </div>

        <div class="header2">
            <span>FAQ’s</span>
        </div>

        <div class="faq">
            <div class="card-faq">
                <div class="txt-grup">
                    <div class="text">Apa yang dibutuhkan untuk memesan layanan di aplikasi Pijat.in?</div>
                    <span class="moreText" style="display:none;">Untuk memesan pijatan, Anda perlu memiliki akun
                        Pijat.in yang sudah terverifikasi. Anda dapat mencari terapis, memilih jenis pijatan, dan
                        memesan sesi pijatan sesuai preferensi Anda.</span>
                </div>
                <img class="toggleButton" data-index="0" onclick="toggleText(this)" src="{{ asset('frontend/assets/image/arw.svg') }}" alt="">
            </div>

            <div class="card-faq">
                <div class="txt-grup">
                    <div class="text">Apa syarat-syarat untuk bergabung sebagai terapis di Pijat.in?</div>
                    <span class="moreText" style="display:none;">Untuk menjadi terapis di Pijat.in, Anda harus
                        memiliki kualifikasi yang sesuai dan mengikuti proses verifikasi yang ditetapkan oleh
                        kami.</span>
                </div>
                <img class="toggleButton" data-index="1" onclick="toggleText(this)" src="{{ asset('frontend/assets/image/arw.svg') }}" alt="">
            </div>

            <div class="card-faq">
                <div class="txt-grup">
                    <div class="text">Apa saja jenis pijatan yang tersedia di Pijat.in?</div>
                    <span class="moreText" style="display:none;">Pijat.in menyediakan berbagai jenis pijatan, seperti
                        pijat tradisional, pijat seluruh tubuh, pijat thailand, dan lainnya. Anda dapat memilih sesuai
                        dengan kebutuhan dan preferensi Anda.</span>
                </div>
                <img class="toggleButton" data-index="2" onclick="toggleText(this)" src="{{ asset('frontend/assets/image/arw.svg') }}" alt="">
            </div>

            <div class="card-faq">
                <div class="txt-grup">
                    <div class="text">Bagaimana saya dapat mengatur jadwal kerja saya sebagai terapis?</div>
                    <span class="moreText" style="display:none;">Anda dapat mengatur jadwal kerja Anda sesuai dengan
                        preferensi Anda melalui akun terapis Anda.</span>
                </div>
                <img class="toggleButton" data-index="3" onclick="toggleText(this)" src="{{ asset('frontend/assets/image/arw.svg') }}" alt="">
            </div>

            <div class="card-faq">
                <div class="txt-grup">
                    <div class="text">Apakah ada biaya tambahan atau pajak yang harus saya bayar?</div>
                    <span class="moreText" style="display:none;">Biaya tambahan atau pajak, jika ada, akan jelas
                        tertera saat Anda memesan pijatan. Pastikan untuk memeriksa rincian pesanan Anda.</span>
                </div>
                <img class="toggleButton" data-index="4" onclick="toggleText(this)" src="{{ asset('frontend/assets/image/arw.svg') }}" alt="">
            </div>

            <div class="card-faq">
                <div class="txt-grup">
                    <div class="text">Bagaimana terapis akan dibayar atas layanan yang diberikan?</div>
                    <span class="moreText" style="display:none;">Anda akan menerima pembayaran melalui e-wallet yang
                        terdapat di akun terapis Anda. Pembayaran biasanya diproses setelah sesi pijatan selesai.</span>
                </div>
                <img class="toggleButton" data-index="5" onclick="toggleText(this)" src="{{ asset('frontend/assets/image/arw.svg') }}" alt="">
            </div>
        </div>



    </div>
    @if (auth()->check() == false)
    <div class="footer">
        <div class="nav-menu">
            <a href="{{ route('homecustomer') }}"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5671 1.254L20.8197 5.87242C22.0248 6.7445 22.7418 8.13889 22.75 9.62636V17.9869C22.6725 20.6677 20.4458 22.7834 17.7645 22.7237H5.24737C2.5615 22.7901 0.327434 20.6725 0.25 17.9869V9.62636C0.258242 8.13889 0.975234 6.7445 2.18026 5.87242L8.43289 1.254C10.2585 -0.0846654 12.7415 -0.0846654 14.5671 1.254ZM6.17105 17.7145H16.8289C17.3195 17.7145 17.7171 17.3169 17.7171 16.8264C17.7171 16.3358 17.3195 15.9382 16.8289 15.9382H6.17105C5.68054 15.9382 5.2829 16.3358 5.2829 16.8264C5.2829 17.3169 5.68054 17.7145 6.17105 17.7145Z" fill="#34CBAA" />
                </svg>
                <h1>Beranda</h1>
            </a>
            <a href="{{ route('riwayatunlogin') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="27" viewBox="0 0 21 27" fill="none">
                    <path d="M10.5625 11.2H6.6625C6.14473 11.2 5.725 10.7803 5.725 10.2625C5.725 9.74474 6.14473 9.325 6.6625 9.325H10.5625C11.0803 9.325 11.5 9.74474 11.5 10.2625C11.5 10.7803 11.0803 11.2 10.5625 11.2Z" fill="#626262" />
                    <path d="M6.6625 13.2125H14.3375C14.8553 13.2125 15.275 13.6322 15.275 14.15C15.275 14.6678 14.8553 15.0875 14.3375 15.0875H6.6625C6.14473 15.0875 5.725 14.6678 5.725 14.15C5.725 13.6322 6.14473 13.2125 6.6625 13.2125Z" fill="#626262" />
                    <path d="M13.2875 16.875H6.6625C6.14473 16.875 5.725 17.2947 5.725 17.8125C5.725 18.3303 6.14473 18.75 6.6625 18.75H13.2875C13.8053 18.75 14.225 18.3303 14.225 17.8125C14.225 17.2947 13.8053 16.875 13.2875 16.875Z" fill="#626262" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.3375 1.85015e-06C14.349 -0.00139639 15.1843 0.789909 15.2375 1.80001C18.2061 2.13379 20.462 4.62539 20.5 7.6125V20.225C20.4931 23.5013 17.8388 26.1556 14.5625 26.1625H6.4375C3.16116 26.1556 0.506876 23.5013 0.5 20.225V7.6125C0.538016 4.62539 2.79385 2.13379 5.7625 1.80001C5.82184 0.79274 6.6535 0.00485383 7.6625 1.85015e-06H13.3375ZM13.3625 1.80001H7.66249V3.28751H13.3625V1.80001ZM18.625 20.225C18.625 22.4707 16.8082 24.2931 14.5625 24.3H6.43749C4.19182 24.2931 2.37498 22.4707 2.375 20.225V7.61251C2.37997 5.62359 3.8242 3.93073 5.78749 3.61251C5.94094 4.5267 6.73553 5.19416 7.66249 5.1875H13.3375C14.2644 5.19416 15.059 4.5267 15.2125 3.61251C17.1758 3.93073 18.62 5.62359 18.625 7.61251V20.225Z" fill="#626262" />
                </svg>
                <p>Riwayat</p>
            </a>
            <a href="{{ route('notifunlogin') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="26" viewBox="0 0 25 26" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2125 0.678703L22.775 6.6912C24.1062 7.62678 24.8989 9.15161 24.9 10.7787V19.6912C24.8967 21.1068 24.3312 22.4631 23.3278 23.4617C22.3245 24.4604 20.9656 25.0195 19.55 25.0162H5.45001C4.03441 25.0195 2.67548 24.4604 1.67216 23.4617C0.668838 22.4631 0.103317 21.1068 0.100006 19.6912V10.7787C0.10107 9.15161 0.89379 7.62678 2.22501 6.6912L10.7875 0.678703C11.7499 -0.226153 13.2501 -0.226153 14.2125 0.678703ZM22.002 22.1359C22.6537 21.4889 23.0217 20.6095 23.025 19.6912V10.7787C23.0075 9.7817 22.5152 8.85291 21.7 8.2787L13.1375 2.2662L13 2.1662C12.8683 2.03183 12.6881 1.9561 12.5 1.9561C12.3119 1.9561 12.1317 2.03183 12 2.1662L11.8625 2.2662L3.30001 8.2787C2.48477 8.85291 1.99251 9.7817 1.97501 10.7787V19.6912C1.97831 20.6095 2.34629 21.4889 2.99798 22.1359C3.64967 22.7829 4.53169 23.1445 5.45 23.1412H19.55C20.4683 23.1445 21.3503 22.7829 22.002 22.1359Z" fill="#626262" />
                    <path d="M20.0875 11.2662L13.1625 16.1037C12.9575 16.3088 12.676 16.4187 12.3863 16.4068C12.0966 16.3949 11.825 16.2624 11.6375 16.0412L4.9125 11.2662C4.64236 11.0326 4.26295 10.9727 3.93401 11.1119C3.60507 11.251 3.38377 11.5649 3.36328 11.9215C3.34278 12.2781 3.52667 12.6153 3.8375 12.7912L10.4625 17.5162C11.0057 18.0219 11.7203 18.3033 12.4625 18.3037C13.1605 18.286 13.826 18.0047 14.325 17.5162L21.1625 12.7412C21.5556 12.4503 21.659 11.906 21.4 11.4912C21.0971 11.0708 20.5131 10.9707 20.0875 11.2662Z" fill="#626262" />
                </svg>
                <p>Notifikasi</p>
            </a>
            <a href="{{ route('customers.pilihrole') }}">
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
            <a href="{{ route('customers.dashboard') }}"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5671 1.254L20.8197 5.87242C22.0248 6.7445 22.7418 8.13889 22.75 9.62636V17.9869C22.6725 20.6677 20.4458 22.7834 17.7645 22.7237H5.24737C2.5615 22.7901 0.327434 20.6725 0.25 17.9869V9.62636C0.258242 8.13889 0.975234 6.7445 2.18026 5.87242L8.43289 1.254C10.2585 -0.0846654 12.7415 -0.0846654 14.5671 1.254ZM6.17105 17.7145H16.8289C17.3195 17.7145 17.7171 17.3169 17.7171 16.8264C17.7171 16.3358 17.3195 15.9382 16.8289 15.9382H6.17105C5.68054 15.9382 5.2829 16.3358 5.2829 16.8264C5.2829 17.3169 5.68054 17.7145 6.17105 17.7145Z" fill="#34CBAA" />
                </svg>
                <h1>Beranda</h1>
            </a>
            <a href="{{ route('customers.riwayat') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="27" viewBox="0 0 21 27" fill="none">
                    <path d="M10.5625 11.2H6.6625C6.14473 11.2 5.725 10.7803 5.725 10.2625C5.725 9.74474 6.14473 9.325 6.6625 9.325H10.5625C11.0803 9.325 11.5 9.74474 11.5 10.2625C11.5 10.7803 11.0803 11.2 10.5625 11.2Z" fill="#626262" />
                    <path d="M6.6625 13.2125H14.3375C14.8553 13.2125 15.275 13.6322 15.275 14.15C15.275 14.6678 14.8553 15.0875 14.3375 15.0875H6.6625C6.14473 15.0875 5.725 14.6678 5.725 14.15C5.725 13.6322 6.14473 13.2125 6.6625 13.2125Z" fill="#626262" />
                    <path d="M13.2875 16.875H6.6625C6.14473 16.875 5.725 17.2947 5.725 17.8125C5.725 18.3303 6.14473 18.75 6.6625 18.75H13.2875C13.8053 18.75 14.225 18.3303 14.225 17.8125C14.225 17.2947 13.8053 16.875 13.2875 16.875Z" fill="#626262" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.3375 1.85015e-06C14.349 -0.00139639 15.1843 0.789909 15.2375 1.80001C18.2061 2.13379 20.462 4.62539 20.5 7.6125V20.225C20.4931 23.5013 17.8388 26.1556 14.5625 26.1625H6.4375C3.16116 26.1556 0.506876 23.5013 0.5 20.225V7.6125C0.538016 4.62539 2.79385 2.13379 5.7625 1.80001C5.82184 0.79274 6.6535 0.00485383 7.6625 1.85015e-06H13.3375ZM13.3625 1.80001H7.66249V3.28751H13.3625V1.80001ZM18.625 20.225C18.625 22.4707 16.8082 24.2931 14.5625 24.3H6.43749C4.19182 24.2931 2.37498 22.4707 2.375 20.225V7.61251C2.37997 5.62359 3.8242 3.93073 5.78749 3.61251C5.94094 4.5267 6.73553 5.19416 7.66249 5.1875H13.3375C14.2644 5.19416 15.059 4.5267 15.2125 3.61251C17.1758 3.93073 18.62 5.62359 18.625 7.61251V20.225Z" fill="#626262" />
                </svg>
                <p>Riwayat</p>
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
    <script>
        const openModalButton = document.getElementById('openModal');
        const closeModalButton = document.getElementById('closeModal');
        const modal = document.getElementById('myModal');

        openModalButton.addEventListener('click', () => {
            modal.style.display = 'block';
            setTimeout(() => {
                modal.style.opacity = '1';
                modal.querySelector('.modal-content').style.transform = 'translateY(0)';
            }, 10);
        });

        closeModalButton.addEventListener('click', () => {
            modal.style.opacity = '0';
            modal.querySelector('.modal-content').style.transform = 'translateY(100%)';
            setTimeout(() => {
                modal.style.display = 'none';
            }, 300);
        });


        //success message toasr
        $(document).ready(function() {
            var dataSuccess = document.getElementById('success').innerHTML;
            displaySuccessMessage(dataSuccess);
        });

        function displaySuccessMessage(message) {
            toastr.success(message, 'Success', {
                timeOut: 3000
            });
        }
    </script>

    <script>
        var isTextVisible = []; // Array untuk menyimpan status teks yang terlihat atau tidak

        // Inisialisasi status awal untuk setiap pasangan
        for (var i = 0; i < 6; i++) { // Sesuaikan dengan jumlah pasangan Anda
            isTextVisible[i] = false;
        }

        function toggleText(button) {
            var index = button.getAttribute("data-index");
            var moreText = document.querySelectorAll('.moreText')[index];
            var toggleButton = document.querySelectorAll('.toggleButton')[index];

            if (isTextVisible[index]) {
                moreText.style.display = 'none';
                toggleButton.src = "{{ asset('frontend/assets/image/arw.svg') }}";
            } else {
                moreText.style.display = 'inline';
                toggleButton.src = "{{ asset('frontend/assets/image/arw2.svg') }}"; // Ganti dengan path gambar yang sesuai
            }
            isTextVisible[index] = !isTextVisible[index];
        }
    </script>

</body>

</html>