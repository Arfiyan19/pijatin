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
            <p>Masukkan 4 digit kode OTP yang dikirim ke email anda</p>
        </div>

        <div class="bottom">
            <div class="isian">
                <input type="number" placeholder="0" maxlength="1">
                <input type="number" placeholder="0" maxlength="1">
                <input type="number" placeholder="0" maxlength="1">
                <input type="number" placeholder="0" maxlength="1">

                <div class="error"></div>
            </div>

            <div class="action">
                <div class="timer" id="countdown">00:00</div>
                <a href="">Kirim Ulang Kode</a>
                <button type="submit">Selanjutnya</button>
            </div>
        </div>
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

</body>
</html>
