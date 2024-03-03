<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('finance/css/detailterapis.css') }}">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">

                <div class="logo">
                    <span class="icon">
                        <img src="{{ asset('frontend/assets/image/logo-70.png') }}" alt="">
                    </span>
                </div>

                <div class="notifikasi">
                    <div class="col">
                        <ion-icon name="notifications-sharp"></ion-icon>
                    </div>
                    <div class="col">
                        <div class="user">
                            <img src="{{ asset('finance/imgs/customer01.jpg') }}" alt="">
                        </div>
                    </div>
                </div>

            </div>

            <div class="cardMain">
                <div class="card">
                    @foreach ($data as $profile)
                        <div class="pp">
                            <div class="icon">
                                <a href="{{ route('terapis') }}"><ion-icon name="chevron-back"></ion-icon></a>
                            </div>
                            <div class="prof">
                                <div class="users">
                                    <img src="{{ asset('finance/imgs/customer01.jpg') }}" alt="">
                                </div>
                                <div class="caption">
                                    <p>{{ $profile->nama }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="form1">
                            <div class="space">
                            </div>
                            <div class="formUsername">
                                <!-- <label for="username" class="username">ID</label> -->
                                <div class="konten">ID : TP-{{ $profile->id }}</div>
                            </div>
                            <div class="formEmail">
                                <!-- <label for="username" class="username">Email</label> -->
                                <div class="konten">Email : {{ $profile->user->email }}</div>
                            </div>
                            <div class="formNama">
                                <!-- <label for="username" class="username">Ponsel</label> -->
                                <div class="konten">Ponsel : {{ $profile->no_hp }}</div>
                            </div>
                            @foreach ($profile->user->alamat as $alamat)
                                @if ($profile->user->id == $alamat->user_id)
                                    <div class="formNama">
                                        <!-- <label for="username" class="username">Alamat</label> -->
                                        <div class="konten">Alamat : {{ $alamat->kota . ', ' . $alamat->provinsi }}
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="form1">
                            <div class="space">
                            </div>
                            <div class="formUsername">
                                <!-- <label for="username" class="username">NIK</label> -->
                                <div class="konten">NIK : {{ $profile->nik }}</div>
                            </div>
                            <div class="formEmail">
                                <!-- <label for="username" class="username">Nama Lengkap</label> -->
                                <div class="konten">Nama Lengkap : {{ $profile->nama }}</div>
                            </div>
                            <div class="formNama">
                                <!-- <label for="username" class="username">Tanggal Lahir</label> -->
                                <div class="konten">Tanggal Lahir :
                                    {{ date('d F Y', strtotime($profile->tanggal_lahir)) }}</div>
                            </div>
                            <div class="formNama">
                                <!-- <label for="username" class="username">Jenis Kelamin</label> -->
                                @if ($profile->jenis_kelamin == 'L')
                                    <div class="konten">Jenis Kelamin : Pria</div>
                                @elseif($profile->jenis_kelamin == 'P')
                                    <div class="konten">Jenis Kelamin : Perempuan</div>
                                @else
                                    <div class="konten">Jenis Kelamin : - </div>
                                @endif
                            </div>
                        </div>
                        <div class="form1">
                            <div class="space">
                            </div>
                            <div class="formUsername">
                                <!-- <label for="username" class="username">Tipe Pengguna</label> -->
                                <div class="konten">Tipe Pengguna : {{ $profile->user->role }}</div>
                            </div>
                            <div class="formEmail">
                                <!-- <label for="username" class="username">Tanggal Bergabung</label> -->
                                <div class="konten">Tanggal Bergabung :
                                    {{ $profile->user->email_verified_at->format('d F Y') }}</div>
                            </div>
                            <div class="formNama">
                                <!-- <label for="username" class="username">Total Layanan</label> -->
                                <div class="konten">Total Layanan : {{ $totalLayanan }}</div>
                            </div>
                            <div class="formNama">
                                <!-- <label for="username" class="username">Total Layanan dibatalkan</label> -->
                                <div class="konten">Total Layanan dibatalkan : {{ $totalLayananDibatalkan }}</div>
                            </div>
                        </div>
                        <div class="tgl">
                            <a href=""><button class="btn btn-primary">Lihat foto KTP</button></a>
                        </div>
                    @endforeach
                </div>

            </div>

            <div class="riwayat">Riwayat Layanan</div>

            <div class="cardBox">
                <div class="card">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Select</td>
                                <td>ID Pesanan</td>
                                <td>Nama customer</td>
                                <td>Layanan</td>
                                <td>Tanggal</td>
                                <td>Metode</td>
                                <td>Status</td>
                                <td>Detail</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($layanan as $item)
                                <tr>
                                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                    <td>ORD-{{ $item->id }}</td>
                                    <td>{{ $item->customers->nama }}</td>
                                    @foreach ($item->pemesanan_detail as $detail)
                                        <td>
                                            {{ $detail->layanan->nama_layanan }}
                                        </td>
                                    @endforeach
                                    <td>{{ date('d/m/Y', strtotime($item->tanggal_pemesanan)) }}</td>
                                    <td>{{ $item->status_pemesanan != 'Batal' ? $item->metode_pembayaran : '-' }}</td>
                                    @if ($item->status_pemesanan == 'Batal')
                                        <td><span style="color:red; font-weight:bold;">dibatalkan</span></td>
                                    @elseif($item->status_pemesanan == 'Sukses')
                                        <td><span style="color:green; font-weight:bold;">Selesai</span></td>
                                    @else
                                        <td><span style="color:blue">{{ $item->status_pemesanan }}</span></td>
                                    @endif
                                    <td><a href="">detail</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
