<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ========== META TAG ========== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('frontend/terapist/css/lupa-sandi2.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="http://127.0.0.1:8000/frontend/assets/image/logo-70.png">
    <title>Lupa Sandi</title>
    <!-- ======= link lib. icon ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="backbtn">
            <a href="http://127.0.0.1:8000/terapis/lupa-sandi">
                <i class="material-icons" style="font-size:36px">chevron_left</i>
            </a>
        </div>
        <div class="top">
            <img src="{{ asset('frontend/terapist/img/logo.png') }}" alt="">
            <h2>Verifikasi lupa kata sandi</h2>
            <p>Masukkan 4 digit kode OTP yang dikirim ke email anda</p>
        </div>

        <div class="bottom">
            <div class="isian">
                <input type="number"  maxlength="1">
                <input type="number"  maxlength="1">
                <input type="number"  maxlength="1">
                <input type="number"  maxlength="1">

                <div class="error"></div>
            </div>

            <div class="action">
                <div class="timer" id="countdown">00:00</div>
                <a href="">Kirim Ulang Kode</a>
                <button type="submit">Selanjutnya</button>
            </div>
        </div>
    </div>

<script>
    // ========= COUNTDOWN =========
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

    const inputs = document.querySelectorAll("input"),
    button = document.querySelector("button");

    // ========= memisahkan 4 input kode OTP =========
    inputs.forEach((input, index1) => {
        input.addEventListener("keyup", (e) => {
            // Menangkap element input dan disimpan di variabel currentinput
            const currentInput = input,
            // This code gets the next sibling element of the current input element and stores it in the nextInput variable
            nextInput = input.nextElementSibling,
            // This code gets the previous sibling element of the current input element and stores it in the prevInput variable
            prevInput = input.previousElementSibling;
            // if the value has more than one character then clear it
            if (currentInput.value.length > 1) {
                currentInput.value = "";
                return;
            }
            // if the next input is disabled and the current value is not empty
            //  enable the next input and focus on it
            if (nextInput && nextInput.hasAttribute("disabled") && currentInput.value !== "") {
                nextInput.removeAttribute("disabled");
                nextInput.focus();
            }
            // if the backspace key is pressed
            if (e.key === "Backspace") {
                // iterate over all inputs again
                inputs.forEach((input, index2) => {
                    // if the index1 of the current input is less than or equal to the index2 of the input in the outer loop
                    // and the previous element exists, set the disabled attribute on the input and focus on the previous element
                    if (index1 <= index2 && prevInput) {
                        input.setAttribute("disabled", true);
                        input.value = "";
                        prevInput.focus();
                    }
                });
            }
            //if the fourth input( which index number is 3) is not empty and has not disable attribute then
            //add active class if not then remove the active class.
            if (!inputs[3].disabled && inputs[3].value !== "") {
                button.classList.add("active");
                return;
            }
            button.classList.remove("active");
        });
    });
    //focus the first input which index is 0 on window load
    window.addEventListener("load", () => inputs[0].focus());
</script>
</body>
</html>
