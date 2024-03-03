<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Therapist</title>
    <!-- =========style========= -->
    <link rel="stylesheet" href="{{ asset('frontend/terapist/css/login.css') }}">
</head>
<body>
    <div class="background">
        <img src="{{ asset('frontend/terapist/img/background.jpg') }}" alt="">

    </div>

    <div class="container">
        <div class="header">
            <div class="sambutan">
                <h3>Selamat datang!</h3>
                <img src="{{ asset('frontend/terapist/img/logo-login.png') }}" alt="">
            </div>
        </div>

        <form id="form" method="post" action="">
            <label for="email" class="form-label">Email<span>*</span></label>
            <div class="input-field">
                <input type="email" class="form-input" id="email" placeholder="contoh@mail.com" >
                <div class="error"></div>
            </div>

            <label for="password" class="form-label">Password<span>*</span></label>
            <div class="input-field">
                <input type="password" id="password" placeholder="angka dan huruf" >
                <div class="error"></div>
                <img src="{{ asset('frontend/terapist/img/eye-close.png') }}" id="eyeicon">

            </div>

            <div class="lupasandi">
                <a href="#">Lupa kata sandi?</a>
            </div>

            <div class="masuk">
                <button type="submit">Masuk</button>
            </div>
        </form>

        <div class="footer">
            <p>Belum punya akun? </p>
            <a href="http://127.0.0.1:8000/terapis/register-terapis">Daftar</a>

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
            }
            else {password.type = "password";
                eyeicon.src   = "{{ asset('frontend/terapist/img/eye-close.png') }}";

            }
        }

        // ============== FORM VALIDATION ==============
        const form = document.getElementById('form');
        const email = document.getElementById('email');
        const password = document.getElementById('password');

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
            const emailValue = email.value.trim();
            const passwordValue = password.value.trim();

            if(emailValue === '') {
                setError(email, 'Email wajib diisi');
            } else if (!isValidEmail(emailValue)) {
                setError(email, 'email tidak valid');
            } else {
                setSuccess(email);
            }

            if(passwordValue === '') {
                setError(password, 'Password wajib diisi');
            } else if (passwordValue.length < 8 ) {
                setError(password, 'Password min.8 karakter.')
            } else {
                setSuccess(password);
            }

        };
    </script>

</body>
</html>
