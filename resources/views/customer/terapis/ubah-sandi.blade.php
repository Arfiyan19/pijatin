<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ========== META TAG ========== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ubah Sandi</title>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('frontend/terapist/css/ubah-sandi.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="http://127.0.0.1:8000/frontend/assets/image/logo-70.png">
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
        <div class="top">
            <img src="{{ asset('frontend/terapist/img/logo.png') }}" alt="">
            <h2>Ubah katasandi!</h2>
            <p>Silahkan masukkan email anda untuk menerima code verifikasi</p>
        </div>

        <div class="form" id="form">
            <div class="isian">
                <label for="email">Masukkan email anda!<span>*</span></label>
                <input type="email" id="email" placeholder="contoh@mail.com" >
                <div class="error"></div>
            </div>
            <div class="submit">
                {{-- <a href="http://127.0.0.1:8000/terapis/ubah-sandi2">
                    <button type="submit" >Selanjutanya</button>
                </a> --}}
                {{-- <button type="submit" onclick="window.location.href='/terapis/ubah-sandi2';">Selanjutnya</button> --}}
                <button type="submit" onclick="checking()">Selanjutnya</button>
                {{-- <button type="submit">Selanjutnya</button> --}}
            </div>
        </div>
    </div>

<script>
    function checking(){
        //========== PILIH SALAH SATU: FUNGSI 1 ==========
        // var email= document.getElementById("email").value;

        // if (email==''){
        //     alert("harap isi");
        // }else{
        //     window.location.href('http://127.0.0.1:8000/terapis/ubah-sandi2')
        // }

        //========== FUNGSI 2 ==========
        const email = document.getElementById('email');

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
            window.location.href('http://127.0.0.1:8000/terapis/ubah-sandi2');
        };

        const isValidEmail = email => {
            const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

        const emailValue = email.value.trim();

        if(emailValue === '') {
            setError(email, 'Email wajib diisi');
        } else if (!isValidEmail(emailValue)) {
            setError(email, 'email tidak valid');
        } else {
            setSuccess(email);

        }
    }
</script>
</body>
</html>

