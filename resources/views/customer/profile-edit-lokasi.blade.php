<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pijat.in || Customers || Profile Edit Alamat</title>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href=" {{ asset('frontend/terapist/css/profile-alamatbaru.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
    <!-- ======= link lib. icon ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- //cdn jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <style>
        .lokasi {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .colom {
            /* Gaya untuk kolom pertama di kiri */
            flex: 1;
        }

        .colom2 {
            /* Gaya untuk kolom kedua di kanan */
            margin-left: 10px;
            /* Sesuaikan dengan margin yang diinginkan */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="topbar">
            <a href="{{ route('customers.alamat', ['id' => $id]) }}">
                <i class="material-icons" style="font-size:36px">chevron_left</i>
            </a>
            <p>Edit Alamat</p>
        </div>

        <div class="content">
            <div class="lokasi">
                <div class="colom">Lokasi </div>
                <div class="colom2">
                    <a href="javascript:void(0)" onclick="reset()" style="color: green;">
                        Atur Ulang
                    </a>
                </div>
            </div>
            <a href="{{ route('customers.editCariLokasi', ['id' => $id, 'id_alamat' => $id_alamat]) }}">
                <div class="cari" style="height: 50px;">
                    @if($data->alamat[0]->alamat_lengkap == "")
                    <label for="cari" style="color: black;">Cari lokasi anda</label>
                    @else
                    <label for="cari" style="color: black;">{{ $data->alamat[0]->provinsi }}, {{ $data->alamat[0]->kota }}, {{ $data->alamat[0]->kecamatan }}, {{ $data->alamat[0]->kelurahan }}, Kode pos ( {{ $data->alamat[0]->kode_pos }} )</label>
                    <i class="material-icons" style="font-size:36px">chevron_right</i>
                    @endif
                </div>
            </a>
            <form action="{{ route('customers.updateAlamat', ['id' => $id, 'id_alamat' => $id_alamat]) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- //id hidden  -->
                <input type="hidden" name="idAlamat" value="{{ $id_alamat }}">
                <div class="manual">
                    <label for="alamat">Alamat detail </label>
                    <textarea name="alamat" id="alamat" cols="50" rows="5">{{ $data->alamat[0]->alamat_lengkap }}</textarea>
                </div>
                <div class="tombol">
                    <button type="button" onclick="history.back()">batal</button>
                    <button type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<script>
    function reset() {
        var id = '{{ $id }}';
        var idAlamat = '{{ $id_alamat }}';
        $.ajax({
            // post 
            type: "POST",
            url: "{{ route('customers.resetCariLokasi', ['id' => $id, 'id_alamat' => $id_alamat]) }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                idAlamat: idAlamat
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                toastr.success('Berhasil di reset');
                setTimeout(function() {
                    window.location.href = "{{ url('customers/profile') }}/" + id + "/alamat/edit/" + idAlamat + "/carilokasi";
                }, 1000);
            },
            error: function(data) {
                toastr.error('Gagal di reset');
            }
        });
    }
</script>