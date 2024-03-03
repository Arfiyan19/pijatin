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
    <link rel="stylesheet" href="{{ asset('frontend/css/homeCustomer.css') }}">

    <!-- logo tittle bar -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }}">

    <title>Pijat.in</title>
</head>

<style>
    .input-txt {
        border: 1px solid var(--primary-primary-006, #56AB91);
        background: var(--neu-2-neu-2009, #FFF);
    }

    .button-batal {
        border-radius: 20px;
        border: 1px solid var(--primary-primary-005, #56AB91);
        color: #56AB91;
        display: inline-flex;
        background-color: #FFF;
        width: 145px;
        height: 35px;
        padding: 10px;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .button-simpan {
        border-radius: 20px;
        background: var(--primary-primary-005, #56AB91);
        display: flex;
        width: 145px;
        height: 35px;
        padding: 10px 0px;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .button-simpan:hover {
        background-color: #56AB91;
    }

    .button-batal:hover {
        background-color: #fff;
    }
</style>

<body>
    <div class="topbar">
        <div class="content">
            <div class="tittle">
                <a href="{{ route('alamat') }}"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                        <path d="M19.9492 25.9502L13.0492 19.0502C12.8992 18.9002 12.7932 18.7377 12.7312 18.5627C12.6682 18.3877 12.6367 18.2002 12.6367 18.0002C12.6367 17.8002 12.6682 17.6127 12.7312 17.4377C12.7932 17.2627 12.8992 17.1002 13.0492 16.9502L19.9492 10.0502C20.2242 9.77519 20.5742 9.6377 20.9992 9.6377C21.4242 9.6377 21.7742 9.77519 22.0492 10.0502C22.3242 10.3252 22.4617 10.6752 22.4617 11.1002C22.4617 11.5252 22.3242 11.8752 22.0492 12.1502L16.1992 18.0002L22.0492 23.8502C22.3242 24.1252 22.4617 24.4752 22.4617 24.9002C22.4617 25.3252 22.3242 25.6752 22.0492 25.9502C21.7742 26.2252 21.4242 26.3627 20.9992 26.3627C20.5742 26.3627 20.2242 26.2252 19.9492 25.9502Z" fill="white" />
                    </svg></a>
                <p>Tambah Alamat</p>
            </div>
        </div>
    </div>
    <div class="container-tambah">
        <div class="frame">
            <div class="txt">Lokasi</div>
            <div class="label">
                <div class="txt">Cari lokasi anda</div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <g clip-path="url(#clip0_2815_11027)">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.707 11.2932C15.8945 11.4807 15.9998 11.735 15.9998 12.0002C15.9998 12.2653 15.8945 12.5197 15.707 12.7072L10.05 18.3642C9.95776 18.4597 9.84742 18.5359 9.72541 18.5883C9.60341 18.6407 9.47219 18.6683 9.33941 18.6694C9.20663 18.6706 9.07495 18.6453 8.95205 18.595C8.82916 18.5447 8.7175 18.4705 8.62361 18.3766C8.52972 18.2827 8.45547 18.171 8.40519 18.0481C8.3549 17.9252 8.3296 17.7936 8.33076 17.6608C8.33191 17.528 8.3595 17.3968 8.41191 17.2748C8.46431 17.1528 8.5405 17.0424 8.63601 16.9502L13.586 12.0002L8.63601 7.05018C8.45385 6.86158 8.35305 6.60898 8.35533 6.34678C8.35761 6.08458 8.46278 5.83377 8.64819 5.64836C8.8336 5.46295 9.08441 5.35778 9.34661 5.35551C9.6088 5.35323 9.86141 5.45402 10.05 5.63618L15.707 11.2932Z" fill="black" />
                    </g>
                    <defs>
                        <clipPath id="clip0_2815_11027">
                            <rect width="24" height="24" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
            </div>
            <div class="mt-3">
                <div class="txt">Alamat Lengkap</div>
                <textarea class="form-control input-txt" id="exampleFormControlTextarea1" placeholder="Masukkan alamat lengkap anda" rows="5"></textarea>
            </div>
            <div class="row">
                <div class="col-6 text-end mt-5">
                    <button type="button" class="button-batal">Batal</button>
                </div>
                <div class="col-6 text-start mt-5">
                    <button type="button" class="button-simpan">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>