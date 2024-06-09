<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Alamat baru</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href=" {{ asset('frontend/terapist/css/notifikasi-order.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
    <!-- ======= link lib. icon ====== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- //import cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- //cdn jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrfSYyntgBJhrWpEGYgc1D6d5pYZISiAk"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrfSYyntgBJhrWpEGYgc1D6d5pYZISiAk&callback=initMap"></script>
</head>

<body>
    <div class="container" style="padding-left: 0px; padding-right: 0px;">
        <div class="topbar">
            <a href="http://127.0.0.1:8000/terapis/profile-lokasi">
                <i class="material-icons" style="font-size:36px">chevron_left</i>
            </a>
            <p style="margin-bottom: 5px;">Terima Pesanan ini ?</p>
        </div>

        <div class="content">
            <div class="title">ID</div>
            <!-- //title text kolom kiri ID kolom -kanan ID PEMESANAN  -->
            <div class="row-title">
                <div class="kolom-kiri">ID PEMESANAN</div>
                <div class="kolom-kanan">PMSN-0000{{ $pemesanan->id }}-{{ substr($pemesanan->nama_pemesan_1, 0, 2) }}</div>

            </div>
            <div class="title">Customer</div>
            <!-- //title text kolom kiri ID kolom -kanan ID PEMESANAN  -->
            <div class="row-title">
                <div class="kolom-kiri">Nama</div>
                <div class="kolom-kanan">{{ $pemesanan->customers->nama }}</div>
            </div>
            <div class="title">Alamat</div>
            <!-- //alamat  -->
            <div class="row-title">
                <div class="kolom-kanan">{{ $alamat->alamat_lengkap }}, {{ $alamat->kelurahan }}, {{ $alamat->kecamatan }}, {{ $alamat->kota }}, {{ $alamat->provinsi }}, {{ $alamat->kode_pos}}</div>
            </div>
            <div class="title">Detail Pemesanan</div>
            <div class="row-title">
                <div class="kolom-kiri">Nama Pemesan</div>
                <!-- //for pemesanan->pemesanan->detail  -->
                <div class="kolom-kanan">{{ $pemesanan->nama_pemesan_1}}</div>
            </div>
            <div class="row-title">
                <div class="kolom-kiri">Total Pemesan</div>
                @foreach($pemesanan->pemesanan_detail as $detail)
                <div class="kolom-kanan">{{ $detail->jumlah }}</div>
                @endforeach
                <!-- <div class="kolom-kanan">1</div> -->
            </div>
            <div class="row-title">
                <div class="kolom-kiri">Jenis Kelamin</div>
                <div class="kolom-kanan">Laki-laki</div>
            </div>
            <!-- //layanan  -->
            <div class="row-title">
                <div class="kolom-kiri">Layanan</div>
                <div class="kolom-kiri">{{ $layanan->nama_layanan }}</div>
            </div>
            <!-- layanan_tambahan  -->
            <div class="row-title">
                <div class="kolom-kiri">Layanan Tambahan</div>
                <!-- layanan_tambahan_data -->
                <div class="kolom-kanan">
                    @foreach($layanan_tambahan_data as $tambahan)
                    {{ $tambahan->nama_layanan }},
                    @endforeach
                </div>
                <!-- <div class="kolom-kanan">Kerokan</div> -->
            </div>
            <div class="row-title">
                <div class="kolom-kiri">Durasi</div>
                <div class="kolom-kanan">{{ $total_durasi }} Menit</div>
            </div>
            <div class="title">Jadwal Pemesanan</div>
            <div class="row-title">
                <div class="kolom-kiri">Tanggal</div>
                <div class="kolom-kanan">{{ $pemesanan->created_at->format('d F Y') }}</div>

            </div>
            <div class="row-title">
                <div class="kolom-kiri">Jam</div>
                <!-- <!-- //pemesanan->created_at  ambil Hourse Minut Second -->

                <div class="kolom-kanan">{{ $pemesanan->created_at->format('H:i') }} WIB</div>
            </div>
            <!-- //detail pembayaran cash  -->
            <div class="title">Detail Pembayaran</div>
                <div class="row-title">
                <div class="kolom-kiri">Harga Layanan + Tambahan</div>
                <div class="kolom-kanan">Rp. {{ number_format($harga_layanan, 2, ',', '.') }}</div>
            </div>
            <div class="row-title">
                <div class="kolom-kiri">Ongkir</div>
                <div class="kolom-kanan">Rp. {{ number_format($ongkir, 2, ',', '.') }}</div>
            </div>
            <div class="row-title">
                <div class="kolom-kiri">Total</div>
                <div class="kolom-kanan">Rp. {{ number_format($total, 2, ',', '.') }}</div>
            </div>
            <div class="row-title">
                <div class="kolom-kiri">Metode Pembayaran</div>
                <div class="kolom-kanan">Cash</div>
            </div>
            <!-- //lihat  -->
            <div class="row-title">
                <div class="kolom-kiri" style="font-weight: bold;">Lihat Lokasi</div>
                <div class="kolom-kanan" style="">
                    <button type="button" class="btn-lokasi" onclick="lokasi()">
                        Lihat Lokasi
                    </button>
                </div>
            </div>
            <!-- //cek status_pemesanan jika Masuk Tampil dibawah ini jika -->
            @if($pemesanan->status_pemesanan == 'Masuk')
            <div class="tombol">
                <button type="button" onclick="ditolak()" style="cursor: pointer;">Tolak</button>
                <button type="submit" onclick="simpan()" style="cursor: pointer;">Simpan</button>
            </div>
            @else
            <div class="tombol">
                <!-- kembali  -->
                <a href="{{ url('terapis/riwayat/dijadwalkan') }}">
                    <button type="button">Kembali</button>
                </a>
            </div>
            @endif
            <!--//kasih di sisni popup nya  -->
            <!--Modal Popup -->
            <div class="popup" id="popup">
                <div class="headpop">
                    <h4>Yakin menolak pesanan ini?</h4>
                    <p>Jika tidak terpaksa jangan dibatalkan</p>
                </div>

                <div class="content">
                    <div class="kenapa">
                        <p>Kenapa pesanan dibatalkan?</p>
                    </div>
                    <form id="form" method="post" action="">
                        <div class="pilihan">
                            <input type="radio" name="reason" value="Saya sedang sakit">Saya sedang sakit<br>
                        </div>

                        <div class="pilihan">
                            <input type="radio" name="reason" value="Saya kecelakaan di jalan">Saya kecelakaan di jalan<br>
                        </div>

                        <div class="pilihan">
                            <input type="radio" name="reason" value="jarak tempuh terlalu jauh">jarak tempuh terlalu jauh<br>
                        </div>

                        <div class="pilihan">
                            <input type="radio" name="reason" value="Kendaraan berkendala">Kendaraan berkendala<br>
                        </div>

                        <div class="pilihan">
                            <input type="radio" onclick="alasanlain();" id="btnlain" name="reason" value="lainnya">Lainnya
                            <input type="text" id="isian" name="other_reason" style="width: 100%; margin-left: 10px;" hidden>

                        </div>
                    </form>
                    <div class="lapor" id="lapor">
                        <a href="javascript:void(0)">
                            <button type="submit">Tolak</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<!-- //button submit tampil toasr   -->
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
<script>
    // $(document).ready(function() {
    //     $('button[type="submit"]').click(function() {
    //         //data
    //         var id_pemesanan = "{{ $pemesanan->id }}";
    //         $.ajax({
    //             // terapis-pemesanan/konfirmasi/{id}/konfirmasi
    //             url: "{{ route('terapis.konfirmasiPost', $pemesanan->id) }}",
    //             type: "POST",
    //             data: {
    //                 id_pemesanan: id_pemesanan,
    //                 _token: "{{ csrf_token() }}"
    //             },
    //             success: function(response) {
    //                 // console.log(response);
    //                 if (response.status == 'success') {
    //                     toastr.success(response.message);
    //                     // setTimeout(function() {}, 2000);
    //                 } else {
    //                     toastr.error(response.message);
    //                 }
    //             }
    //         });
    //     });
    // });

    function ditolak() {
        var modal = document.getElementById("popup");
        modal.style.display = "block";

        $('#lapor').click(function() {
            //         //data
            if ($('#btnlain').is(':checked')) {
                // masukan alasanya 
                var token = "{{ csrf_token() }}";
                var id_pemesanan = "{{ $pemesanan->id }}";

                var other_reason = $("input[name='other_reason']").val();
                if (other_reason == '') {
                    //fokus input lalu toasr
                    $("input[name='other_reason']").focus();
                    toastr.error('Alasan tidak boleh kosong');
                    return false;
                }
                var id_pemesanan = "{{ $pemesanan->id }}";
                var data_input = [id_pemesanan, other_reason];
            } else {
                var reason = $("input[name='reason']:checked").val();
                var id_pemesanan = "{{ $pemesanan->id }}";
                var data_input = [id_pemesanan, reason];
            }
            console.log(data_input, token);
            $.ajax({
                // terapis-pemesanan/konfirmasi/{id}/konfirmasi
                url: "{{ route('terapis.konfirmasiPost', $pemesanan->id) }}",
                type: "POST",
                data: {
                    id_pemesanan: id_pemesanan,
                    _token: "{{ csrf_token() }}",
                    reason: reason,
                    other_reason: other_reason
                },
                success: function(response) {
                    if (response.status == 'success') {
                        toastr.success(response.message);
                        // riwayat/ditolak
                        setTimeout(function() {
                            window.location.href = "{{ url('terapis/riwayat/ditolak') }}";
                        }, 2000);
                    }
                }
            });
        });
    }
    //simpan
    function simpan() {
        var id_pemesanan = "{{ $pemesanan->id }}";
        $.ajax({
            url: "{{ route('terapis.konfirmasiPost', $pemesanan->id) }}",
            type: "POST",
            data: {
                id_pemesanan: id_pemesanan,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                // console.log(response);
                if (response.status == 'success') {
                    toastr.success(response.message);
                    setTimeout(function() {
                        window.location.href = "{{ url('terapis/riwayat/dijadwalkan') }}";
                    }, 2000);
                } else {
                    toastr.error(response.message);
                }
            }
        });
    }

    function alasanlain() {
        var otherReasonInput = document.getElementById("isian");
        otherReasonInput.removeAttribute("hidden");
        otherReasonInput.focus(); // Untuk memberikan fokus langsung ke input other_reason
    }


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