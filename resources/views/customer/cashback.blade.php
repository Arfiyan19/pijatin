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
                <a href="{{ route('customers.notifikasi') }}"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                        <path d="M19.9492 25.9502L13.0492 19.0502C12.8992 18.9002 12.7932 18.7377 12.7312 18.5627C12.6682 18.3877 12.6367 18.2002 12.6367 18.0002C12.6367 17.8002 12.6682 17.6127 12.7312 17.4377C12.7932 17.2627 12.8992 17.1002 13.0492 16.9502L19.9492 10.0502C20.2242 9.77519 20.5742 9.6377 20.9992 9.6377C21.4242 9.6377 21.7742 9.77519 22.0492 10.0502C22.3242 10.3252 22.4617 10.6752 22.4617 11.1002C22.4617 11.5252 22.3242 11.8752 22.0492 12.1502L16.1992 18.0002L22.0492 23.8502C22.3242 24.1252 22.4617 24.4752 22.4617 24.9002C22.4617 25.3252 22.3242 25.6752 22.0492 25.9502C21.7742 26.2252 21.4242 26.3627 20.9992 26.3627C20.5742 26.3627 20.2242 26.2252 19.9492 25.9502Z" fill="white" />
                    </svg></a>
                <p>Detail Notifikasi</p>
            </div>
        </div>
    </div>


    <div class="container-refund">
        <div class="info">
            <div class="head">Informasi Pesanan</div>
            <div class="content">Kami sampaikan kepada pelanggan setia kami terkait detail pemesanan
            </div>
        </div>
        <div class="card-refund">
            <table>
                <thead>
                    <tr>
                        <td>Rincian Pesanan Anda</td>
                    </tr>
                    <tr>
                        <td>Terapis</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nama Terapis</td>
                        <td>{{ $terapis->nama }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>{{ $terapis->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                    </tr>
                    <tr>
                        <td>{{ $alamat->alamat_lengkap }}, Kelurahan. {{ $alamat->kelurahan }}, Kecamatan. {{ $alamat->kecamatan }}, {{ $alamat->kota }}, Provinsi. {{ $alamat->provinsi }}, Kode Pos ( {{ $alamat->kode_pos }} )</td>
                    </tr>
                </tbody>



                <thead>
                    <tr>
                        <td>Jumlah Pemesan</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $customer->jenis_kelamin }}</td>
                        <td>1</td>
                    </tr>
                </tbody>

                <!-- jadwal pesanan  -->
                <thead>
                    <tr>
                        <td>Jadwal Pesanan</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>{{ $customer->nama }}</td>
                    </tr>
                    <!-- Tanggal Pemesanan -->
                    <tr>
                        <td>Tanggal Pemesanan</td>
                        <td>{{ \Carbon\Carbon::parse($pemesanan['tanggal_pemesanan'])->format('d F Y') }}</td>
                    </tr>
                    <tr>
                        <td>Jadwal Pemesanan</td>
                        <td>{{ \Carbon\Carbon::parse($pemesanan['created_at'])->format('H:i d F Y ') }}</td>
                    </tr>
                    <!-- //jam -->
                    <tr>
                        <td>Jam</td>
                        <?php
                        $id_layanan = $detail_pemesanan->layanan_id;
                        $layanan = App\Models\Layanan::where('id', $id_layanan)->first();
                        $durasi_layanan = $layanan->durasi;
                        ?>
                        @php
                        $total_durasi = 0; // Variabel untuk menyimpan total durasi
                        @endphp
                        @foreach($layanan_tambahan as $layanan)
                        @if($layanan)
                        @php
                        $total_durasi += $layanan->durasi; // Menambahkan durasi layanan ke total_durasi
                        @endphp
                        @else
                        @endif
                        @endforeach
                        <td>
                            {{ \Carbon\Carbon::parse($pemesanan['created_at'])->format('H:i') }} - {{ \Carbon\Carbon::parse($pemesanan['created_at'])->addMinutes($durasi_layanan + $total_durasi)->format('H:i') }}
                        </td>
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
                        <td>PMSN-0000{{ $pemesanan->id }}</td>
                    </tr>
                    <tr>
                        <td>Metode Pembayaran</td>
                        <td>Cash</td>
                    </tr>
                    <tr>
                        <td><?php
                            $id_layanan = $detail_pemesanan->layanan_id;
                            $layanan = App\Models\Layanan::where('id', $id_layanan)->first();
                            $durasi_layanan = $layanan->durasi;
                            echo $layanan->nama_layanan;
                            ?> </td>
                        <td>x 1 <br>
                            <?php echo "Rp. " . number_format($layanan->harga, 2, ',', '.'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            @php
                            $total_durasi = 0; // Variabel untuk menyimpan total durasi
                            @endphp
                            @foreach($layanan_tambahan as $layanan)
                            @if($layanan)
                            {{ $layanan->nama_layanan }},
                            @php
                            $total_durasi += $layanan->durasi; // Menambahkan durasi layanan ke total_durasi
                            @endphp
                            @else
                            -
                            @endif
                            @endforeach
                        </td>
                        <td>x 1 <br>
                            @php
                            $total_harga = 0; // Variabel untuk menyimpan total durasi
                            @endphp
                            @foreach($layanan_tambahan as $layanan)
                            @if($layanan)
                            @php
                            $total_harga += $layanan->harga; // Menambahkan durasi layanan ke total_durasi
                            @endphp
                            @endif
                            @endforeach
                            {{ "Rp. " . number_format($total_harga, 2, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td>Total Durasi</td>
                        <td>{{ $durasi_layanan + $total_durasi }} Menit</td>
                    </tr>
                </tbody>
                <tbody>
                    <tr style="border-bottom: 1px solid #000;"></tr>
                    <tr>
                        <td>Ongkos Perjalanan</td>
                        <td>
                            <?php
                            $id_layanan = $detail_pemesanan->layanan_id;
                            $layanan = App\Models\Layanan::where('id', $id_layanan)->first();
                            $ongkos_kirim = $pemesanan->total_bayar - ($layanan->harga + $total_harga);
                            echo "Rp. " . number_format($ongkos_kirim, 2, ',', '.');
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>
                            <?php
                            $sum_total = $pemesanan->total_bayar;
                            echo "Rp. " . number_format($sum_total, 2, ',', '.');
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        @if($pemesanan->status_pemesanan == 'Proses')
                        <td><span class="status lunas">Proses</span></td>
                        @elseif($pemesanan->status_pemesanan == 'Masuk')
                        <td><span class="status lunas" style="color: #4fa68b;">Masuk</span></td>
                        @elseif($pemesanan->status_pemesanan == 'Selesai')
                        <td><span class="status selesai">Selesai</span></td>
                        @elseif($pemesanan->status_pemesanan == 'Dibatalkan')
                        <td><span class="status batal">Dibatalkan</span></td>
                        @endif
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