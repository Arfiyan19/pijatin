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

    <title>Pijat.in</title>
</head>

<body>
    <div class="topbar">
        <div class="content">
            <div class="tittle">
                <a href="{{ route('profile.index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                        <path d="M19.9492 25.9502L13.0492 19.0502C12.8992 18.9002 12.7932 18.7377 12.7312 18.5627C12.6682 18.3877 12.6367 18.2002 12.6367 18.0002C12.6367 17.8002 12.6682 17.6127 12.7312 17.4377C12.7932 17.2627 12.8992 17.1002 13.0492 16.9502L19.9492 10.0502C20.2242 9.77519 20.5742 9.6377 20.9992 9.6377C21.4242 9.6377 21.7742 9.77519 22.0492 10.0502C22.3242 10.3252 22.4617 10.6752 22.4617 11.1002C22.4617 11.5252 22.3242 11.8752 22.0492 12.1502L16.1992 18.0002L22.0492 23.8502C22.3242 24.1252 22.4617 24.4752 22.4617 24.9002C22.4617 25.3252 22.3242 25.6752 22.0492 25.9502C21.7742 26.2252 21.4242 26.3627 20.9992 26.3627C20.5742 26.3627 20.2242 26.2252 19.9492 25.9502Z" fill="white" />
                    </svg></a>
                <p>Detail KTP</p>
            </div>
        </div>
    </div>
    <div class="container-detailktp">
        <div class="header">
            <div class="tittle">Informasi Data Diri</div>
        </div>
        <!-- //card-foto circle -->

        <!-- <div class="card-foto"> -->
        <div class="frame" style="cursor: pointer;">
            <!-- <div class="txt">Foto KTP</div> -->
            <div class="pict">
                <img src="{{ asset('storage/foto_ktp/' . $data['customers']['foto_ktp'] ) }}" alt="">
            </div>
        </div>
        <!-- </div> -->

        <!-- <div class="card-foto">
            <div class="frame">
                <div class="txt">Foto KTP</div>
                <div class="pict">
                    <img src="{{ asset('storage/foto_ktp/' . $data['customers']['foto_ktp'] ) }}" alt="">

                </div>
            </div>
            <div class="frame">
                <div class="txt">Foto KTP</div>
                <div class="pict"><img src="{{ asset('frontend/assets/image/ktp-selfi.png') }}" alt=""></div>
            </div>
        </div> -->

        <div class="detail">
            <!-- //form  -->

            <div class="frame">
                <div class="txt">Isi identitas sesuai dengan data diri KTP anda</div>

                <div class="parent-label">
                    <div class="form">
                        <label for="nama" class="form-label">Nama Lengkap <span>*</span> </label>
                        <input class="form-control" id="nama" value="{{ $data['customers']['nama'] }}" required>
                    </div>
                    <div class="form">
                        <label for="nik" class="form-label">Nomor NIK KTP <span>*</span> </label>
                        <input class="form-control" id="nik" value="{{ $data['customers']['nik'] }}" required>
                    </div>
                    <!-- //nomor telepon  -->
                    <div class="form">
                        <label for="no" class="form-label">Nomor Telepon <span>*</span> </label>
                        <input class="form-control" id="no" value="{{ $data['customers']['no_hp'] }}" required>
                    </div>
                    <div class="form">
                        <label for="tl" class="form-label">Tempat Lahir <span>*</span> </label>
                        <input class="form-control" id="tl" value="{{ $data['customers']['tempat_lahir'] }}" required>
                    </div>
                    <div class="form">
                        <label for="tanggal" class="form-label">Tanggal Lahir <span>*</span></label>
                        <!-- date  -->
                        <input class="form-control" id="tanggal" value="{{ $data['customers']['tanggal_lahir'] }}" type="date" required>
                        <!-- <input class="form-control" id="tanggal" value="{{ $data['customers']['tanggal_lahir'] }}" required> -->
                    </div>
                    <!-- //jenis kelamin  radio -->
                    <div class="form">
                        <label for="jk" class="form-label">Jenis Kelamin <span>*</span></label>
                        <div class="radio">
                            @if($data['customers']['jenis_kelamin'] == 'Laki-Laki')
                            <input type="radio" id="Laki-Laki" name="jk" value="Laki-Laki" style="margin-right: 10px;margin-top: 4px;" checked>
                            <label for="Laki-Laki">Laki-Laki</label>
                            <input type="radio" id="Perempuan" name="jk" value="Perempuan" style="margin-left: 10px;margin-top: 4px;">
                            <label for="Perempuan">Perempuan</label>
                            @else
                            <input type="radio" id="Laki-Laki" name="jk" value="Laki-Laki" style="margin-right: 10px;margin-top: 4px;">
                            <label for="Laki-Laki">Laki-Laki</label>
                            <input type="radio" id="Perempuan" name="jk" value="Perempuan" style="margin-left: 10px;margin-top: 4px;" checked>
                            <label for="Perempuan">Perempuan</label>
                            @endif
                        </div>
                    </div>

                </div>
                <!-- //button  -->
                <!-- //buton  -->
                <div class="button">
                    <!-- //a href java script simpan by id  -->

                    <button>Simpan</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(function() {
        // Inisialisasi kalender pop-up
        $("#tanggal").datepicker({
            dateFormat: "dd/mm/yy", // Format tanggal yang diinginkan
            changeMonth: true,
            changeYear: true
        });
    });
    //button click alert 
    $('.button button').click(function() {
        // customers.postDetailKtp
        // profile/{id}/detail-ktp 
        $.ajax({
            url: "{{ route('customers.postDetailKtp', ['id' => $data->id]) }}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                nama: $('#nama').val(),
                nik: $('#nik').val(),
                no_hp: $('#no').val(),
                tempat_lahir: $('#tl').val(),
                tanggal_lahir: $('#tanggal').val(),
                jenis_kelamin: $('input[name=jk]:checked').val()
            },
            success: function(data) {
                toastr.success('Data Berhasil Disimpan')
                // profile
                setTimeout(function() {
                    window.location.href = "{{ route('profile.index') }}"
                }, 1000)
            },
            error: function(data) {
                toastr.error('Data Gagal Disimpan')
            }
        })
        // toastr.success('Data Berhasil Disimpan')
    });
</script>


</html>