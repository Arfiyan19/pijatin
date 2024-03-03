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
                <a href="{{ route('riwayatcustomer') }}"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                        <path d="M19.9492 25.9502L13.0492 19.0502C12.8992 18.9002 12.7932 18.7377 12.7312 18.5627C12.6682 18.3877 12.6367 18.2002 12.6367 18.0002C12.6367 17.8002 12.6682 17.6127 12.7312 17.4377C12.7932 17.2627 12.8992 17.1002 13.0492 16.9502L19.9492 10.0502C20.2242 9.77519 20.5742 9.6377 20.9992 9.6377C21.4242 9.6377 21.7742 9.77519 22.0492 10.0502C22.3242 10.3252 22.4617 10.6752 22.4617 11.1002C22.4617 11.5252 22.3242 11.8752 22.0492 12.1502L16.1992 18.0002L22.0492 23.8502C22.3242 24.1252 22.4617 24.4752 22.4617 24.9002C22.4617 25.3252 22.3242 25.6752 22.0492 25.9502C21.7742 26.2252 21.4242 26.3627 20.9992 26.3627C20.5742 26.3627 20.2242 26.2252 19.9492 25.9502Z" fill="white" />
                    </svg></a>
                <p>Detail Riwayat</p>
            </div>
        </div>
    </div>


    <div class="container-detailriwayat">
        <div class="rectangle">

            <div class="parent-detail">
                <div class="txt-id">Id pesanan : AV06798</div>
                <div class="card-detail">
                    <div class="head-detail">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="20" viewBox="0 0 40 20" fill="none">
                            <g clip-path="url(#clip0_4038_9191)">
                                <path d="M9.49472 0C7.93262 0 6.43451 0.8067 5.32995 2.24264L1.72511 6.92893C0.620539 8.36487 0 10.3124 0 12.3431C0 16.5719 2.637 20 5.8899 20C7.452 20 8.9501 19.1933 10.0547 17.7573L12.5482 14.5158C12.5482 14.5157 12.5482 14.5159 12.5482 14.5158L19.8133 5.07107C20.3409 4.38527 21.0564 4 21.8024 4C23.0514 4 24.1104 5.05827 24.4775 6.52271L26.7704 3.54197C25.7244 1.41223 23.8903 0 21.8024 0C20.2403 0 18.7422 0.8067 17.6376 2.24264L7.87897 14.9289C7.35144 15.6147 6.63595 16 5.8899 16C4.33633 16 3.07692 14.3628 3.07692 12.3431C3.07692 11.3733 3.37329 10.4431 3.90082 9.75733L7.50564 5.07107C8.03318 4.38527 8.74867 4 9.49472 4C10.7438 4 11.8027 5.05832 12.1698 6.52281L14.4627 3.54205C13.4167 1.41227 11.5826 0 9.49472 0Z" fill="#036666" />
                                <path d="M20.1873 14.9289C19.6597 15.6147 18.9443 16 18.1982 16C16.9493 16 15.8905 14.942 15.5233 13.4778L13.2305 16.4585C14.2765 18.5879 16.1105 20 18.1982 20C19.7603 20 21.2584 19.1933 22.363 17.7573L32.1216 5.07107C32.6492 4.38527 33.3647 4 34.1107 4C35.6643 4 36.9237 5.63723 36.9237 7.65687C36.9237 8.62673 36.6273 9.55687 36.0998 10.2427L32.495 14.9289C31.9674 15.6147 31.252 16 30.5059 16C29.2569 16 28.1981 14.9418 27.8309 13.4775L25.5381 16.4582C26.5841 18.5879 28.4181 20 30.5059 20C32.068 20 33.5661 19.1933 34.6707 17.7573L38.2755 13.0711C39.3801 11.6351 40.0006 9.6876 40.0006 7.65687C40.0006 3.42809 37.3636 0 34.1107 0C32.5486 0 31.0505 0.8067 29.946 2.24264L20.1873 14.9289Z" fill="#036666" />
                            </g>
                            <defs>
                                <clipPath id="clip0_4038_9191">
                                    <rect width="40" height="20" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <span class="status lunas">Selesai</span>

                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Pesanan sudah kami jadwalkan</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Anda sudah melunasi tagihan</td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <td>Terapis</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>Ahmad Murjoko</td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <td>Alamat Utama</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Karangjambe, Gg. Arjuna No.59, Jaranan, Banguntapan, Kec. Banguntapan, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55198</td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <td>Jumlah pemesan</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Pria</td>
                                <td>1</td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <td>Jadwal Pesanan</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>Supriadi Jalaludin</td>
                            </tr>
                            <tr>
                                <td>Tanggal Pemesanan</td>
                                <td>20/12/2023</td>
                            </tr>
                            <tr>
                                <td>Jadwal Pemesanan</td>
                                <td>27/12/2023</td>
                            </tr>
                            <tr>
                                <td>Jam</td>
                                <td>07:00 - 08.30</td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <td>Detail Pembayaran</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Metode Pembayaran</td>
                                <td>Transfer</td>
                            </tr>
                            <tr>
                                <td>Full Body Massage </td>
                                <td>x 1</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Rp 100.000</td>
                            </tr>
                            <tr>
                                <td>Kerokan </td>
                                <td>x 1</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Rp 50.000</td>
                            </tr>
                            <tr style="border-bottom: 1px solid #000;">
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>Rp 150.000</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><span class="status lunas">Lunas</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="btn"><a href="{{ route('ulasancustomer') }}" style="text-decoration: none;">Beri Ulasan</a></button>

            </div>
        </div>





</body>

</html>