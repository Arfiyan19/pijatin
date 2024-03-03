<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- //cdn jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <!-- my style -->
    <link rel="stylesheet" href="{{ asset('frontend/css/verifikasi.css') }}">

    <!-- logo tittle bar -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }}">

    <title>Pijat.in</title>
</head>

<style>
    .button-customer {
        border-radius: 20px;
        border: 1.5px solid var(--primary-primary-006, #56AB91);
        width: 145px;
        color: #56AB91;
        height: 35px;
        justify-content: center;
        align-items: center;
        gap: 10px;
        background-color: white;
    }

    .button-trapis {
        border-radius: 20px;
        color: white;
        background: var(--primary-primary-005, #56AB91);
        display: flex;
        border: transparent;
        width: 145px;
        height: 35px;
        padding: 10px;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }
</style>

<body>
    <section>
        <div class="container">
            <div class="text-center mt-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="20" viewBox="0 0 40 20" fill="none">
                    <g clip-path="url(#clip0_2085_13645)">
                        <path d="M9.49472 0C7.93262 0 6.43451 0.8067 5.32995 2.24264L1.72511 6.92893C0.620539 8.36487 0 10.3124 0 12.3431C0 16.5719 2.637 20 5.8899 20C7.452 20 8.9501 19.1933 10.0547 17.7573L12.5482 14.5158C12.5482 14.5157 12.5482 14.5159 12.5482 14.5158L19.8133 5.07107C20.3409 4.38527 21.0564 4 21.8024 4C23.0514 4 24.1104 5.05827 24.4775 6.52271L26.7704 3.54197C25.7244 1.41223 23.8903 0 21.8024 0C20.2403 0 18.7422 0.8067 17.6376 2.24264L7.87897 14.9289C7.35144 15.6147 6.63595 16 5.8899 16C4.33633 16 3.07692 14.3628 3.07692 12.3431C3.07692 11.3733 3.37329 10.4431 3.90082 9.75733L7.50564 5.07107C8.03318 4.38527 8.74867 4 9.49472 4C10.7438 4 11.8027 5.05832 12.1698 6.52281L14.4627 3.54205C13.4167 1.41227 11.5826 0 9.49472 0Z" fill="#036666" />
                        <path d="M20.1867 14.9289C19.6591 15.6147 18.9437 16 18.1976 16C16.9487 16 15.8899 14.942 15.5227 13.4778L13.2299 16.4585C14.2759 18.5879 16.1099 20 18.1976 20C19.7597 20 21.2578 19.1933 22.3624 17.7573L32.121 5.07107C32.6486 4.38527 33.3641 4 34.1101 4C35.6637 4 36.9231 5.63723 36.9231 7.65687C36.9231 8.62673 36.6267 9.55687 36.0992 10.2427L32.4944 14.9289C31.9668 15.6147 31.2513 16 30.5053 16C29.2563 16 28.1974 14.9418 27.8303 13.4775L25.5374 16.4582C26.5834 18.5879 28.4175 20 30.5053 20C32.0674 20 33.5655 19.1933 34.6701 17.7573L38.2749 13.0711C39.3794 11.6351 40 9.6876 40 7.65687C40 3.42809 37.363 0 34.1101 0C32.548 0 31.0499 0.8067 29.9453 2.24264L20.1867 14.9289Z" fill="#036666" />
                    </g>
                    <defs>
                        <clipPath id="clip0_2085_13645">
                            <rect width="40" height="20" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
                <h6 class="text-center mt-4"><strong>Daftar sekarang untuk menikmati berbagai <br> layanan dan fitur menarik dari kami</strong></h6>
            </div>
            <div class="text-center mt-5">
                <img src="{{ asset('frontend/assets/image/Group 807.png') }}" alt="">
                <h6 class="mt-4"><strong>Silahkan pilih peran anda</strong></h6>
            </div>
            <div class="row mt-4">
                <div class="col-6 text-end">
                    <button type="button" class="button-customer">Customer</button>

                </div>
                <div class="col-6">
                    <button type="button" class="button-trapis">Terapis</button>
                </div>
            </div>
            <div class="text-center mt-4">
                <p>Sudah punya akun? <a href="{{ route('customers.login') }}" class="link-success link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Login</a></p>
            </div>
        </div>
    </section>
    <script>
        //customers
        $(document).ready(function() {
            $('.button-customer').click(function() {
                var id = 'customer';
                window.location.href = "{{ url('register') }}" + '/' + id;
            });
        });
        //terapis
        $(document).ready(function() {
            $('.button-trapis').click(function() {
                var id = 'terapis';
                window.location.href = "{{ url('daftar') }}" + '/' + id;
            });
        });
    </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>