<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Therapist</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('frontend/terapist/css/register.css') }}">
     <!-- ======= logo tittle bar ====== -->
     <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
     <!-- ======= link lib. icon ====== -->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('frontend/terapist/img/logo.png') }}" alt=""> <!-- ======= Sampe sini, revisi directory ====== -->
            <h3>Selamat bergabung</h3>
            <p>Masukkan data diri anda</p>
        </div>

        <div class="content">
            <form id="form" method="post" action="" autocomplete="off" >


                <label for="nama" class="form-label">Nama lengkap<span>*</span></label>
                <div class="input-field">
                    <input type="text" class="form-input" id="nama" placeholder="min. 2 huruf" >
                    <div class="error"></div>
                </div>

                <label for="kota" class="form-label">Tempat lahir<span>*</span></label>
                <div class="input-field">
                    <input type="text" class="form-input" id="kota" placeholder="min. 2 huruf" >
                    <div class="error"></div>
                </div>

                <label for="lahir" class="form-label">Tanggal Lahir<span>*</span></label>
                <div class="input-field">
                    <input type="date" class="form-input" id="lahir"  >
                    <div class="error"></div>
                </div>

                <label for="kelamin" class="form-label">Jenis Kelamin<span>*</span></label>
                <div class="input-field radio">
                    <input type="radio" id="laki-laki" name="kelamin" value="laki-laki">
                    <label for="laki-laki">Laki-laki</label><br>
                    <input type="radio" id="perempuan" name="kelamin" value="perempuan">
                    <label for="perempuan">Perempuan</label><br>
                    <div class="error"></div>
                </div>

                <label for="email" class="form-label">Email<span>*</span></label>
                <div class="input-field">
                    <input type="email" class="form-input" id="email" placeholder="ex: XXX@gmail.com">
                    <div class="error"></div>
                </div>

                <label for="telp" class="form-label">No.telp<span>*</span></label>
                <div class="input-field">
                    <input type="text" class="form-input" id="telp" placeholder="no. telp" >
                    <div class="error"></div>
                </div>

                <label for="password" class="form-label">Password<span>*</span></label>
                <div class="input-field">
                    <input type="password" class="form-input" id="password" placeholder="angka dan huruf"><span></span>
                    <img src="{{ asset('frontend/terapist/img/eye-close.png') }}" id="eyeicon">
                    <div class="error"></div>
                </div>

                <label for="password2" class="form-label">Konfirmasi Password<span>*</span></label>
                <div class="input-field">
                    <input type="password" class="form-input" id="password2" placeholder="sesuaikan Password">
                    <div class="error"></div>
                </div>


                <div class="daftar">
                    <button type="submit">Daftar</button>
                </div>
            </form>
        </div>

        <div class="footer">
            <p>Anda sudah punya akun?</p>
            <a href="http://127.0.0.1:8000/terapis/login-terapis">Masuk </a>
        </div>
    </div>

    <script>
        // ============== SHOW/HIDE PASSWORD ==============
        let eyeicon = document.getElementById("eyeicon");
        let shpassword = document.getElementById("password");
        let shpassword2 = document.getElementById("password2");

        eyeicon.onclick = function() {
            if (password.type == "password") {
                password.type = "text";
                eyeicon.src   = "{{ asset('frontend/terapist/img/eye-open.png') }}";
                password2.type = "text";
            }
            else {password.type = "password";
                // eyeicon.src   = "css/eye-close.png";
                eyeicon.src   = "{{ asset('frontend/terapist/img/eye-close.png') }}";
                password2.type = "password";
            }
        }

        // ============== form validation ==============
        const form = document.getElementById('form');
        const nama = document.getElementById('nama');
        const telp = document.getElementById('telp');
        const email = document.getElementById('email');
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

        const isValidEmail = email => {
            const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

        const validateInputs = () => {
            const namaValue = nama.value.trim();
            const telpValue = telp.value.trim();
            const emailValue = email.value.trim();
            const passwordValue = password.value.trim();
            const password2Value = password2.value.trim();

            if(namaValue === '') {
                setError(nama, 'nama wajib diisi');
            } else {
                setSuccess(nama);
            }

            if(emailValue === '') {
                setError(email, 'Email wajib diisi');
            } else if (!isValidEmail(emailValue)) {
                setError(email, 'email tidak valid');
            } else {
                setSuccess(email);
            }

            if(telpValue === '') {
                setError(telp, 'telp wajib diisi');
            } else if (telpValue.length < 10 ) {
                setError(telp, 'min.10-13 angka')
            } else {
                setSuccess(telp);
            }

            if(passwordValue === '') {
                setError(password, 'Password wajib diisi');
            } else if (passwordValue.length < 8 ) {
                setError(password, 'Password min.8 karakter.')
            } else {
                setSuccess(password);
            }

            if(password2Value === '') {
                setError(password2, 'konfirmasi password anda');
            } else if (password2Value !== passwordValue) {
                setError(password2, "Passwords tidak sesuai");
            } else {
                setSuccess(password2);
            }

        };
    </script>
</body>
</html>
