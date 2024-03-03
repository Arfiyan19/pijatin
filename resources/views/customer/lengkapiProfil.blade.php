<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
    body {
        font-family: "Poppins", sans-serif;
        background-color: #f2fef6;
    }

    .button-customer {
        border-radius: 20px;
        border: 1.5px solid var(--primary-primary-006, #56AB91);
        width: 145px;
        color: #56AB91;
        height: 35px;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .button-trapis {
        border-radius: 20px;
        color: white;
        background: var(--primary-primary-005, #56AB91);
        display: flex;
        border: transparent;
        width: 145px;
        height: 35px;
        padding: 10px;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .img-lengkapiProfil {
        margin-top: 117px;
    }
</style>

<body>
    <section>
        <div class="container">
            <div class="text-center img-lengkapiProfil">
                <img src="{{ asset('frontend/assets/image/Group 1000001855.png') }}" alt="">
                <h6 class="text-center mt-5"><strong>Apakah anda ingin melengkapi profil <br>
                        anda terlebih dahulu ?</strong></h6>
            </div>
            <div class="row mt-4">
                <div class="col-6 text-end">
                    <button type="button" class="button-customer">Tidak</button>
                </div>
                <div class="col-6">
                    <button type="button" class="button-trapis">Iya</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

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