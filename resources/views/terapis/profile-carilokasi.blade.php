<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile cari lokasi</title>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href=" {{ asset('frontend/terapist/css/profile-carilokasi.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
    <!-- ======= link lib. icon ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- //cdn jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- import select  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- import select css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <!-- import select css -->
    <!-- import select css -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrfSYyntgBJhrWpEGYgc1D6d5pYZISiAk"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrfSYyntgBJhrWpEGYgc1D6d5pYZISiAk&callback=initMap"></script>
</head>

<body>
    <div class="container">
        <div class="topbar">
            <a href="http://127.0.0.1:8000/terapis/profile-alamatbaru">
                <i class="material-icons" style="font-size:36px">chevron_left</i>
            </a>
            <p>Cari Lokasi</p>
        </div>

        @if(auth()->check() == false)
        <div class="content">
            <div class="lokasi">Pilih Provinsi</div>
            <a href="http://127.0.0.1:8000/terapis/profile-carilokasi2">
                <div class="provinsi">DIY</div>
            </a>
            <div class="provinsi">DKI jakarta</div>
            <div class="provinsi">Jawa Barat</div>
            <div class="provinsi">Jawa Tengah</div>
            <div class="provinsi">Jawa Timur</div>
        </div>
        @elseif(auth()->check() == true)
        <div class="content">
            <div class="lokasi"> Provinsi</div>
            <!-- //select option  -->
            <select name="province" id="province" class="form-control" style="height: 30px; border-radius: 10px; padding-left: 10px;">
                <option value="0"> Provinsi</option>
            </select>
            <div class="lokasi" style="margin-top: 10px;"> Kota</div>
            <!-- //select option  -->
            <select name="city" id="city" class="form-control" style="height: 30px; border-radius: 10px; padding-left: 10px;">
                <option value="0"> Pilih kota</option>
            </select>
            <div class="lokasi" style="margin-top: 10px;"> Kecamatan</div>
            <!-- //select option  -->
            <select name="district" id="district" class="form-control" style="height: 30px; border-radius: 10px; padding-left: 10px;">
                <option value="0"> Pilih Kecamatan</option>
            </select>
            <div class="lokasi" style="margin-top: 10px;"> Kelurahan</div>
            <!-- //select option  -->
            <select name="subdistrict" id="subdistrict" class="form-control" style="height: 30px; border-radius: 10px; padding-left: 10px;">
                <option value="0"> Pilih Kelurahan</option>
            </select>
            <div class="lokasi" style="margin-top: 10px;"> Kode Pos</div>
            <input type="text" name="kodepos" id="kodepos" class="form-control" style="height: 30px; border-radius: 10px; padding-left: 10px;" placeholder="Kode Pos">
            <div class="lokasi" style="margin-top: 10px;">Titik Lokasi</div>
            <a href="javascript:void(0)" class="btn btn-primary" onclick="getLocation()">
                <img src="{{ asset('frontend/assets/image/location.png') }}" alt="">
            </a>
            <input type="text" name="latitude" id="latitude" class="form-control" style="height: 30px; border-radius: 10px; padding-left: 10px;" placeholder="Latitude">
            <input type="text" name="longitude" id="longitude" class="form-control" style="height: 30px; border-radius: 10px; padding-left: 10px;" placeholder="Longitude">


        </div>
        <div class="tombol" center>
            <button type="submit" class="btn btn-simpan">Simpan</button>
        </div>
        <!-- //buat sumpan nama provinsi,city,kota,kecamatan,kelurahan,kodepos -->
        @endif
    </div>
</body>

</html>
@if(auth()->check() == true)
<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        var lat = position.coords.latitude.toFixed(4);
        var lng = position.coords.longitude.toFixed(4);
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
    }

    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                alert("User denied the request for Geolocation.");
                break;
            case error.POSITION_UNAVAILABLE:
                alert("Location information is unavailable.");
                break;
            case error.TIMEOUT:
                alert("The request to get user location timed out.");
                break;
            case error.UNKNOWN_ERROR:
                alert("An unknown error occurred.");
                break;
        }
    }
    // terapis.provinsi
    // province onclick 
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('terapis.provinsi', $data->id) }}",
            type: "GET",
            dataType: "json",
            success: function(data) {
                // console.log(data);
                $('select[name="province"]').empty();
                $('select[name="province"]').append('<option value="0">Pilih Provinsi</option>');
                $('select[name="province"]').select2();
                $.each(data.data, function(key, value) {
                    $('select[name="province"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                });
            }
        });
    });

    $(document).ready(function() {
        // province onchange
        $('select[name="province"]').on('change', function() {
            var provinceId = $(this).val();
            $.ajax({
                url: "{{ route('terapis.city', $data->id) }}",
                type: "GET",
                dataType: "json",
                data: {
                    id: provinceId
                },
                success: function(data) {
                    // console.log(data);
                    $('select[name="city"]').empty();
                    $('select[name="city"]').append('<option value="0">Pilih Kota</option>');
                    $('select[name="city"]').select2();
                    $.each(data.data, function(key, value) {
                        $('select[name="city"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });
        //city change
        $('select[name="city"]').on('change', function() {
            var cityId = $(this).val();
            // console.log(cityId);
            $.ajax({
                url: "{{ route('terapis.district', $data->id) }}",
                type: "GET",
                dataType: "json",
                data: {
                    id: cityId
                },
                success: function(data) {
                    // console.log(data);
                    $('select[name="district"]').empty();
                    $('select[name="district"]').append('<option value="0">Pilih Kecamatan</option>');
                    $('select[name="district"]').select2();
                    $.each(data.data, function(key, value) {
                        $('select[name="district"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });
        //district change
        $('select[name="district"]').on('change', function() {
            var districtId = $(this).val();
            // console.log(districtId);
            $.ajax({
                url: "{{ route('terapis.village', $data->id) }}",
                type: "GET",
                dataType: "json",
                data: {
                    id: districtId
                },
                success: function(data) {
                    // console.log(data);
                    $('select[name="subdistrict"]').empty();
                    $('select[name="subdistrict"]').append('<option value="0">Pilih Kelurahan</option>');
                    $('select[name="subdistrict"]').select2();
                    $.each(data.data, function(key, value) {
                        $('select[name="subdistrict"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });
        //jika klik simpan
        $('.btn-simpan').on('click', function() {
            var kodepos = $('#kodepos').val();
            var provinsiName = $('select[name="province"]').val();
            var kotaName = $('select[name="city"]').val();
            var kecamatanName = $('select[name="district"]').val();
            var kelurahanName = $('select[name="subdistrict"]').val();
            //var latitude dan longitude
            var latitude = $('#latitude').val();
            var longitude = $('#longitude').val();
            console.log([
                kodepos,
                provinsiName,
                kotaName,
                kecamatanName,
                kelurahanName,
                latitude,
                longitude
            ]);
            $.ajax({
                url: "{{ route('terapis.postCariLokasi', $data->id) }}",
                type: "POST",
                dataType: "json",
                data: {
                    kode_pos: kodepos,
                    _token: '{{ csrf_token() }}',
                    provinsi: $('#province option:selected').text(),
                    kota: $('#city option:selected').text(),
                    kecamatan: $('#district option:selected').text(),
                    kelurahan: $('#subdistrict option:selected').text(),
                    latitude: latitude,
                    longitude: longitude
                },
                success: function(data) {
                    var idAlamat = data.data.id;
                    var idUser = data.id;
                    console.log(data);
                    // alert(idAlamat);
                    console.log(data);
                    //swall
                    toastr.success('Data Berhasil di tambahkan', 'Success', {
                        timeOut: 2000,
                        fadeOut: 2000,
                        onHidden: function() {
                            // terapis-profile/alamat/{id}/edit/{id_alamat}
                            window.location.href = "{{ url('terapis/terapis-profile/alamat') }}/" + idUser + "/edit/" + idAlamat;
                        }
                    });
                }
            });
        });

    });
</script>

@endif