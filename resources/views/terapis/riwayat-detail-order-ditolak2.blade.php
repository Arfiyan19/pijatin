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

    <!-- ======= link lib. icon ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- //import cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- my style -->
    <link rel="stylesheet" href="{{ asset('frontend/terapist/css/riwayat-detail-order-diterima.css') }}">

    <!-- logo tittle bar -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- //cdn jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrfSYyntgBJhrWpEGYgc1D6d5pYZISiAk"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrfSYyntgBJhrWpEGYgc1D6d5pYZISiAk&callback=initMap"></script>
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Detail Pekerjaan Diterima</title>
</head>

<body>
    <div class="container">
        <div class="topbar">
            <!-- terapis.riwayat-ditolak -->
            <a href="{{ route('terapis.riwayat-ditolak') }}">
                <img src="{{ asset('frontend/terapist/img/back.png') }}" alt="">
            </a>
            <div class="head">
                <h4>Riwayat Pekerjaan Ditolak</h4>
            </div>
        </div>
        <div class="identitas">
            <br>
            <table class="tableidentitas">
                <tr style="color: white; ">
                    <td width="200px" style="font-size:18px;padding-bottom: 14px;" align="left"><b>Pekerjaan Ditolak</b></td>
                    <td style="font-size:14px; padding-bottom: 10px;" align="right"><b style="font-size:18px;">
                            <?php $durasi_utama = $layanan->durasi ?>
                            @foreach($layanan_tambahan as $layanan)
                            @if($layanan)
                            <?php $durasi_utama += $layanan->durasi ?>
                            @endif
                            @endforeach
                            {{ $durasi_utama }} menit
                        </b>
                    </td>
                </tr>
                <tr style="color:white; ">
                    <td width="350px" align="left" style="font-size:14px">{{ $customer->nama }}</td>
                    <td width="200px" style="font-size:14px" align="right">
                        ID : PMSN-0000{{ $pemesanan->id }}
                    </td>
                </tr>
            </table>
        </div>

        <div class="detailpesan">
            <div>
                <img class="imglogo" src="{{ asset('frontend/assets/image/logo-70.png') }}" alt="">
            </div>
            <div class="jdldes">
                <p class="judul">Pesanan Sudah Kami Jadwalkan</p>
                <p class="deskripsi">Anda sudah melunasi tagihan</p>
            </div>
            <table class="table1">
                <tr>
                    <th colspan="3" style="font-weight: bold; float:left">Jadwal</th>
                </tr>
                <tr>
                    <td width="300px" align="left">Tanggal</td>
                    <td width="200px" align="right" colspan="2">{{ \Carbon\Carbon::parse($pemesanan['created_at'])->format('d F Y') }}</td>
                </tr>
                <tr>
                    <td width="300px" align="left">Waktu</td>
                    <td width="200px" align="right" colspan="2">
                        {{ \Carbon\Carbon::parse($pemesanan['created_at'])->format('H:i') }} - Selesai
                    </td>
                </tr>
                <!-- ALAMAT  -->
                <tr>
                    <th colspan="3" style="font-weight: bold; float:left;padding-top:10px">Alamat</th>
                </tr>
                <tr>
                    <td colspan="3" align="left">{{ $alamat->alamat_lengkap }}, Kelurahan. {{ $alamat->kelurahan }}, Kecamatan. {{ $alamat->kecamatan }}, {{ $alamat->kota }}, Provinsi. {{ $alamat->provinsi }}, Kode Pos ( {{ $alamat->kode_pos }} )</td>
                </tr>
                <!-- LAYANAN -->
                <tr>
                    <th colspan="3" style="font-weight: bold; float:left; padding-top:10px">Layanan</th>
                </tr>
                <tr>
                    <td width="300px" align="left"><?php
                                                    $id_layanan = $detail_pemesanan->layanan_id;
                                                    $layanan = App\Models\Layanan::where('id', $id_layanan)->first();
                                                    echo $layanan->nama_layanan;
                                                    ?></td>
                    <td width="200px" align="right" colspan="2">{{ $layanan->durasi }} menit</td>
                </tr>
                <tr>
                    <td width="300px" align="left">
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
                    <td width="200px" align="right" colspan="2">{{ $total_durasi }} menit</td>
                </tr>

                <!-- PEMESAN -->
                <tr>
                    <th colspan="3" style="font-weight: bold; float:left; padding-top:10px">Pemesan</th>
                </tr>
                <tr>
                    <td width="300px" align="left">{{ $customer->nama }}</td>
                    <td width="200px" align="right" colspan="2">Customer</td>
                </tr>
                <tr>
                    <td width="300px" align="left">{{ $terapis->nama }}</td>
                    <td width="200px" align="right" colspan="2">Terapis</td>
                </tr>
                <tr>
                    <td width="300px" align="left">Layanan Tambahan</td>
                    <td width="200px" align="right" colspan="2">
                        @foreach($layanan_tambahan as $layanan)
                        @if($layanan)
                        {{ $layanan->nama_layanan }},
                        @else
                        -
                        @endif
                        @endforeach
                    </td>
                </tr>

                <!-- DETAIL HARGA -->
                <tr>
                    <th colspan="2" style="font-weight: bold; float:left; padding-top:10px">Detail Harga</th>
                </tr>
                <tr>
                    <td width="300px" align="left">
                        <?php
                        $id_layanan = $detail_pemesanan->layanan_id;
                        $layanan = App\Models\Layanan::where('id', $id_layanan)->first();
                        echo $layanan->nama_layanan;
                        ?>
                    </td>
                    <td align="right">x1</td>
                    <td width="200px" align="right"><?php echo "Rp. " . number_format($layanan->harga, 2, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td width="300px" align="left">
                        @foreach($layanan_tambahan as $layanan)
                        @if($layanan)
                        {{ $layanan->nama_layanan }},
                        @else
                        -
                        @endif
                        @endforeach
                    </td>
                    <td align="right">x1</td>
                    <td width="200px" align="right">
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
                    <td width="300px" align="left">Ongkos Kirim</td>
                    <td width="200px" align="right" colspan="2"><?php
                                                                $id_layanan = $detail_pemesanan->layanan_id;
                                                                $layanan = App\Models\Layanan::where('id', $id_layanan)->first();
                                                                $ongkos_kirim = $pemesanan->total_bayar - ($layanan->harga + $total_harga);
                                                                echo "Rp. " . number_format($ongkos_kirim, 2, ',', '.');
                                                                ?>
                    </td>
                </tr>
                <tr>
                    <td width="300px" align="left">Total Harga</td>
                    <td width="200px" align="right" colspan="2"><?php
                                                                $sum_total = $pemesanan->total_bayar;
                                                                echo "Rp. " . number_format($sum_total, 2, ',', '.');
                                                                ?>
                    </td>
                </tr>

                <!-- PEMBAYARAN -->
                <tr>
                    <th colspan="3" style="font-weight: bold; float:left; padding-top:10px">Pembayaran</th>
                </tr>
                <tr>
                    <td width="300px" align="left">Nama </td>
                    <td width="200px" align="right" colspan="2">{{ $customer->nama }}</td>
                </tr>
                <tr>
                    <td width="300px" align="left">Metode Pembayaran</td>
                    <td width="200px" align="right" colspan="2">Cash</td>
                </tr>
                <tr>
                    <td width="300px" align="left">Status Pembayaran</td>
                    <td width="200px" align="right" colspan="2" class="text-danger">Belum Lunas</td>
                </tr>

                <!-- MENOLAK LAYANAN -->
                <tr>
                    <th colspan="3" style="font-weight: bold; float:left; padding-top:10px" class="text-danger">Alasan Menolak Layanan</th>
                </tr>
                <tr>
                    <td align="left" colspan="3">{{ $detail_layanan_ditolak->alasan }}</td>
                </tr>
                <!-- // -->
                <tr>
                    <th colspan="3" style="font-weight: bold; float:left; padding-top:10px">Lokasi</th>
                    <td width="200px" align="right" colspan="2">
                        <button type="button" class="btn-lokasi" onclick="lokasi()">
                            Lihat Lokasi
                        </button>
                    </td>
                </tr>

            </table>

        </div>
        <div class="btn">
            <button type="button" class="btn-mulai">
                Tutup
            </button>
        </div>
    </div>
    <br>
    <script>
        // terapis/riwayat/ditolak
        $(document).ready(function() {
            $('.btn-mulai').click(function() {
                window.location.href = "{{ route('terapis.riwayat-ditolak') }}";
            });
        });

        function lokasi() {
            var latitude_customer = "{{ $alamat->latitude }}";
            var longitude_customer = "{{ $alamat->longitude }}";
            var latitude_terapis = "{{ $latitude_terapis }}";
            var longitude_terapis = "{{ $longitude_terapis }}";
            var array = [latitude_customer, longitude_customer, latitude_terapis, longitude_terapis];
            //rumus haversine formula untuk mencari jarak terapis
            var R = 6371; // Radius of the earth in km
            var dLat = (latitude_terapis - latitude_customer) * (Math.PI / 180);
            var dLon = (longitude_terapis - longitude_customer) * (Math.PI / 180);
            var a =
                Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(latitude_customer * (Math.PI / 180)) * Math.cos(latitude_terapis * (Math.PI / 180)) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2);
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            var d = R * c; // Distance in km
            // alert("Jarak Lokasi Terapis : " + d.toFixed(2) + " km");
            // append modal 
            $('#exampleModal').modal('show');
            $('.modal-title').text('Peta Digital Jarak Terapis');
            document.getElementById('latitude').innerHTML = latitude_customer;
            document.getElementById('longitude').innerHTML = longitude_customer;
            document.getElementById('alamat').innerHTML = "{{ $alamat->alamat_lengkap }}, Kelurahan. {{ $alamat->kelurahan }}, Kecamatan. {{ $alamat->kecamatan }}, {{ $alamat->kota }}, Provinsi. {{ $alamat->provinsi }}";
            document.getElementById('jarakValue').innerHTML = d.toFixed(2) + " km";
            // var waktuTempuh = jarak / 50; // dalam jam
            document.getElementById('waktuTempuh').innerHTML = (d.toFixed(2) / 50).toFixed(2) + " jam";
            var map;
            var directionsService;
            var directionsDisplay;
            var lat = parseFloat(latitude_customer);
            var lng = parseFloat(longitude_customer);
            var myLatLng = {
                lat: lat,
                lng: lng
            };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: myLatLng
            });
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Lokasi Customer',
                icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png' // ikon merah
            });
            //titik terapis
            var lat_terapis = parseFloat(latitude_terapis);
            var lng_terapis = parseFloat(longitude_terapis);
            var myLatLng_terapis = {
                lat: lat_terapis,
                lng: lng_terapis
            };
            var marker_terapis = new google.maps.Marker({
                position: myLatLng_terapis,
                map: map,
                title: 'Lokasi Terapis',
                icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png' // ikon biru
            });
            var travelPath;
            // Menampilkan rute perjalanan
            travelPath = new google.maps.Polyline({
                path: [myLatLng, myLatLng_terapis],
                strokeColor: "#FF0000",
                strokeOpacity: 1.0,
                strokeWeight: 2
            });
            travelPath.setMap(map);
            // alert("Lokasi : {{ $alamat->alamat_lengkap }}, Kelurahan. {{ $alamat->kelurahan }}, Kecamatan. {{ $alamat->kecamatan }}, {{ $alamat->kota }}, Provinsi. {{ $alamat->provinsi }}");
        }
    </script>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="font-size: 14px;">
                    <div id="map" style="width: 100%; height: 400px;"></div>
                    <p id="coordinates">Latitude: <span id="latitude"></span>, Longitude: <span id="longitude"></span></p>
                    <p id="alamat">Alamat: <span id="alamat"></span></p>
                    <p id="jarak">Jarak ke tujuan: <span id="jarakValue"></span></p>
                    <p id="waktu">Waktu tempuh: <span id="waktuTempuh"></span></p>
                </div>
                <div class="modal-footer" style="font-size: 14px;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>