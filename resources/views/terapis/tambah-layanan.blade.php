<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Layanan</title>

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
</head>

<body>
    <div class="container">
        <div class="topbar">
            <a href="http://127.0.0.1:8000/terapis/profile-alamatbaru">
                <i class="material-icons" style="font-size:36px">chevron_left</i>
            </a>
            <p>Tambah Layanan</p>
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
            <div class="lokasi"> Nama Layanan </div>
            <select name="layanan" id="layanan" class="form-control" style="height: 30px; border-radius: 10px; padding-left: 10px;">
                <option value="0"> Pilih Layanan</option>
            </select>
            <div class="lokasi"> Harga Layanan </div>
            <input type="text" name="harga" id="harga" class="form-control" style="height: 30px; border-radius: 10px; padding-left: 10px;" readonly>
            <div class="lokasi"> Durasi Layanan </div>
            <input type="text" name="durasi" id="durasi" class="form-control" style="height: 30px; border-radius: 10px; padding-left: 10px;" readonly>
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
    // terapis.provinsi
    // province onclick 
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('terapis.layanan.getLayanan', $data->id) }}",
            type: "GET",
            dataType: "json",
            success: function(data) {
                // console.log(data);
                $('select[name="layanan"]').empty();
                $('select[name="layanan"]').append('<option value="0">Pilih Layanan</option>');
                //each 0	Object { id: 4, nama_layanan: "Deep tissue Massaage", harga: 250000, … }
                $.each(data, function(key, value) {
                    $('select[name="layanan"]').append('<option value="' + value.id + '">' + value.nama_layanan + '</option>');
                });
            }
        });
    });
    $(document).ready(function() {
        // Ketika select layanan berubah
        $('#layanan').change(function() {
            var layananId = $(this).val(); // Mendapatkan nilai ID layanan yang dipilih
            var id_terapis = "{{ $data->id }}"; // Mendapatkan ID terapis
            var url = "{{ route('terapis.layanan.getLayananID', ['id' => ':id_terapis', 'id_layanan' => ':layananId']) }}";
            url = url.replace(':id_terapis', id_terapis).replace(':layananId', layananId);
            if (layananId) {
                // Mengirim permintaan AJAX untuk mendapatkan detail layanan berdasarkan ID
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        // Mengisi nilai harga kasih format number rp.100.000,000 dan durasi menit
                        $('#harga').val('Rp' + data.harga.toLocaleString());
                        $('#durasi').val(data.durasi + ' Menit');
                    }
                });
            } else {
                // Jika layanan tidak dipilih, mengosongkan nilai harga dan durasi
                $('#harga').val('');
                $('#durasi').val('');
            }
        });
    });
    //simpan onclick alert
    $('.btn-simpan').click(function() {
        var layanan = $('#layanan').val();
        var id_terapis = "{{ $data->id }}";
        //ajax
        $.ajax({
            // terapis-profile/layanan/{id}/tambah
            url: "{{ route('terapis.layanan.tambahPost', ['id' => $data->id]) }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                layanan: layanan,
                id_terapis: id_terapis
            },
            success: function(data) {
                toastr.success('Layanan berhasil ditambahkan');
                setTimeout(function() {
                    // terapis-profile/layanan/{id}
                    // terapis-profile/layanan/{id}
                    window.location.href = "{{ url('terapis/terapis-profile/layanan/' . $data->id) }}";
                }, 1000);
            },
            error: function(data) {
                toastr.error('Layanan gagal ditambahkan');
            }
        });
    });
</script>

@endif