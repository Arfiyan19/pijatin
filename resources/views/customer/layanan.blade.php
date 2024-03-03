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
    <style>
        .layanan2 {
            cursor: pointer;
        }
    </style>
    <title>Pijat.in</title>

</head>

<body>
    <div class="topbar">
        <div class="content">
            <div class="tittle">
                <a href="{{ route('homecustomer') }}"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                        <path d="M19.9492 25.9502L13.0492 19.0502C12.8992 18.9002 12.7932 18.7377 12.7312 18.5627C12.6682 18.3877 12.6367 18.2002 12.6367 18.0002C12.6367 17.8002 12.6682 17.6127 12.7312 17.4377C12.7932 17.2627 12.8992 17.1002 13.0492 16.9502L19.9492 10.0502C20.2242 9.77519 20.5742 9.6377 20.9992 9.6377C21.4242 9.6377 21.7742 9.77519 22.0492 10.0502C22.3242 10.3252 22.4617 10.6752 22.4617 11.1002C22.4617 11.5252 22.3242 11.8752 22.0492 12.1502L16.1992 18.0002L22.0492 23.8502C22.3242 24.1252 22.4617 24.4752 22.4617 24.9002C22.4617 25.3252 22.3242 25.6752 22.0492 25.9502C21.7742 26.2252 21.4242 26.3627 20.9992 26.3627C20.5742 26.3627 20.2242 26.2252 19.9492 25.9502Z" fill="white" />
                    </svg></a>
                <p>Layanan</p>
            </div>
        </div>
    </div>

    @if(auth()->check() == false)
    <div class="container-layanan">
        <div class="grid">
            <div class="layanan2">
                <img src="{{ asset('frontend/assets/image/slide1.svg') }}" alt="">
                <div class="gradient"></div>
                <div class="head">Full Body Massage</div>
                <div class="rate">
                    <img src="{{ asset('frontend/assets/image/star.svg') }}" alt="">
                    <div class="poin">4.5</div>
                </div>
                <div class="konten">Pijat di seluruh bagian <br> tubuh... Lihat selengkapnya</div>
                <div class="price">IDR 100k/jam</div>
            </div>
            <div class="layanan2">
                <img src="{{ asset('frontend/assets/image/slide2.svg') }}" alt="">
                <div class="gradient"></div>
                <div class="head">Hot Stone Massage</div>
                <div class="rate">
                    <img src="{{ asset('frontend/assets/image/star.svg') }}" alt="">
                    <div class="poin">4.5</div>
                </div>
                <div class="konten">Nikmati sensasi hangat <br> yang... Lihat selengkapnya</div>
                <div class="price">IDR 150k/jam</div>
            </div>
            <div class="layanan2">
                <img src="{{ asset('frontend/assets/image/slide3.svg') }}" alt="">
                <div class="gradient"></div>
                <div class="head">Thai Massage </div>
                <div class="rate">
                    <img src="{{ asset('frontend/assets/image/star.svg') }}" alt="">
                    <div class="poin">4.5</div>
                </div>
                <div class="konten">Bawa diri Anda ke tanah eksotis <br> Thailand... Lihat selengkapnya</div>
                <div class="price"></div>
            </div>
            <div class="layanan2">
                <img src="{{ asset('frontend/assets/image/slide4.svg') }}" alt="">
                <div class="gradient"></div>
                <div class="head">Deep Tissue Massage</div>
                <div class="rate">
                    <img src="{{ asset('frontend/assets/image/star.svg') }}" alt="">
                    <div class="poin">4.5</div>
                </div>
                <div class="konten">Teknik yang kuat ini fokus pada... <br> Lihat selengkapnya</div>
                <div class="price">IDR 150k/jam</div>
            </div>
            <div class="layanan2">
                <img src="{{ asset('frontend/assets/image/slide5.svg') }}" alt="">
                <div class="gradient"></div>
                <div class="head">Swedish Massage</div>
                <div class="rate">
                    <img src="{{ asset('frontend/assets/image/star.svg') }}" alt="">
                    <div class="poin">4.5</div>
                </div>
                <div class="konten">Kami menawarkan kombinasi yang <br> sempurna... Lihat selengkapnya</div>
                <div class="price">IDR 150k/jam</div>
            </div>
            <div class="layanan2">
                <img src="{{ asset('frontend/assets/image/slide6.svg') }}" alt="">
                <div class="gradient"></div>
                <div class="head">Traditional Massage</div>
                <div class="rate">
                    <img src="{{ asset('frontend/assets/image/star.svg') }}" alt="">
                    <div class="poin">4.5</div>
                </div>
                <div class="konten">kami menghormati warisan budaya <br> pijat kuno... Lihat selengkapnya</div>
                <div class="price">IDR 150k/jam</div>
            </div>
        </div>
    </div>
    @elseif(auth()->check() == true)
    <div class="container-layanan">
        <div class="grid">
            @foreach($layanan_utama as $layanan)
            <div class="layanan2" onclick="functionLayanan('{{ $layanan->id }}')">

                <img src="{{ asset('storage/' . $layanan->gambar) }}" alt="">
                <div class="gradient"></div>
                <div class="head">{{ $layanan->nama_layanan }}</div>
                <div class="rate">
                    <img src="{{ asset('frontend/assets/image/star.svg') }}" alt="">
                    <div class="poin">4.5</div>
                </div>
                <div class="konten">
                    <!-- {{ $layanan->deskripsi }} ambil 1/4 dari isinya  -->
                    {{ substr($layanan->deskripsi, 0, 30) }} <br>
                    ... Lihat selengkapnya
                </div>
                <div class="price">Rp. {{ number_format($layanan->harga, 0, ',', '.') }}/ {{ $layanan->durasi }} Menit</div>
            </div>
            @endforeach

            <!-- <div class="layanan2">
                <img src="{{ asset('frontend/assets/image/slide1.svg') }}" alt="">
                <div class="gradient"></div>
                <div class="head">Full Body Massage</div>
                <div class="rate">
                    <img src="{{ asset('frontend/assets/image/star.svg') }}" alt="">
                    <div class="poin">4.5</div>
                </div>
                <div class="konten">Pijat di seluruh bagian <br> tubuh... Lihat selengkapnya</div>
                <div class="price">IDR 100k/jam</div>
            </div>
            <div class="layanan2">
                <img src="{{ asset('frontend/assets/image/slide2.svg') }}" alt="">
                <div class="gradient"></div>
                <div class="head">Hot Stone Massage</div>
                <div class="rate">
                    <img src="{{ asset('frontend/assets/image/star.svg') }}" alt="">
                    <div class="poin">4.5</div>
                </div>
                <div class="konten">Nikmati sensasi hangat <br> yang... Lihat selengkapnya</div>
                <div class="price">IDR 150k/jam</div>
            </div>
            <div class="layanan2">
                <img src="{{ asset('frontend/assets/image/slide3.svg') }}" alt="">
                <div class="gradient"></div>
                <div class="head">Thai Massage </div>
                <div class="rate">
                    <img src="{{ asset('frontend/assets/image/star.svg') }}" alt="">
                    <div class="poin">4.5</div>
                </div>
                <div class="konten">Bawa diri Anda ke tanah eksotis <br> Thailand... Lihat selengkapnya</div>
                <div class="price"></div>
            </div>
            <div class="layanan2">
                <img src="{{ asset('frontend/assets/image/slide4.svg') }}" alt="">
                <div class="gradient"></div>
                <div class="head">Deep Tissue Massage</div>
                <div class="rate">
                    <img src="{{ asset('frontend/assets/image/star.svg') }}" alt="">
                    <div class="poin">4.5</div>
                </div>
                <div class="konten">Teknik yang kuat ini fokus pada... <br> Lihat selengkapnya</div>
                <div class="price">IDR 150k/jam</div>
            </div>
            <div class="layanan2">
                <img src="{{ asset('frontend/assets/image/slide5.svg') }}" alt="">
                <div class="gradient"></div>
                <div class="head">Swedish Massage</div>
                <div class="rate">
                    <img src="{{ asset('frontend/assets/image/star.svg') }}" alt="">
                    <div class="poin">4.5</div>
                </div>
                <div class="konten">Kami menawarkan kombinasi yang <br> sempurna... Lihat selengkapnya</div>
                <div class="price">IDR 150k/jam</div>
            </div>
            <div class="layanan2">
                <img src="{{ asset('frontend/assets/image/slide6.svg') }}" alt="">
                <div class="gradient"></div>
                <div class="head">Traditional Massage</div>
                <div class="rate">
                    <img src="{{ asset('frontend/assets/image/star.svg') }}" alt="">
                    <div class="poin">4.5</div>
                </div>
                <div class="konten">kami menghormati warisan budaya <br> pijat kuno... Lihat selengkapnya</div>
                <div class="price">IDR 150k/jam</div>
            </div> -->
        </div>
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
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2125 0.656321L22.775 6.66882C24.1098 7.60694 24.903 9.13731 24.9 10.7688V19.6813C24.8967 21.0969 24.3312 22.4532 23.3278 23.4518C22.3245 24.4505 20.9656 25.0096 19.55 25.0063H5.45C4.03441 25.0096 2.67547 24.4505 1.67215 23.4518C0.668831 22.4532 0.103311 21.0969 0.0999994 19.6813V10.7688C0.0969886 9.13731 0.890168 7.60694 2.225 6.66882L10.7875 0.656321C11.7615 -0.218692 13.2385 -0.218692 14.2125 0.656321ZM14.325 17.5063L21.1625 12.7438L21.1125 12.8063C21.3872 12.6143 21.5385 12.2903 21.5095 11.9565C21.4805 11.6226 21.2756 11.3295 20.972 11.1877C20.6684 11.0459 20.3122 11.0768 20.0375 11.2688L13.1125 16.1063C12.9075 16.3114 12.626 16.4213 12.3363 16.4094C12.0466 16.3975 11.775 16.265 11.5875 16.0438L4.8625 11.2688C4.45205 11.0007 3.90371 11.0994 3.6125 11.4938C3.35085 11.9056 3.4487 12.4492 3.8375 12.7438L10.4625 17.4438C11.009 17.9443 11.7215 18.2249 12.4625 18.2313C13.153 18.2355 13.8191 17.9762 14.325 17.5063Z" fill="#34CBAA" />
                </svg>
                <h1>Notifikasi</h1>
            </a>
            <a href="{{ route('logincustomer') }}">
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
<script>
    function functionLayanan(id) {
        window.location.href = "{{ url('customers/layanan/pesan') }}/" + id;
    }
</script>

</html>