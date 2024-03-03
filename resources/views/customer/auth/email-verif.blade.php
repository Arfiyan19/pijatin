<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== META TAG ========== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('frontend/terapist/css/email-verif.css') }}">

    <title>Verifikasi Email</title>
</head>

<body>
    <div class="container">
        <div class="top">
            <img src="{{ asset('frontend/terapist/img/email-verif.png') }}" alt="">
            <h2>Verifikasi Email kamu!</h2>
            @if (session('success'))
            <h7 style="color: green;"> {{ session('success') }}</h7>
            @elseif(session('error'))
            <h7 style="color: red;"> {{ session('error') }}</h7>
            @endif
            <p>Masukkan 6 digit kode OTP yang dikirim ke email anda</p>
        </div>
        <form action="{{ url('/verification') }}" method="post">
            @csrf
            <div class="bottom">
                <div class="isian">
                    <input id="num1" type="number" placeholder="0" maxlength="1" required>
                    <input id="num2" type="number" placeholder="0" maxlength="1" required>
                    <input id="num3" type="number" placeholder="0" maxlength="1" required>
                    <input id="num4" type="number" placeholder="0" maxlength="1" required>
                    <p hidden>Combined Value: <span id="result">1</span></p>
                    <!-- Include SweetAlert CDN link (You can also download and host the library locally) -->

                    <div class="error"></div>
                </div>

                <div class="action">
                    <div class="timer" id="countdown">00:00</div>
                    <a href="{{ route('resendVerificationCode')}}">Kirim Ulang Kode</a>
                    <form action="{{ url('/verification') }}" method="post">
                        @csrf
                        <p hidden>Result Total: <span id="resultTotal"></span></p>
                        <input type="hidden" id="verification_code" name="verification_code">
                        <button class="buttonSubmit" type="submit">Selanjutnya</button>
                    </form>
                </div>
            </div>
        </form>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
        // Tentukan waktu akhir hitung mundur (dalam detik)
        const endTime = new Date().getTime() + 59000; // Contoh: 1 menit (60 detik)

        // Fungsi untuk mengupdate timer setiap detik
        function updateTimer() {
            const currentTime = new Date().getTime();
            const timeLeft = endTime - currentTime;

            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                document.getElementById("countdown").innerHTML = "Waktu habis!";
            } else {
                const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

                document.getElementById("countdown").innerHTML = `${minutes}:${seconds}`;
            }
        }

        // Pertama, panggil fungsi untuk menginisialisasi tampilan timer
        updateTimer();

        // Selanjutnya, atur interval untuk memperbarui timer setiap 1 detik
        const timerInterval = setInterval(updateTimer, 1000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Select all input fields
        const num1 = document.getElementById('num1');
        const num2 = document.getElementById('num2');
        const num3 = document.getElementById('num3');
        const num4 = document.getElementById('num4');

        // Select the element to display the combined value
        const resultElement = document.getElementById('result');
        const resultTotalElement = document.getElementById('resultTotal');
        const verification_code = document.getElementById('verification_code');


        // Function to update the combined value
        function updateCombinedValue() {
            const num1Value = num1.value;
            const num2Value = num2.value;
            const num3Value = num3.value;
            const num4Value = num4.value;

            // Check if all inputs are filled with numeric values
            if (num1Value !== '' && num2Value !== '' && num3Value !== '' && num4Value !== '') {
                const combinedValue = num1Value + num2Value + num3Value + num4Value;
                resultElement.textContent = combinedValue;
                resultTotalElement.textContent = combinedValue;
                verification_code.value = combinedValue; // Set the hidden input value

                // Check if all inputs are filled and display a SweetAlert popup
                // if (!isNaN(combinedValue)) {
                //     Swal.fire({
                //         icon: 'success',
                //         title: 'Semua elemen telah terisi!',
                //         text: 'Kode Anda: ' + combinedValue,
                //     });
                // }
            } else {
                resultElement.textContent = '1'; // Default value if not all inputs are filled
                resultTotalElement.textContent = ''; // Clear the total result if not all inputs are filled
            }
        }

        // Add input event listeners to all input fields
        num1.addEventListener('input', updateCombinedValue);
        num2.addEventListener('input', updateCombinedValue);
        num3.addEventListener('input', updateCombinedValue);
        num4.addEventListener('input', updateCombinedValue);

        // Initialize the combined value
        updateCombinedValue();
    </script>
</body>

</html>