<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('finance/css/loginstyle.css') }}">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="frame"></div>
            <div class="frame2"></div>
            <div class="rectangle">
                <img src="{{ asset('frontend/assets/image/kotak.png') }}" alt="">
            </div>
            <div class="bg">
                <img src="{{ asset('frontend/assets/image/bg.png') }}" alt="">
            </div>
            <div class="icon">
                <img src="{{ asset('frontend/assets/image/logo-70.png') }}" alt="">
            </div>
            <div class="tit">Tim Finance</div>
            <div class="login-form">
                <div class="logo">
                    <!-- \frontend\assets\image -->
                    <img src="{{ asset('frontend/assets/image/logo-70.png') }}" alt="">
                </div>
                <div class="text">Semangat kerja dengan baik dan jujur</div>
                <div class="card">
                    <div class="username">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="pass">
                        <label for="password" class="form-label">Kata sandi</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <div class="btn">
                        <a href="{{route('keuangan')}}"><button class="btn btn-primary">Masuk</button></a>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- =========== Scripts =========  -->
    <script src="{{ asset('finance/js/main.js') }}"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>