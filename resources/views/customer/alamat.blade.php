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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- //cdn jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- import select  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- import select css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <!-- logo tittle bar -->
    <!-- //import swal  -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- //import swal  -->

    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }}">
    <style>
        .swal-button--danger:not([disabled]):hover {
            background-color: #64b79ede !important;
        }

        .swal-button--danger {
            background-color: #56AB91 !important;
        }

        .swal-button--cancel {
            background-color: white !important;
        }

        .swal-button--cancel:hover {
            background-color: #adbfaf !important;
        }
    </style>
    <title>Pijat.in || Profile || Alamat</title>
</head>

<body>
    <div class="topbar">
        <div class="content">
            <div class="tittle">
                @if(auth()->check() == false)
                <a href="{{ route('detaillayanan') }}"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                        <path d="M19.9492 25.9502L13.0492 19.0502C12.8992 18.9002 12.7932 18.7377 12.7312 18.5627C12.6682 18.3877 12.6367 18.2002 12.6367 18.0002C12.6367 17.8002 12.6682 17.6127 12.7312 17.4377C12.7932 17.2627 12.8992 17.1002 13.0492 16.9502L19.9492 10.0502C20.2242 9.77519 20.5742 9.6377 20.9992 9.6377C21.4242 9.6377 21.7742 9.77519 22.0492 10.0502C22.3242 10.3252 22.4617 10.6752 22.4617 11.1002C22.4617 11.5252 22.3242 11.8752 22.0492 12.1502L16.1992 18.0002L22.0492 23.8502C22.3242 24.1252 22.4617 24.4752 22.4617 24.9002C22.4617 25.3252 22.3242 25.6752 22.0492 25.9502C21.7742 26.2252 21.4242 26.3627 20.9992 26.3627C20.5742 26.3627 20.2242 26.2252 19.9492 25.9502Z" fill="white" />
                    </svg></a>
                @elseif(auth()->check() == true && auth()->user()->role == 'customer')
                <a href="{{ route('profile.index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                        <path d="M19.9492 25.9502L13.0492 19.0502C12.8992 18.9002 12.7932 18.7377 12.7312 18.5627C12.6682 18.3877 12.6367 18.2002 12.6367 18.0002C12.6367 17.8002 12.6682 17.6127 12.7312 17.4377C12.7932 17.2627 12.8992 17.1002 13.0492 16.9502L19.9492 10.0502C20.2242 9.77519 20.5742 9.6377 20.9992 9.6377C21.4242 9.6377 21.7742 9.77519 22.0492 10.0502C22.3242 10.3252 22.4617 10.6752 22.4617 11.1002C22.4617 11.5252 22.3242 11.8752 22.0492 12.1502L16.1992 18.0002L22.0492 23.8502C22.3242 24.1252 22.4617 24.4752 22.4617 24.9002C22.4617 25.3252 22.3242 25.6752 22.0492 25.9502C21.7742 26.2252 21.4242 26.3627 20.9992 26.3627C20.5742 26.3627 20.2242 26.2252 19.9492 25.9502Z" fill="white" />
                    </svg></a>
                @elseif(auth()->check() == true && auth()->user()->role == 'terapis')
                <a href="{{ route('terapis-profile.index') }}">
                    <svg xmlns=" http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                        <path d="M19.9492 25.9502L13.0492 19.0502C12.8992 18.9002 12.7932 18.7377 12.7312 18.5627C12.6682 18.3877 12.6367 18.2002 12.6367 18.0002C12.6367 17.8002 12.6682 17.6127 12.7312 17.4377C12.7932 17.2627 12.8992 17.1002 13.0492 16.9502L19.9492 10.0502C20.2242 9.77519 20.5742 9.6377 20.9992 9.6377C21.4242 9.6377 21.7742 9.77519 22.0492 10.0502C22.3242 10.3252 22.4617 10.6752 22.4617 11.1002C22.4617 11.5252 22.3242 11.8752 22.0492 12.1502L16.1992 18.0002L22.0492 23.8502C22.3242 24.1252 22.4617 24.4752 22.4617 24.9002C22.4617 25.3252 22.3242 25.6752 22.0492 25.9502C21.7742 26.2252 21.4242 26.3627 20.9992 26.3627C20.5742 26.3627 20.2242 26.2252 19.9492 25.9502Z" fill="white" />
                    </svg>
                </a>
                @endif
                <p>Pilih Alamat</p>
                @if(Session::has('success'))
                <script>
                    toastr.success("{!! Session::get('success') !!}", "Success", {
                        timeOut: 3000
                    })
                </script>
                @endif

            </div>
        </div>
    </div>

    @if(auth()->check() == false)

    <div class="container-alamat">
        <div class="frame-alamat">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <div class="card-alamat">
                <div class="content">
                    <div class="head">
                        <div class="head-tittle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M17.5 8.33398C17.5 14.1673 10 19.1673 10 19.1673C10 19.1673 2.5 14.1673 2.5 8.33398C2.5 6.34486 3.29018 4.43721 4.6967 3.03068C6.10322 1.62416 8.01088 0.833984 10 0.833984C11.9891 0.833984 13.8968 1.62416 15.3033 3.03068C16.7098 4.43721 17.5 6.34486 17.5 8.33398Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10 10.834C11.3807 10.834 12.5 9.7147 12.5 8.33398C12.5 6.95327 11.3807 5.83398 10 5.83398C8.61929 5.83398 7.5 6.95327 7.5 8.33398C7.5 9.7147 8.61929 10.834 10 10.834Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="txt">Lokasi Utama</div>
                        </div>
                        <div class="head-tittle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                <path d="M7.5 12.5H13.125" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10.3125 2.18715C10.5611 1.93851 10.8984 1.79883 11.25 1.79883C11.4241 1.79883 11.5965 1.83312 11.7574 1.89975C11.9182 1.96638 12.0644 2.06404 12.1875 2.18715C12.3106 2.31027 12.4083 2.45643 12.4749 2.61728C12.5415 2.77814 12.5758 2.95054 12.5758 3.12465C12.5758 3.29876 12.5415 3.47117 12.4749 3.63202C12.4083 3.79288 12.3106 3.93904 12.1875 4.06215L4.375 11.8747L1.875 12.4997L2.5 9.99965L10.3125 2.18715Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                <path d="M1.875 3.75H3.125H13.125" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M11.875 3.75V12.5C11.875 12.8315 11.7433 13.1495 11.5089 13.3839C11.2745 13.6183 10.9565 13.75 10.625 13.75H4.375C4.04348 13.75 3.72554 13.6183 3.49112 13.3839C3.2567 13.1495 3.125 12.8315 3.125 12.5V3.75M5 3.75V2.5C5 2.16848 5.1317 1.85054 5.36612 1.61612C5.60054 1.3817 5.91848 1.25 6.25 1.25H8.75C9.08152 1.25 9.39946 1.3817 9.63388 1.61612C9.8683 1.85054 10 2.16848 10 2.5V3.75" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M6.25 6.875V10.625" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M8.75 6.875V10.625" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                    <div class="desc">
                        <div class="txt">Karangjambe, Gg. Arjuna No.59, Jaranan, Banguntapan, Kec. Banguntapan, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55198</div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="21" viewBox="0 0 19 21" fill="none">
                            <path d="M7.24998 14.916C7.0972 14.7632 7.02081 14.5688 7.02081 14.3327C7.02081 14.0966 7.0972 13.9021 7.24998 13.7493L10.5 10.4993L7.24998 7.24935C7.0972 7.09657 7.02081 6.90213 7.02081 6.66602C7.02081 6.4299 7.0972 6.23546 7.24998 6.08268C7.40276 5.9299 7.5972 5.85352 7.83331 5.85352C8.06942 5.85352 8.26387 5.9299 8.41665 6.08268L12.25 9.91602C12.3333 9.99935 12.3925 10.0896 12.4275 10.1868C12.4625 10.2841 12.4797 10.3882 12.4791 10.4993C12.4791 10.6105 12.4616 10.7146 12.4266 10.8118C12.3916 10.9091 12.3328 10.9993 12.25 11.0827L8.41665 14.916C8.26387 15.0688 8.06942 15.1452 7.83331 15.1452C7.5972 15.1452 7.40276 15.0688 7.24998 14.916Z" fill="#626262" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="frame-alamat">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <div class="card-alamat">
                <div class="content">
                    <div class="head">
                        <div class="head-tittle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M17.5 8.33398C17.5 14.1673 10 19.1673 10 19.1673C10 19.1673 2.5 14.1673 2.5 8.33398C2.5 6.34486 3.29018 4.43721 4.6967 3.03068C6.10322 1.62416 8.01088 0.833984 10 0.833984C11.9891 0.833984 13.8968 1.62416 15.3033 3.03068C16.7098 4.43721 17.5 6.34486 17.5 8.33398Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10 10.834C11.3807 10.834 12.5 9.7147 12.5 8.33398C12.5 6.95327 11.3807 5.83398 10 5.83398C8.61929 5.83398 7.5 6.95327 7.5 8.33398C7.5 9.7147 8.61929 10.834 10 10.834Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="txt">Lokasi saya</div>
                        </div>
                        <div class="head-tittle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                <path d="M7.5 12.5H13.125" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10.3125 2.18715C10.5611 1.93851 10.8984 1.79883 11.25 1.79883C11.4241 1.79883 11.5965 1.83312 11.7574 1.89975C11.9182 1.96638 12.0644 2.06404 12.1875 2.18715C12.3106 2.31027 12.4083 2.45643 12.4749 2.61728C12.5415 2.77814 12.5758 2.95054 12.5758 3.12465C12.5758 3.29876 12.5415 3.47117 12.4749 3.63202C12.4083 3.79288 12.3106 3.93904 12.1875 4.06215L4.375 11.8747L1.875 12.4997L2.5 9.99965L10.3125 2.18715Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                <path d="M1.875 3.75H3.125H13.125" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M11.875 3.75V12.5C11.875 12.8315 11.7433 13.1495 11.5089 13.3839C11.2745 13.6183 10.9565 13.75 10.625 13.75H4.375C4.04348 13.75 3.72554 13.6183 3.49112 13.3839C3.2567 13.1495 3.125 12.8315 3.125 12.5V3.75M5 3.75V2.5C5 2.16848 5.1317 1.85054 5.36612 1.61612C5.60054 1.3817 5.91848 1.25 6.25 1.25H8.75C9.08152 1.25 9.39946 1.3817 9.63388 1.61612C9.8683 1.85054 10 2.16848 10 2.5V3.75" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M6.25 6.875V10.625" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M8.75 6.875V10.625" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                    <div class="desc">
                        <div class="txt">Karangjambe, Gg. Arjuna No.59, Jaranan, Banguntapan, Kec. Banguntapan, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55198</div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="21" viewBox="0 0 19 21" fill="none">
                            <path d="M7.24998 14.916C7.0972 14.7632 7.02081 14.5688 7.02081 14.3327C7.02081 14.0966 7.0972 13.9021 7.24998 13.7493L10.5 10.4993L7.24998 7.24935C7.0972 7.09657 7.02081 6.90213 7.02081 6.66602C7.02081 6.4299 7.0972 6.23546 7.24998 6.08268C7.40276 5.9299 7.5972 5.85352 7.83331 5.85352C8.06942 5.85352 8.26387 5.9299 8.41665 6.08268L12.25 9.91602C12.3333 9.99935 12.3925 10.0896 12.4275 10.1868C12.4625 10.2841 12.4797 10.3882 12.4791 10.4993C12.4791 10.6105 12.4616 10.7146 12.4266 10.8118C12.3916 10.9091 12.3328 10.9993 12.25 11.0827L8.41665 14.916C8.26387 15.0688 8.06942 15.1452 7.83331 15.1452C7.5972 15.1452 7.40276 15.0688 7.24998 14.916Z" fill="#626262" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <a href="{{ route('tambahalamat') }}" style="text-decoration: none;"><button>+ Tambah alamat</button></a>
    </div>
    @elseif(auth()->check() == true && auth()->user()->role == 'customer')
    <div class="container-alamat">
        @foreach($data->alamat as $alamat)
        <div class="frame-alamat">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <div class="card-alamat">
                <div class="content">
                    <div class="head">
                        <div class="head-tittle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M17.5 8.33398C17.5 14.1673 10 19.1673 10 19.1673C10 19.1673 2.5 14.1673 2.5 8.33398C2.5 6.34486 3.29018 4.43721 4.6967 3.03068C6.10322 1.62416 8.01088 0.833984 10 0.833984C11.9891 0.833984 13.8968 1.62416 15.3033 3.03068C16.7098 4.43721 17.5 6.34486 17.5 8.33398Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10 10.834C11.3807 10.834 12.5 9.7147 12.5 8.33398C12.5 6.95327 11.3807 5.83398 10 5.83398C8.61929 5.83398 7.5 6.95327 7.5 8.33398C7.5 9.7147 8.61929 10.834 10 10.834Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="txt">Lokasi Utama</div>
                        </div>
                        <div class="head-tittle">
                            <a href="javascript:void(0)" style="text-decoration: none;" onclick="editAlamatCustomers('{{ $alamat->id }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                    <path d="M7.5 12.5H13.125" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M10.3125 2.18715C10.5611 1.93851 10.8984 1.79883 11.25 1.79883C11.4241 1.79883 11.5965 1.83312 11.7574 1.89975C11.9182 1.96638 12.0644 2.06404 12.1875 2.18715C12.3106 2.31027 12.4083 2.45643 12.4749 2.61728C12.5415 2.77814 12.5758 2.95054 12.5758 3.12465C12.5758 3.29876 12.5415 3.47117 12.4749 3.63202C12.4083 3.79288 12.3106 3.93904 12.1875 4.06215L4.375 11.8747L1.875 12.4997L2.5 9.99965L10.3125 2.18715Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                            <a href="javascript:void(0)" onclick="hapusAlamatCustomers('{{ $alamat->id }}')" style="text-decoration: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                    <path d="M1.875 3.75H3.125H13.125" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M11.875 3.75V12.5C11.875 12.8315 11.7433 13.1495 11.5089 13.3839C11.2745 13.6183 10.9565 13.75 10.625 13.75H4.375C4.04348 13.75 3.72554 13.6183 3.49112 13.3839C3.2567 13.1495 3.125 12.8315 3.125 12.5V3.75M5 3.75V2.5C5 2.16848 5.1317 1.85054 5.36612 1.61612C5.60054 1.3817 5.91848 1.25 6.25 1.25H8.75C9.08152 1.25 9.39946 1.3817 9.63388 1.61612C9.8683 1.85054 10 2.16848 10 2.5V3.75" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.25 6.875V10.625" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M8.75 6.875V10.625" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="desc">
                        <div class="txt">{{ $alamat->alamat_lengkap }}, {{ $alamat->kelurahan }},{{ $alamat->kecamatan }},{{ $alamat->kota }},{{ $alamat->provinsi }}, ( {{ $alamat->kode_pos }} )</div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="21" viewBox="0 0 19 21" fill="none">
                            <path d="M7.24998 14.916C7.0972 14.7632 7.02081 14.5688 7.02081 14.3327C7.02081 14.0966 7.0972 13.9021 7.24998 13.7493L10.5 10.4993L7.24998 7.24935C7.0972 7.09657 7.02081 6.90213 7.02081 6.66602C7.02081 6.4299 7.0972 6.23546 7.24998 6.08268C7.40276 5.9299 7.5972 5.85352 7.83331 5.85352C8.06942 5.85352 8.26387 5.9299 8.41665 6.08268L12.25 9.91602C12.3333 9.99935 12.3925 10.0896 12.4275 10.1868C12.4625 10.2841 12.4797 10.3882 12.4791 10.4993C12.4791 10.6105 12.4616 10.7146 12.4266 10.8118C12.3916 10.9091 12.3328 10.9993 12.25 11.0827L8.41665 14.916C8.26387 15.0688 8.06942 15.1452 7.83331 15.1452C7.5972 15.1452 7.40276 15.0688 7.24998 14.916Z" fill="#626262" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <a href="{{ route('customers.tambahAlamat', ['id' => $data->id] ) }}" style="text-decoration: none;"><button>+ Tambah alamat</button></a>
    </div>
    @elseif(auth()->check() == true && auth()->user()->role == 'terapis')
    <!-- //foreach $data->alamat  -->
    <div class="container-alamat">
        @foreach($data->alamat as $alamat)
        <div class="frame-alamat">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <div class="card-alamat">
                <div class="content">
                    <div class="head">
                        <div class="head-tittle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M17.5 8.33398C17.5 14.1673 10 19.1673 10 19.1673C10 19.1673 2.5 14.1673 2.5 8.33398C2.5 6.34486 3.29018 4.43721 4.6967 3.03068C6.10322 1.62416 8.01088 0.833984 10 0.833984C11.9891 0.833984 13.8968 1.62416 15.3033 3.03068C16.7098 4.43721 17.5 6.34486 17.5 8.33398Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10 10.834C11.3807 10.834 12.5 9.7147 12.5 8.33398C12.5 6.95327 11.3807 5.83398 10 5.83398C8.61929 5.83398 7.5 6.95327 7.5 8.33398C7.5 9.7147 8.61929 10.834 10 10.834Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="txt">Lokasi Utama</div>
                        </div>
                        <div class="head-tittle">
                            <a href="javascript:void(0)" style="text-decoration: none;" onclick="editAlamat('{{ $alamat->id }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                    <path d="M7.5 12.5H13.125" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M10.3125 2.18715C10.5611 1.93851 10.8984 1.79883 11.25 1.79883C11.4241 1.79883 11.5965 1.83312 11.7574 1.89975C11.9182 1.96638 12.0644 2.06404 12.1875 2.18715C12.3106 2.31027 12.4083 2.45643 12.4749 2.61728C12.5415 2.77814 12.5758 2.95054 12.5758 3.12465C12.5758 3.29876 12.5415 3.47117 12.4749 3.63202C12.4083 3.79288 12.3106 3.93904 12.1875 4.06215L4.375 11.8747L1.875 12.4997L2.5 9.99965L10.3125 2.18715Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                            <a href="javascript:void(0)" onclick="hapusAlamat('{{ $alamat->id }}')" style="text-decoration: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                    <path d="M1.875 3.75H3.125H13.125" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M11.875 3.75V12.5C11.875 12.8315 11.7433 13.1495 11.5089 13.3839C11.2745 13.6183 10.9565 13.75 10.625 13.75H4.375C4.04348 13.75 3.72554 13.6183 3.49112 13.3839C3.2567 13.1495 3.125 12.8315 3.125 12.5V3.75M5 3.75V2.5C5 2.16848 5.1317 1.85054 5.36612 1.61612C5.60054 1.3817 5.91848 1.25 6.25 1.25H8.75C9.08152 1.25 9.39946 1.3817 9.63388 1.61612C9.8683 1.85054 10 2.16848 10 2.5V3.75" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.25 6.875V10.625" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M8.75 6.875V10.625" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="desc">
                        <div class="txt">{{ $alamat->alamat_lengkap }}, {{ $alamat->kelurahan }},{{ $alamat->kecamatan }},{{ $alamat->kota }},{{ $alamat->provinsi }}, ( {{ $alamat->kode_pos }} ) </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="21" viewBox="0 0 19 21" fill="none
                        ">
                            <path d="M7.24998 14.916C7.0972 14.7632 7.02081 14.5688 7.02081 14.3327C7.02081 14.0966 7.0972 13.9021 7.24998 13.7493L10.5 10.4993L7.24998 7.24935C7.0972 7.09657 7.02081 6.90213 7.02081 6.66602C7.02081 6.4299 7.0972 6.23546 7.24998 6.08268C7.40276 5.9299 7.5972 5.85352 7.83331 5.85352C8.06942 5.85352 8.26387 5.9299 8.41665 6.08268L12.25 9.91602C12.3333 9.99935 12.3925 10.0896 12.4275 10.1868C12.4625 10.2841 12.4797 10.3882 12.4791 10.4993C12.4791 10.6105 12.4616 10.7146 12.4266 10.8118C12.3916 10.9091 12.3328 10.9993 12.25 11.0827L8.41665 14.916C8.26387 15.0688 8.06942 15.1452 7.83331 15.1452C7.5972 15.1452 7.40276 15.068
                            8 7 7.24998 6.08268C7.40276 5.9299 7.5972 5.85352 7.83331 5.85352C8.06942 5.85352 8.26387 5.9299 8.41665 6.08268L12.25 9.91602C12.3333 9.99935 12.3925 10.0896 12.4275 10.1868C12.4625 10.2841 12.4797 10.3882 12.4791 10.4993C12.4791 10.6105 12.4616 10.7146 12.4266 10.8118C12.3916 10.9091 12.3328 10.9993 12.25 11.0827L8.41665 14.916C8.26387 15.0688 8.06942 15.1452 7.83331 15.1452C7.5972 15.1452 7.40276 15.0688 7.24998 14.916Z" fill="#626262" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <a href="{{ route('terapis.tambahAlamat', ['id' => $data->id]) }}" style="text-decoration: none;"><button>+ Tambah alamat</button></a>
    </div>
    @endif


    <!-- 
    <div class="container-alamat">
        <div class="frame-alamat">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <div class="card-alamat">
                <div class="content">
                    <div class="head">
                        <div class="head-tittle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M17.5 8.33398C17.5 14.1673 10 19.1673 10 19.1673C10 19.1673 2.5 14.1673 2.5 8.33398C2.5 6.34486 3.29018 4.43721 4.6967 3.03068C6.10322 1.62416 8.01088 0.833984 10 0.833984C11.9891 0.833984 13.8968 1.62416 15.3033 3.03068C16.7098 4.43721 17.5 6.34486 17.5 8.33398Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10 10.834C11.3807 10.834 12.5 9.7147 12.5 8.33398C12.5 6.95327 11.3807 5.83398 10 5.83398C8.61929 5.83398 7.5 6.95327 7.5 8.33398C7.5 9.7147 8.61929 10.834 10 10.834Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="txt">Lokasi Utama</div>
                        </div>
                        <div class="head-tittle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                <path d="M7.5 12.5H13.125" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10.3125 2.18715C10.5611 1.93851 10.8984 1.79883 11.25 1.79883C11.4241 1.79883 11.5965 1.83312 11.7574 1.89975C11.9182 1.96638 12.0644 2.06404 12.1875 2.18715C12.3106 2.31027 12.4083 2.45643 12.4749 2.61728C12.5415 2.77814 12.5758 2.95054 12.5758 3.12465C12.5758 3.29876 12.5415 3.47117 12.4749 3.63202C12.4083 3.79288 12.3106 3.93904 12.1875 4.06215L4.375 11.8747L1.875 12.4997L2.5 9.99965L10.3125 2.18715Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                <path d="M1.875 3.75H3.125H13.125" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M11.875 3.75V12.5C11.875 12.8315 11.7433 13.1495 11.5089 13.3839C11.2745 13.6183 10.9565 13.75 10.625 13.75H4.375C4.04348 13.75 3.72554 13.6183 3.49112 13.3839C3.2567 13.1495 3.125 12.8315 3.125 12.5V3.75M5 3.75V2.5C5 2.16848 5.1317 1.85054 5.36612 1.61612C5.60054 1.3817 5.91848 1.25 6.25 1.25H8.75C9.08152 1.25 9.39946 1.3817 9.63388 1.61612C9.8683 1.85054 10 2.16848 10 2.5V3.75" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M6.25 6.875V10.625" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M8.75 6.875V10.625" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                    <div class="desc">
                        <div class="txt">Karangjambe, Gg. Arjuna No.59, Jaranan, Banguntapan, Kec. Banguntapan, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55198</div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="21" viewBox="0 0 19 21" fill="none">
                            <path d="M7.24998 14.916C7.0972 14.7632 7.02081 14.5688 7.02081 14.3327C7.02081 14.0966 7.0972 13.9021 7.24998 13.7493L10.5 10.4993L7.24998 7.24935C7.0972 7.09657 7.02081 6.90213 7.02081 6.66602C7.02081 6.4299 7.0972 6.23546 7.24998 6.08268C7.40276 5.9299 7.5972 5.85352 7.83331 5.85352C8.06942 5.85352 8.26387 5.9299 8.41665 6.08268L12.25 9.91602C12.3333 9.99935 12.3925 10.0896 12.4275 10.1868C12.4625 10.2841 12.4797 10.3882 12.4791 10.4993C12.4791 10.6105 12.4616 10.7146 12.4266 10.8118C12.3916 10.9091 12.3328 10.9993 12.25 11.0827L8.41665 14.916C8.26387 15.0688 8.06942 15.1452 7.83331 15.1452C7.5972 15.1452 7.40276 15.0688 7.24998 14.916Z" fill="#626262" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('tambahalamat') }}" style="text-decoration: none;"><button>+ Tambah alamat</button></a>
    </div> -->
</body>

</html>
@if(auth()->check() == true && auth()->user()->role == 'terapis')
<script>
    function editAlamat(id) {
        // alert(id);
        window.location.href = "{{ url('terapis/terapis-profile/alamat') }}/" + "{{ $data->id }}" + "/edit/" + id;
    }

    function hapusAlamat(id) {
        swal({
            title: "Apakah anda yakin?",
            text: "Alamat akan dihapus",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            //stye swall
            buttons: {
                // style: "background-color: #56AB91;",
                cancel: {
                    text: "Batal",
                    value: null,
                    visible: true,
                    className: "",
                    closeModal: false,
                    // background color 
                    // backgroundColor: '#56AB91',
                },
                confirm: {
                    text: "Hapus",
                    value: true,
                    visible: true,
                    className: "",
                    closeModal: false,
                }
            }
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "{{ route('terapis.hapusAlamat', ['id' => $data->id]) }}",
                    type: "POST",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        swal("Alamat berhasil dihapus", {
                            icon: "success",
                        }).then((willDelete) => {
                            if (willDelete) {
                                location.reload();
                            }
                        });
                    }
                });
            } else {
                swal("Alamat tidak jadi dihapus");
            }
        });
    }
</script>
@elseif(auth()->check() == true && auth()->user()->role == 'customer')
<script>
    // editAlamatCustomers
    function editAlamatCustomers(id) {
        // alert(id);
        window.location.href = "{{ url('customers/profile') }}/" + "{{ $data->id }}" + "/alamat/edit/" + id;
    }
    // Route::delete('/profile/{id}/alamat/hapus/{id_alamat}', 'App\Http\Controllers\Customer\ProfileController@hapusAlamat')->name('customers.hapusAlamat');
    // hapusAlamatCustomers
    function hapusAlamatCustomers(id) {
        swal({
            title: "Apakah anda yakin?",
            text: "Alamat akan dihapus",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            //stye swall
            buttons: {
                // style: "background-color: #56AB91;",
                cancel: {
                    text: "Batal",
                    value: null,
                    visible: true,
                    className: "",
                    closeModal: false,
                    // background color 
                    // backgroundColor: '#56AB91',
                },
                confirm: {
                    text: "Hapus",
                    value: true,
                    visible: true,
                    className: "",
                    closeModal: false,
                }
            }
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "{{ route('customers.hapusAlamat', ['id' => $data->id]) }}",
                    type: "POST",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        swal("Alamat berhasil dihapus", {
                            icon: "success",
                        }).then((willDelete) => {
                            if (willDelete) {
                                location.reload();
                            }
                        });
                    }
                });
            } else {
                swal("Alamat tidak jadi dihapus");
            }
        });
    }
    // function hapusAlamatCustomers(id) {
    //     swal({
    //         title: "Apakah anda yakin?",
    //         text: "Alamat akan dihapus",
    //         icon: "warning",
    //         buttons: true,
    //         dangerMode: true,
    //         //stye swall
    //         buttons: {
    //             // style: "background-color: #56AB91;",
    //             cancel: {
    //                 text: "Batal",
    //                 value: null,
    //                 visible: true,
    //                 className: "",
    //                 closeModal: false,
    //                 // background color 
    //                 // backgroundColor: '#56AB91',
    //             },
    //             confirm: {
    //                 text: "Hapus",
    //                 value: true,
    //                 visible: true,
    //                 className: "",
    //                 closeModal: false,
    //             }
    //         }
    //     }).then((willDelete) => {
    //         if (willDelete) {
    //             $.ajax({
    //                 url: "{{ url('customers/profile') }}/" + "{{ $data->id }}" + "/alamat/hapus/" + id,
    //                 type: "POST",
    //                 data: {
    //                     id: id,
    //                     _token: "{{ csrf_token() }}"
    //                 },
    //                 success: function(data) {
    //                     swal("Alamat berhasil dihapus", {
    //                         icon: "success",
    //                     }).then((willDelete) => {
    //                         if (willDelete) {
    //                             location.reload();
    //                         }
    //                     });
    //                 }
    //             });
    //         } else {
    //             swal("Alamat tidak jadi dihapus");
    //         }
    //     });
    // }
</script>
@endif