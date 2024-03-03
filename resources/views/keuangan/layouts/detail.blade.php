<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('finance/css/detail.css') }}">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">

        <!-- ========================= Main ==================== -->
        @yield('content')
        <div class="jobs">

        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="{{ asset('finance/js/main.js') }}"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
