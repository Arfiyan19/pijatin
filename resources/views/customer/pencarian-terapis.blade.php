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

    <!-- //cdn jquery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- my style -->
    <link rel="stylesheet" href="{{ asset('frontend/css/homeCustomer.css') }}">
    <!-- logo tittle bar -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrfSYyntgBJhrWpEGYgc1D6d5pYZISiAk"></script>

    <title>Pijat.in</title>
</head>
<style>
    .toast-success {
        background-color: var(--primary-primary-007, #67b99a);
    }

    .toast-error {
        background-color: var(--primary-danger-007, #e7515a);
    }

    .input-pemesanan {
        border-radius: 8px;
        border: 2px solid #34CBAA;
        background: #FFF;
        display: flex;
        padding: 10px 13px;
        align-items: center;
        gap: 10px;
    }

    .tampilan-pemesanan {
        padding: 23px 22px 0;
    }



    .container-detail h6 {
        color: #000;
        font-family: Poppins;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        letter-spacing: -0.64px;
    }

    .container-detail label {
        color: #000;
        font-family: Poppins;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        letter-spacing: -0.56px;
    }

    .pemesan span {
        color: #56AB91;
        font-family: Poppins;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        letter-spacing: -0.64px;
    }

    .pemesan {
        padding-top: 50px;
    }

    .simpan-button {
        margin-top: 50px;
        border-radius: 20px;
        width: 208px;
        height: 50px;
        padding: 10px 0px;
        justify-content: center;
        align-items: center;
        gap: 10px;
        flex-shrink: 0;
    }

    .price {
        margin-left: 650px;
    }
</style>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="map" style="width: 100%; height: 400px;"></div>
                <p id="coordinates">Latitude: <span id="latitude"></span>, Longitude: <span id="longitude"></span></p>
                <p id="alamat">Alamat: <span id="alamat"></span></p>
                <p id="jarak">Jarak ke tujuan: <span id="jarakValue"></span></p>
                <p id="waktu">Waktu tempuh: <span id="waktuTempuh"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<body>
    <div class="topbar">
        <div class="content">
            <div class="tittle">
                @if(auth()->check() == false)
                <a href="{{ route('detaillayanan') }}"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                    <path d="M19.9492 25.9502L13.0492 19.0502C12.8992 18.9002 12.7932 18.7377 12.7312 18.5627C12.6682 18.3877 12.6367 18.2002 12.6367 18.0002C12.6367 17.8002 12.6682 17.6127 12.7312 17.4377C12.7932 17.2627 12.8992 17.1002 13.0492 16.9502L19.9492 10.0502C20.2242 9.77519 20.5742 9.6377 20.9992 9.6377C21.4242 9.6377 21.7742 9.77519 22.0492 10.0502C22.3242 10.3252 22.4617 10.6752 22.4617 11.1002C22.4617 11.5252 22.3242 11.8752 22.0492 12.1502L16.1992 18.0002L22.0492 23.8502C22.3242 24.1252 22.4617 24.4752 22.4617 24.9002C22.4617 25.3252 22.3242 25.6752 22.0492 25.9502C21.7742 26.2252 21.4242 26.3627 20.9992 26.3627C20.5742 26.3627 20.2242 26.2252 19.9492 25.9502Z" fill="white" />
                </svg></a>
                @elseif(auth()->check() == true)
                

                @endif

                <p>Pencarian Terapis</p>
            </div>
        </div>
    </div>
    <form id="form-pemesanan" class="form-pemesanan" action="javascript:void(0)" method="POST">
        @csrf
        <div class="container-detail">
            <div class="tampilan-from">
                <h6>Pilih Terapis Terdekat</h6>
            </div>
            @foreach($terapis as $key => $value)

            <div class="frame-tampilan-pencarian">
                <!-- Isikan checkbox untuk Terapis Jono -->
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                <!-- Tampilan pencarian terapis -->
                <div class="card-alamat">
                    <div class="content">
                        <div class="head">
                            <div class="head-info">
                                <input type="text" name="id_terapis" value="{{ $value['id'] }}" hidden>
                                <!-- <div class="txt" style="margin-bottom: 20px;">Terapis Jono ( Jarak 1 Km )</div> -->
                                <!-- //hidden input val jarak  -->
                                <input type="hidden" id="distance" name="distance" value="{{ $value['distance'] }}">
                                <div class="txt" style="margin-bottom: 20px;">Terapis {{ $value['nama'] }} &nbsp;&nbsp;&nbsp;( Jarak {{ $value['distance'] }} Km )</div>
                                <!-- <div class="pp">Jl. Raya Bogor No. 5, Jakarta Timur</div> -->
                                <!-- panggil relasi value->alamat  -->
                                @if(isset($value['alamat']))
                                <div class="pp" style="font-size: 13px;font-family: Poppins;font-weight: 400;line-height: 19px;letter-spacing: -0.52px;color: #000000;">{{ $value['alamat']['alamat_lengkap'] }}, {{ $value['alamat']['kelurahan'] }}, {{ $value['alamat']['kecamatan'] }}</div>
                                @else
                                <p>Alamat tidak tersedia.</p>
                                @endif

                            </div>
                            <div class="head-tittle">
                                <div class="myModal" id="myModal" value="{{ $value['id'] }}" style="cursor: pointer;">
                                    <img style="width: 40px; height: 40px;" src="{{ asset('frontend/assets/image/pin.png') }}" alt="">
                                </div>



                                <!-- <svg class="myModal" id="" style="cursor: pointer;" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 576 512">!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.
                                    <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                </svg> -->
                                <!-- //button lihat map  -->
                                <!-- ///modal div  -->


                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


            <!-- Isikan checkbox untuk Terapis Mase -->
            <!-- <div class="frame-tampilan-pencarian">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                <div class="card-alamat">
                    <div class="content">
                        <div class="head">
                            <div class="head-info">
                                <div class="txt" style="margin-bottom: 20px;">Terapis Mase ( Jarak XX Km )</div>
                                <div class="pp">Alamat Terapis Mase</div>
                            </div>
                            <div class="head-tittle">
                                <div class="frame-maps">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- //isikan checkbox  -->
            <!-- //tampilan pencarian terapis  -->

            <!-- <div class="tampilan-semua">
                <div class="tampilan-pemesanan">
                    <input class="form-control input-pemesanan" name="nama_pemesan" id="nama_pemesan" type=" text" placeholder="Masukan nama pemesan" aria-label="default input example">
                    <span class="text-danger" id="nama_pemesanError"></span>
                </div>
                <div class="tampilan-from">
                    <h6>Pilih Gender Pemesan</h6>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="flexRadioDefault1" name="jk_pemesan" value="Laki-Laki">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Laki-Laki
                        </label>
                    </div>
                    <div class="form-check form-check-inline" style="margin-left: 81px;">
                        <input class="form-check-input" type="radio" id="flexRadioDefault2" name="jk_pemesan" value="Perempuan">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Perempuan
                        </label>
                    </div>
                </div>
                <div class="tampilan-from" style="padding-top: 5px; padding-bottom: 0px;">
                    <span class="text-danger" id="jk_pemesanError"></span>
                </div>

                <div class="tampilan-from form-check-inline">
                    <h6>Pilih Gender Terapis</h6>
                    <div class="form-check form-check-inline">
                        <input class=" form-check-input" type="radio" name="jk_terapis" id="flexRadioDefault3" value="Laki-Laki">
                        <label class="form-check-label" for="flexRadioDefault3">
                            Laki-Laki
                        </label>
                    </div>
                    <div class="form-check form-check-inline" style="margin-left: 81px;">
                        <input class=" form-check-input" type="radio" name="jk_terapis" id="flexRadioDefault4">
                        <label class="form-check-label" for="flexRadioDefault4">
                            Perempuan
                        </label>
                    </div>
                </div>
                <div class="tampilan-from" style="padding-top: 5px; padding-bottom: 0px;">
                    <span class="text-danger" id="jk_terapisError"></span>
                </div>

                <div class="tampilan-from">
                    <h6>Layanan Tambahan</h6>
                    @foreach($layanan as $layanan)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="layanan_tambahan[]" value="{{ $layanan->id }}" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{ $layanan->nama_layanan }}
                            <p> <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                    <path d="M7.5 12.5C10.25 12.5 12.5 10.25 12.5 7.5C12.5 4.75 10.25 2.5 7.5 2.5C4.75 2.5 2.5 4.75 2.5 7.5C2.5 10.25 4.75 12.5 7.5 12.5ZM7.5 1.25C10.9375 1.25 13.75 4.0625 13.75 7.5C13.75 10.9375 10.9375 13.75 7.5 13.75C4.0625 13.75 1.25 10.9375 1.25 7.5C1.25 4.0625 4.0625 1.25 7.5 1.25ZM10.625 8.6875L10.1875 9.5L6.875 7.6875V4.375H7.8125V7.125L10.625 8.6875Z" fill="#56AB91" />
                                </svg>
                                {{ $layanan->durasi }} Menit
                                <span class="price">Rp.{{ number_format($layanan->harga) }}</span>
                            </p>
                        </label>
                    </div>
                    @endforeach
                </div>
            </div> -->
            <!-- <div id="tambahButton" class="pemesan text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                    <path d="M13.75 11.25H18.75V13.75H13.75V18.75H11.25V13.75H6.25V11.25H11.25V6.25H13.75V11.25ZM12.5 25C9.18479 25 6.00537 23.683 3.66117 21.3388C1.31696 18.9946 0 15.8152 0 12.5C0 9.18479 1.31696 6.00537 3.66117 3.66117C6.00537 1.31696 9.18479 0 12.5 0C15.8152 0 18.9946 1.31696 21.3388 3.66117C23.683 6.00537 25 9.18479 25 12.5C25 15.8152 23.683 18.9946 21.3388 21.3388C18.9946 23.683 15.8152 25 12.5 25ZM12.5 22.5C15.1522 22.5 17.6957 21.4464 19.5711 19.5711C21.4464 17.6957 22.5 15.1522 22.5 12.5C22.5 9.84783 21.4464 7.3043 19.5711 5.42893C17.6957 3.55357 15.1522 2.5 12.5 2.5C9.84783 2.5 7.3043 3.55357 5.42893 5.42893C3.55357 7.3043 2.5 9.84783 2.5 12.5C2.5 15.1522 3.55357 17.6957 5.42893 19.5711C7.3043 21.4464 9.84783 22.5 12.5 22.5Z" fill="#56AB91" />
                </svg> <span>Pemesan</span>
            </div> -->
            <div class="text-center">
                <button type="submit" class="simpan-button" id="simpan-pesanan" style="background-color: #56AB91;">Simpan</button> <!-- Tombol "Simpan" -->
            </div>
        </div>
    </form>
    @if(auth()->check() == true)
    <script>
        // Mendapatkan semua elemen checkbox
        var checkboxes = document.querySelectorAll('.form-check-input');
        // Menambahkan event listener untuk setiap checkbox
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                // Memastikan bahwa hanya satu checkbox yang dipilih pada satu waktu
                checkboxes.forEach(function(cb) {
                    if (cb !== checkbox) {
                        cb.checked = false;
                    }
                });
            });
        });
        //modal foreac
        $(document).ready(function() {
            $('.myModal').each(function(index) {
                $(this).click(function() {
                    // layanan/pesan/{id}/detail-terapis/{id_terapis}
                    // ajax 
                    var id_terapis = $(this).parent().parent().find('input[name="id_terapis"]').val();
                    console.log(id_terapis);
                    var id = "{{ $id }}";
                    var latitude_terapis;
                    var longtitude_terapis;
                    var latitude_user;
                    var longtitude_user;
                    $.ajax({
                        type: "GET",
                        url: "{{ url('customers/layanan/pesan') }}/" + id + "/detail-terapis/" + id_terapis,
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            // get data.data.terapis.alamat[]
                            latitude_terapis = data.data.terapis.alamat.latitude;
                            longtitude_terapis = data.data.terapis.alamat.longitude;
                            //convert integer values latitude_terapis and longtitude_terapis
                            // console.log([latitude_terapis, longtitude_terapis]);
                            //user location latitude and longtitude
                            latitude_user = data.data.user_alamat.latitude;
                            longtitude_user = data.data.user_alamat.longitude;
                            getUserLocation(latitude_user, longtitude_user);
                            // example modal show append 
                            $('#exampleModal').modal('show');
                            // /tittle rename 
                            $('.modal-title').text('Peta Digital Jarak Terapis');
                            // modal body

                            var map;
                            var userLocation;
                            var targetLocation = {
                                lat: parseFloat(latitude_terapis),
                                lng: parseFloat(longtitude_terapis)
                            }; // Koordinat tujuan
                            var travelPath;

                            function initMap() {
                                map = new google.maps.Map(document.getElementById('map'), {
                                    center: userLocation,
                                    zoom: 12
                                });

                                // Menambahkan marker untuk lokasi pengguna
                                var userMarker = new google.maps.Marker({
                                    position: userLocation,
                                    map: map,
                                    title: 'Lokasi Anda'
                                });

                                // Menambahkan marker untuk lokasi tujuan (warna biru)
                                var targetMarker = new google.maps.Marker({
                                    position: targetLocation,
                                    map: map,
                                    title: 'Lokasi Tujuan',
                                    icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png' // ikon biru
                                });

                                document.getElementById('latitude').textContent = userLocation.lat.toFixed(5);
                                document.getElementById('longitude').textContent = userLocation.lng.toFixed(5);

                                // Menghitung jarak menggunakan rumus Haversine
                                var jarak = haversine(userLocation, targetLocation);
                                document.getElementById('jarakValue').textContent = jarak.toFixed(2) + " km";

                                // Menghitung waktu tempuh (asumsi rata-rata kecepatan 50 km/jam)
                                var waktuTempuh = jarak / 50; // dalam jam
                                document.getElementById('waktuTempuh').textContent = waktuTempuh.toFixed(2) + " jam";

                                // Menampilkan rute perjalanan
                                travelPath = new google.maps.Polyline({
                                    path: [userLocation, targetLocation],
                                    geodesic: true,
                                    strokeColor: '#FF0000',

                                    strokeOpacity: 1.0,
                                    strokeWeight: 2
                                });

                                travelPath.setMap(map);
                            }

                            // Fungsi untuk menghitung jarak menggunakan rumus Haversine
                            function haversine(coord1, coord2) {
                                var R = 6371; // Radius bumi dalam kilometer
                                var dLat = (coord2.lat - coord1.lat) * (Math.PI / 180);
                                var dLng = (coord2.lng - coord1.lng) * (Math.PI / 180);
                                var a =
                                    Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                                    Math.cos(coord1.lat * (Math.PI / 180)) * Math.cos(coord2.lat * (Math.PI / 180)) *
                                    Math.sin(dLng / 2) * Math.sin(dLng / 2);
                                var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                                var distance = R * c;
                                return distance;
                            }

                            function getUserLocation(latitude_user, longtitude_user) {
                                if ("geolocation" in navigator) {
                                    var latitude_user = latitude_user;
                                    var longtitude_user = longtitude_user;
                                    navigator.geolocation.getCurrentPosition(function(position) {
                                        var lat = latitude_user;
                                        var lng = longtitude_user;
                                        userLocation = {
                                            lat: parseFloat(lat),
                                            lng: parseFloat(lng)
                                        };
                                        initMap();
                                    });
                                } else {
                                    alert("Geolocation is not supported by this browser.");
                                }
                            }

                            // getUserLocation();

                            // modal
                            // var modal = document.getElementById("myModal");
                            // var span = document.getElementById("closeModal");
                            // modal.style.display = "block";
                            // span.onclick = function() {
                            //     modal.style.display = "none";
                            // }
                            // window.onclick = function(event) {
                            //     if (event.target == modal) {
                            //         modal.style.display = "none";
                            //     }
                            // }
                        },
                        error: function(data) {
                            console.log(data);
                        }

                    });
                });
            });
        });
        // frame-tampilan-pencarian
        // get distance 
        // $(document).ready(function() {
        //     // ajax  layanan/pesan/{id}/pencarian-terapis-json
        //     // var lat array 
        //     var latitude_terapis = [];
        //     var longtitude_terapis = [];
        //     var map;
        //     var latitude_user;
        //     var longtitude_user;

        //     $.ajax({
        //         type: "GET",
        //         url: "{{ route('customers.pencarianTerapisJson', $id) }}",
        //         dataType: "json",
        //         success: function(data) {
        //             // for data.data.terapis 
        //             for (var i = 0; i < data.data.terapis.length; i++) {
        //                 //  data.data.terapis[i].alamat.longitude;
        //                 latitude_terapis.push(data.data.terapis[i].alamat.latitude);
        //                 longtitude_terapis.push(data.data.terapis[i].alamat.longitude);
        //             }
        //             //user location latitude and longtitude
        //             latitude_user = data.data.user_alamat.latitude;
        //             longtitude_user = data.data.user_alamat.longitude;

        //         },
        //         error: function(data) {
        //             console.log(data);
        //         }
        //     });
        //     // frame-maps
        //     $('.frame-maps').each(function(index) {

        //     });
        // });


        // form-pemesanan aler test
        $(document).ready(function() {
            $('#simpan-pesanan').click(function() {
                // input-pemesanan
                var input = $(this).val();
                //form 
                var form = $('#form-pemesanan').serialize();
                $.ajax({
                    type: "POST",
                    url: "{{ route('customers.simpanDetailPemesan', $id) }}",
                    data: form,
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        // Toastr with green background color for toastr style
                        //   if success true and false 
                        if (data.success == true) {
                            toastr.success(data.message, 'Success');
                            console.log(data);
                        } else {
                            toastr.error(data.message, 'Error');
                            //tampilkan error message
                            $('#nama_pemesanError').text(data.data.nama_pemesan);
                            $('#jk_pemesanError').text(data.data.jk_pemesan);
                            $('#jk_terapisError').text(data.data.jk_terapis);
                        }
                    },
                    error: function(data) {
                        console.log(data);
                        toastr.error(data.responseJSON.message, 'Error');
                    }
                });
            });
        });
    </script>
    <script>

    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrfSYyntgBJhrWpEGYgc1D6d5pYZISiAk&callback=initMap"></script>

    @endif


    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->

</body>

</html>