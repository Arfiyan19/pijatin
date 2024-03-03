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
    <link rel="stylesheet" href="{{ asset('frontend/css/verifikasi.css') }}">

    <!-- logo tittle bar -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }}">
    <title>Pijat.in</title>
</head>

<style>
    .login-form {
        padding: 20px;
        margin-top: 20px;
        color: #000;
        font-family: Poppins;
        font-size: 14px;
    }

    .login-form .form-group {
        margin-bottom: 20px;
    }

    .login-form label {
        margin-bottom: 10px;
        margin-left: 10px;
    }

    .login-form input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 2px solid #ddd;
        border-radius: 100px;
        border-color: #56AB91;
    }

    .text-center a {
        color: red;
        text-decoration: none;
    }

    .text-center button {
        margin-top: 32px;
        border-radius: 20px;
        background: var(--primary-primary-006, #56ab91);
        width: 145px;
        height: 35px;
        justify-content: center;
        align-items: center;
        color: white;
        border: none;
    }

    .pin-input {
        border-radius: 10px;
        border: 1px solid var(--primary-primary-005, #56ab91);
        background: var(--neu-2-neu-2009, #fff);
        width: 45px;
        height: 45px;
        color: #000;
        text-align: center;

        font-family: Poppins;
        font-style: normal;
        line-height: normal;
        letter-spacing: -0.72px;
    }
</style>

<body>
    <section>
        <div class="container">
            <div class="row">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="21" viewBox="0 0 40 21" fill="none" class="mt-5">
                    <g clip-path="url(#clip0_2132_27867)">
                        <path d="M9.49472 0.5C7.93262 0.5 6.43451 1.3067 5.32995 2.74264L1.72511 7.42893C0.620539 8.86487 0 10.8124 0 12.8431C0 17.0719 2.637 20.5 5.8899 20.5C7.452 20.5 8.9501 19.6933 10.0547 18.2573L12.5482 15.0158C12.5482 15.0157 12.5482 15.0159 12.5482 15.0158L19.8133 5.57107C20.3409 4.88527 21.0564 4.5 21.8024 4.5C23.0514 4.5 24.1104 5.55827 24.4775 7.02271L26.7704 4.04197C25.7244 1.91223 23.8903 0.5 21.8024 0.5C20.2403 0.5 18.7422 1.3067 17.6376 2.74264L7.87897 15.4289C7.35144 16.1147 6.63595 16.5 5.8899 16.5C4.33633 16.5 3.07692 14.8628 3.07692 12.8431C3.07692 11.8733 3.37329 10.9431 3.90082 10.2573L7.50564 5.57107C8.03318 4.88527 8.74867 4.5 9.49472 4.5C10.7438 4.5 11.8027 5.55832 12.1698 7.02281L14.4627 4.04205C13.4167 1.91227 11.5826 0.5 9.49472 0.5Z" fill="#036666" />
                        <path d="M20.1867 15.4289C19.6591 16.1147 18.9437 16.5 18.1976 16.5C16.9487 16.5 15.8899 15.442 15.5227 13.9778L13.2299 16.9585C14.2759 19.0879 16.1099 20.5 18.1976 20.5C19.7597 20.5 21.2578 19.6933 22.3624 18.2573L32.121 5.57107C32.6486 4.88527 33.3641 4.5 34.1101 4.5C35.6637 4.5 36.9231 6.13723 36.9231 8.15687C36.9231 9.12673 36.6267 10.0569 36.0992 10.7427L32.4944 15.4289C31.9668 16.1147 31.2513 16.5 30.5053 16.5C29.2563 16.5 28.1974 15.4418 27.8303 13.9775L25.5374 16.9582C26.5834 19.0879 28.4175 20.5 30.5053 20.5C32.0674 20.5 33.5655 19.6933 34.6701 18.2573L38.2749 13.5711C39.3794 12.1351 40 10.1876 40 8.15687C40 3.92809 37.363 0.5 34.1101 0.5C32.548 0.5 31.0499 1.3067 29.9453 2.74264L20.1867 15.4289Z" fill="#036666" />
                    </g>
                    <defs>
                        <clipPath id="clip0_2132_27867">
                            <rect width="40" height="20" fill="white" transform="translate(0 0.5)" />
                        </clipPath>
                    </defs>
                </svg>
                <h5 class="text-center mt-3">Lupa kata sandi</h5>
                <p class="text-center mt-4">Cek pesan masuk email anda <br>
                    kami mengirim kode verifikasi yang <br> berjumlah 6 digit</p>
            </div>
            <div class="d-flex justify-content-center mt-4" id="pinContainer">
                <!-- Use a data-index attribute to keep track of the input index -->
                <input type="text" class="pin-input me-3" maxlength="1" data-index="0" pattern="[a-zA-Z]">
                <input type="text" class="pin-input me-3" maxlength="1" data-index="1">
                <input type="text" class="pin-input me-3" maxlength="1" data-index="2">
                <input type="text" class="pin-input me-3" maxlength="1" data-index="3">
                <input type="text" class="pin-input me-3" maxlength="1" data-index="4">
                <input type="text" class="pin-input me-3" maxlength="1" data-index="5">
            </div>
            <div class="text-center mt-5">
                <div class="countdown-timer mb-3" id="countdown"></div>
                <a href="#">Kirim Ulang Kode</a>
            </div>
            <div class="text-center">
                <button type="submit">Selanjutnya</button>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
        // Add your JavaScript logic here
        document.addEventListener('DOMContentLoaded', function() {
            const pinInputs = document.querySelectorAll('.pin-input');
            const submitBtn = document.getElementById('submitBtn');
            const resendCodeLink = document.getElementById('resendCode');

            pinInputs.forEach(input => {
                input.addEventListener('input', function() {
                    // Move to the next input field after entering a digit
                    const nextIndex = parseInt(this.getAttribute('data-index')) + 1;
                    if (nextIndex < pinInputs.length) {
                        pinInputs[nextIndex].focus();
                    }
                });
            });

            submitBtn.addEventListener('click', function() {
                // Validate the entered PIN (you can add your validation logic here)
                const enteredPin = Array.from(pinInputs).map(input => input.value).join('');
                if (enteredPin.length === 6) {
                    // PIN is valid, you can proceed with further actions
                    alert('PIN is valid! Proceed to the next step.');
                } else {
                    alert('Please enter a 6-digit PIN.');
                }
            });

            resendCodeLink.addEventListener('click', function(e) {
                e.preventDefault();
                // Add logic to resend the verification code
                alert('Resending verification code...');
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set the countdown time to 1 minute (60 seconds)
            let countdownTime = 60;

            // Function to update the countdown timer
            function updateCountdown() {
                const countdownElement = document.getElementById('countdown');
                const minutes = Math.floor(countdownTime / 60);
                const seconds = countdownTime % 60;

                // Format the time as MM:SS
                const formattedTime = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

                // Update the countdown element
                countdownElement.textContent = formattedTime;

                // Decrease the countdown time
                countdownTime--;

                // Check if the countdown has reached zero
                if (countdownTime < 0) {
                    clearInterval(countdownInterval);
                    countdownElement.textContent = 'Time Expired!';
                }
            }

            // Initial update
            updateCountdown();

            // Update the countdown every second
            const countdownInterval = setInterval(updateCountdown, 1000);
        });
    </script>
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