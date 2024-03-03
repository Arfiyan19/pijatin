<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
    <div class="elipse">
        <div class="content">
            <div class="tittle">
                <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                        viewBox="0 0 36 36" fill="none">
                        <path
                            d="M19.95 25.9502L13.05 19.0502C12.9 18.9002 12.794 18.7377 12.732 18.5627C12.669 18.3877 12.6375 18.2002 12.6375 18.0002C12.6375 17.8002 12.669 17.6127 12.732 17.4377C12.794 17.2627 12.9 17.1002 13.05 16.9502L19.95 10.0502C20.225 9.77519 20.575 9.6377 21 9.6377C21.425 9.6377 21.775 9.77519 22.05 10.0502C22.325 10.3252 22.4625 10.6752 22.4625 11.1002C22.4625 11.5252 22.325 11.8752 22.05 12.1502L16.2 18.0002L22.05 23.8502C22.325 24.1252 22.4625 24.4752 22.4625 24.9002C22.4625 25.3252 22.325 25.6752 22.05 25.9502C21.775 26.2252 21.425 26.3627 21 26.3627C20.575 26.3627 20.225 26.2252 19.95 25.9502Z"
                            fill="white" />
                    </svg></a>
            </div>
        </div>
        <div class="content-title">
            <div class="title">Silahkan Log in dulu yah</div>
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="20" viewBox="0 0 40 20" fill="none">
                <g clip-path="url(#clip0_2128_23538)">
                    <path
                        d="M9.49472 0C7.93262 0 6.43451 0.8067 5.32995 2.24264L1.72511 6.92893C0.620539 8.36487 0 10.3124 0 12.3431C0 16.5719 2.637 20 5.8899 20C7.452 20 8.9501 19.1933 10.0547 17.7573L12.5482 14.5158C12.5482 14.5157 12.5482 14.5159 12.5482 14.5158L19.8133 5.07107C20.3409 4.38527 21.0564 4 21.8024 4C23.0514 4 24.1104 5.05827 24.4775 6.52271L26.7704 3.54197C25.7244 1.41223 23.8903 0 21.8024 0C20.2403 0 18.7422 0.8067 17.6376 2.24264L7.87897 14.9289C7.35144 15.6147 6.63595 16 5.8899 16C4.33633 16 3.07692 14.3628 3.07692 12.3431C3.07692 11.3733 3.37329 10.4431 3.90082 9.75733L7.50564 5.07107C8.03318 4.38527 8.74867 4 9.49472 4C10.7438 4 11.8027 5.05832 12.1698 6.52281L14.4627 3.54205C13.4167 1.41227 11.5826 0 9.49472 0Z"
                        fill="white" />
                    <path
                        d="M20.1867 14.9289C19.6591 15.6147 18.9437 16 18.1976 16C16.9487 16 15.8899 14.942 15.5227 13.4778L13.2299 16.4585C14.2759 18.5879 16.1099 20 18.1976 20C19.7597 20 21.2578 19.1933 22.3624 17.7573L32.121 5.07107C32.6486 4.38527 33.3641 4 34.1101 4C35.6637 4 36.9231 5.63723 36.9231 7.65687C36.9231 8.62673 36.6267 9.55687 36.0992 10.2427L32.4944 14.9289C31.9668 15.6147 31.2513 16 30.5053 16C29.2563 16 28.1974 14.9418 27.8303 13.4775L25.5374 16.4582C26.5834 18.5879 28.4175 20 30.5053 20C32.0674 20 33.5655 19.1933 34.6701 17.7573L38.2749 13.0711C39.3794 11.6351 40 9.6876 40 7.65687C40 3.42809 37.363 0 34.1101 0C32.548 0 31.0499 0.8067 29.9453 2.24264L20.1867 14.9289Z"
                        fill="white" />
                </g>
                <defs>
                    <clipPath id="clip0_2128_23538">
                        <rect width="40" height="20" fill="white" />
                    </clipPath>
                </defs>
            </svg>
        </div>
    </div>


    <div class="container-login">
        <form class="login-form" method="POST" action="{{ route('customers.login') }}">
            <!-- @csrf -->
            <div class="form-group">
                <label for="username">Email</label>
                <input type="text" id="username" name="email" class="form-control">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" class="form-control">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <a class="link" href="{{ route('ajukanpembatalan') }}">Lupa Kata Sandi?</a>
            <div class="text-center">
                <button type="submit" class="button-primary mt-5">Masuk</button>
                <div>
                    <span>Belum Punya akun?</span>
                    <a href="{{ route('daftarcustomer') }}" style="text-decoration: none;">Daftar</a>
                </div>
            </div>
        </form>
    </div>



</body>

</html>
