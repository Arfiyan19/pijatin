<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ubah sandi</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('frontend/terapist/css/ubah-sandi3.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
    <!-- ======= link lib. icon ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="backbtn">
            <a href="http://127.0.0.1:8000/terapis/ubah-sandi2">
                <i class="material-icons" style="font-size:36px">chevron_left</i>
            </a>
        </div>
        <div class="header">

            <img src="{{ asset('frontend/terapist/img/logo.png') }}" alt="">
            <!-- ======= Sampe sini, revisi directory ====== -->
            <h2>Ubah sandi</h2>
            <p>Masukkan kata sandi baru anda (minimal 8 digit)</p>
        </div>

        <div class="content">
            <form id="form" method="post" action="" autocomplete="off">

                <label for="password" class="form-label">Kata sandi baru<span>*</span></label>
                <div class="input-field">
                    <input type="password" id="password" placeholder="angka dan huruf">
                    <img src="{{ asset('frontend/terapist/img/eye-close.png') }}" id="eyeicon">
                    <div class="error"></div>
                </div>

                <label for="password2" class="form-label">Konfirmasi kata sandi baru<span>*</span></label>
                <div class="input-field">
                    <input type="password" id="password2" placeholder="sesuaikan Password">
                    <div class="error"></div>
                </div>

                <div class="daftar">
                    <button type="submit" onclick="openpopup()">Simpan</button>
                </div>
            </form>
        </div>

        <div class="popup" id="popup">
            <div class="centang">
                <img src="{{ asset('frontend/terapist/img/berhasil.png') }}" alt="">
            </div>
            <div class="pesan">
                <h4>Katasandi berhasil diubah</h4>
                <a href="http://127.0.0.1:8000/terapis/pengaturan-profile">
                    <button type="button">Kembali</button></a>
            </div>
        </div>

    </div>
    <script>
        // ============== SHOW/HIDE PASSWORD ==============
        let eyeicon = document.getElementById("eyeicon");
        let shpassword = document.getElementById("password");
        let shpassword2 = document.getElementById("password2");

        <
        div class = "popup"
        id = "popup" >
            <
            div class = "centang" >
            <
            img src = "{{ asset('frontend/terapist/img/berhasil.png') }}"
        alt = "" >
            <
            /div> <
        div class = "pesan" >
        <
        h4 > Katasandi berhasil diubah < /h4> <
        a href = "http://127.0.0.1:8000/terapis/pengaturan-profile" >
            <
            button type = "button" > Kembali < /button></a >
            <
            /div> < /
            div >

            <
            /div> <
        script >
            // ============== SHOW/HIDE PASSWORD ==============
            let eyeicon = document.getElementById("eyeicon");
        let shpassword = document.getElementById("password");
        let shpassword2 = document.getElementById("password2");

        eyeicon.onclick = function() {
            if (password.type == "password") {
                password.type = "text";
                eyeicon.src = "{{ asset('frontend/terapist/img/eye-open.png') }}";
                password2.type = "text";
            } else {
                password.type = "password";
                eyeicon.src = "{{ asset('frontend/terapist/img/eye-close.png') }}";
                password2.type = "password";
            }
        }

        // ============== form validation ==============
        const form = document.getElementById('form');
        const password = document.getElementById('password');
        const password2 = document.getElementById('password2');

        form.addEventListener('submit', e => {
            e.preventDefault();

            validateInputs();
        });

        const setError = (element, message) => {
            const inputControl = element.parentElement;
            const errorDisplay = inputControl.querySelector('.error');

            errorDisplay.innerText = message;
            inputControl.classList.add('error');
            inputControl.classList.remove('success');
        }

        const setSuccess = element => {
            const inputControl = element.parentElement;
            const errorDisplay = inputControl.querySelector('.error');

            errorDisplay.innerText = '';
            inputControl.classList.add('success');
            inputControl.classList.remove('error');
        };

        const validateInputs = () => {
            const passwordValue = password.value.trim();
            const password2Value = password2.value.trim();

            if (passwordValue === '') {
                setError(password, 'sandi wajib diisi');
            } else if (passwordValue.length < 8) {
                setError(password, 'sandi min.8 karakter.')
            } else {
                setSuccess(password);
            }

            if (password2Value === '') {
                setError(password2, 'konfirmasi sandi anda');
            } else if (password2Value !== passwordValue) {
                setError(password2, "sandi tidak sesuai");
            } else {
                setSuccess(password2);
            }

        };
        // ============== NOTIF BERHASIL GANTI PASSWORD ==============
        let popup = document.getElementById("popup");

        function openpopup() {
            popup.classList.add("open-popup");
        }

        function closepopup() {
            popup.classList.remove("open-popup");
        }
    </script>
