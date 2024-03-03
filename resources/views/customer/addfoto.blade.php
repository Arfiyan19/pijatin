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

    <title>Pijat.in</title>
</head>

<body>

    @if(auth()->check() == false)
    <div class="topbar">
        <div class="content">
            <div class="tittle">
                <a href="{{ route('profilecustomer') }}"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                        <path d="M19.9492 25.9502L13.0492 19.0502C12.8992 18.9002 12.7932 18.7377 12.7312 18.5627C12.6682 18.3877 12.6367 18.2002 12.6367 18.0002C12.6367 17.8002 12.6682 17.6127 12.7312 17.4377C12.7932 17.2627 12.8992 17.1002 13.0492 16.9502L19.9492 10.0502C20.2242 9.77519 20.5742 9.6377 20.9992 9.6377C21.4242 9.6377 21.7742 9.77519 22.0492 10.0502C22.3242 10.3252 22.4617 10.6752 22.4617 11.1002C22.4617 11.5252 22.3242 11.8752 22.0492 12.1502L16.1992 18.0002L22.0492 23.8502C22.3242 24.1252 22.4617 24.4752 22.4617 24.9002C22.4617 25.3252 22.3242 25.6752 22.0492 25.9502C21.7742 26.2252 21.4242 26.3627 20.9992 26.3627C20.5742 26.3627 20.2242 26.2252 19.9492 25.9502Z" fill="white" />
                    </svg></a>
                <p>Tambahkan Foto</p>
            </div>
        </div>
    </div>
    @elseif(auth()->check() == true)
    <div class="topbar">
        <div class="content">
            <div class="tittle">
                <a href="{{ route('customers-profile.index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                        <path d="M19.9492 25.9502L13.0492 19.0502C12.8992 18.9002 12.7932 18.7377 12.7312 18.5627C12.6682 18.3877 12.6367 18.2002 12.6367 18.0002C12.6367 17.8002 12.6682 17.6127 12.7312 17.4377C12.7932 17.2627 12.8992 17.1002 13.0492 16.9502L19.9492 10.0502C20.2242 9.77519 20.5742 9.6377 20.9992 9.6377C21.4242 9.6377 21.7742 9.77519 22.0492 10.0502C22.3242 10.3252 22.4617 10.6752 22.4617 11.1002C22.4617 11.5252 22.3242 11.8752 22.0492 12.1502L16.1992 18.0002L22.0492 23.8502C22.3242 24.1252 22.4617 24.4752 22.4617 24.9002C22.4617 25.3252 22.3242 25.6752 22.0492 25.9502C21.7742 26.2252 21.4242 26.3627 20.9992 26.3627C20.5742 26.3627 20.2242 26.2252 19.9492 25.9502Z" fill="white" />
                    </svg></a>
                <p>Tambahkan Foto</p>
            </div>
        </div>
    </div>
    @endif


    <div class="container-foto">
        <div class="frame">
            <div class="heading">
                KTP
            </div>

            <div class="content">
                <div class="take">
                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 56 56" fill="none">
                        <path d="M19.8333 31.5L25.6667 38.5L33.8333 28L44.3333 42H11.6667L19.8333 31.5ZM49 44.3333V28V11.6667C49 10.429 48.5083 9.242 47.6332 8.36683C46.758 7.49167 45.571 7 44.3333 7H11.6667C10.429 7 9.242 7.49167 8.36683 8.36683C7.49167 9.242 7 10.429 7 11.6667V44.3333C7 45.571 7.49167 46.758 8.36683 47.6332C9.242 48.5083 10.429 49 11.6667 49H44.3333C45.571 49 46.758 48.5083 47.6332 47.6332C48.5083 46.758 49 45.571 49 44.3333Z" fill="#56AB91" />
                    </svg>
                    <div class="txt">Ambil Foto</div>
                </div>
            </div>
        </div>

        <div class="frame">
            <div class="heading">
                SELFIE
            </div>

            <div class="content">
                <div class="take">
                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 56 56" fill="none">
                        <path d="M19.8333 31.5L25.6667 38.5L33.8333 28L44.3333 42H11.6667L19.8333 31.5ZM49 44.3333V28V11.6667C49 10.429 48.5083 9.242 47.6332 8.36683C46.758 7.49167 45.571 7 44.3333 7H11.6667C10.429 7 9.242 7.49167 8.36683 8.36683C7.49167 9.242 7 10.429 7 11.6667V44.3333C7 45.571 7.49167 46.758 8.36683 47.6332C9.242 48.5083 10.429 49 11.6667 49H44.3333C45.571 49 46.758 48.5083 47.6332 47.6332C48.5083 46.758 49 45.571 49 44.3333Z" fill="#56AB91" />
                    </svg>
                    <div class="txt">Ambil Foto</div>
                </div>
            </div>
        </div>

        <div class="frame">
            <div class="heading">
                Contoh
            </div>
            <div class="isi">
                <div class="contoh-ktp">
                    <div class="ktp"><img src="{{ asset('frontend/assets/image/ktp.jpeg') }}" alt=""></div>

                    <div class="ktp"><img src="{{ asset('frontend/assets/image/ktp2.png') }}" alt=""></div>
                </div>

                <div class="txt">
                    <ul>
                        <li>Perhatikan kualitas cahaya masuk dalam foto usahakan terlihat jelas</li>
                        <li>Perhatikan hasil foto anda agar tidak blur</li>
                        <li>Perhatikan komposisi letak saat mengambil gambar agar tidak terpotong</li>
                        <li>Perhatikan saat mengambil foto diri dengan ktp utnuk tidak menggunakan topi atau aksesoris lainya</li>
                        <li>Perhatikan saat memegang KTP agar tidak terbalik</li>
                        <li>Perhatikan Saat mengabil foto bersama KTP wajah terlihat jelas</li>
                    </ul>
                </div>
            </div>

            <div class="isi">
                <div class="head">Contoh yang salah</div>
                <div class="ktp-salah">
                    <div class="ktp"><img src="{{ asset('frontend/assets/image/blur.png') }}" alt=""></div>

                    <div class="ktp"><img src="{{ asset('frontend/assets/image/ktp3.png') }}" alt=""></div>
                </div>

                <div class="txt">
                    <ul>
                        <li>Dilarang Menggunakan topi saat foto selfi</li>
                        <li>Perhatikan kembali hasil foto anda jangan sampai blur</li>
                    </ul>
                </div>
            </div>
        </div>

        @if(auth()->check() == false)
        <div class="end">
            <a href="{{ route('formcustomer') }}" style="text-decoration: none;">
                <div class="btn">Selanjutnya</div>
            </a>
        </div>
        @elseif(auth()->check() == true)
        <div class="end">
            <a href="{{ route('customers.formProfile') }}" style="text-decoration: none;">
                <div class="btn">Selanjutnya</div>
            </a>
        </div>

        @endif


    </div>





</body>

</html>