<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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

<body>
    <div class="topbar">
        <div class="content">
            <div class="tittle">
                <a href="{{ route('notifcustomer') }}"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                        <path d="M19.9492 25.9502L13.0492 19.0502C12.8992 18.9002 12.7932 18.7377 12.7312 18.5627C12.6682 18.3877 12.6367 18.2002 12.6367 18.0002C12.6367 17.8002 12.6682 17.6127 12.7312 17.4377C12.7932 17.2627 12.8992 17.1002 13.0492 16.9502L19.9492 10.0502C20.2242 9.77519 20.5742 9.6377 20.9992 9.6377C21.4242 9.6377 21.7742 9.77519 22.0492 10.0502C22.3242 10.3252 22.4617 10.6752 22.4617 11.1002C22.4617 11.5252 22.3242 11.8752 22.0492 12.1502L16.1992 18.0002L22.0492 23.8502C22.3242 24.1252 22.4617 24.4752 22.4617 24.9002C22.4617 25.3252 22.3242 25.6752 22.0492 25.9502C21.7742 26.2252 21.4242 26.3627 20.9992 26.3627C20.5742 26.3627 20.2242 26.2252 19.9492 25.9502Z" fill="white" />
                    </svg></a>
                <p>Pengembalian dana</p>
            </div>
        </div>
    </div>


    <div class="container-refund">
        <div class="info">
            <div class="head">Informasi</div>
            <div class="content">Kami sampaikan kepada pelanggan setia kami pengembalian atas pengajuan pembatalan yang anda sudah selesai kami proses harap mengecek daftar pesan masuk email anda
            </div>
        </div>

        <div class="card-refund">
            <table>
                <thead>
                    <tr>
                        <td>Pengembalian dana</td>
                    </tr>
                    <tr>
                        <td>Jumlah Pemesan</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Pria</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>Wanita</td>
                        <td>1</td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <td>Detail Pesanan</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ID Pesanan</td>
                        <td>03262548PL</td>
                    </tr>
                    <tr>
                        <td>Metode Pembayaran</td>
                        <td>BCA Virtual Account</td>
                    </tr>
                    <tr>
                        <td>Body Massager</td>
                        <td>x 3 <br>
                            Rp 300.000</td>
                    </tr>
                    <tr>
                        <td>Kerokan</td>
                        <td>x 1 <br>
                            Rp 50.000</td>
                    </tr>
                    <tr>
                        <td>Lulur</td>
                        <td>x 2 <br>
                            Rp 100.000</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #000;"></tr>
                    <tr>
                        <td>Total Pembayaran</td>
                        <td>Rp 450.000</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><span class="status lunas">Lunas</span></td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <td>Rekening yang dituju</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nama penerima</td>
                        <td>Supriadi Jalaludin</td>
                    </tr>
                    <tr>
                        <td>No Rekening </td>
                        <td>133117493559</td>
                    </tr>
                    <tr>
                        <td>Nama Bank </td>
                        <td>BCA</td>
                    </tr>
                    <tr>
                        <td>Tanggal Pengembalian</td>
                        <td>12/03/2023</td>
                    </tr>
                    <tr>
                        <td>Nominal</td>
                        <td>Rp 450.000</td>
                    </tr>
                    <tr>
                        <td>Denda 20%</td>
                        <td>Rp 90.000</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #000;"></tr>
                    <tr>
                        <td>Total</td>
                        <td>Rp 360.000</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><span class="status lunas">Berhasil</span></td>
                    </tr>
                </tbody>

            </table>

        </div>
        @if(auth()->check() == false)
        <button><a href="{{ route('notifcustomer') }}">Kembali</a></button>
        @elseif(auth()->check() == true)
        <button><a href="{{ route('customers.notifikasi') }}">Kembali</a></button>

        @endif
    </div>





</body>

</html>