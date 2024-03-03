@extends('backend.layouts.master')

@section('title', 'Pijet.In || Edit Profile')
@section('main-content')
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 95%;">
            <div class="card shadow mb-4">
                <div class="card-header py-4">
                    <h4 class="m-0 font-weight-bold text-primary float-left">Edit Profile</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('update.profile', Auth::user()->id) }}"
                            enctype="multipart/form-data" class="d-inline">
                            @csrf
                            @method('PUT')
                            {{-- button save disebelah kanan --}}

                            <div class="row justify-content-center">

                                {{-- Tampilkan foto di tengah --}}
                                <div class="col-md-4">
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="rounded-circle overflow-hidden" style="width: 150px; height: 150px;">
                                            <img id="profile-preview" src="{{ asset('storage/' . $user->admins->foto) }}"
                                                width="100%" height="100%" alt="foto profil">
                                        </div>
                                        <label for="profile-image-input" class="image-upload-label">
                                            <i class="fas fa-pencil-alt"></i> <!-- FontAwesome pencil icon -->
                                        </label>
                                        <input type="file" name="foto" id="profile-image-input"
                                            class="image-upload-input" accept="image/*" aria-hidden="true">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success btn-sm float-right"><i
                                            class="fas fa-save"></i> Save</button>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" name="nama"
                                                    value="{{ $user->admins->nama }}">
                                            </div>

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" name="email"
                                                    value="{{ $user->email }}">
                                            </div>
                                            <!-- nik  -->
                                            <div class="form-group">
                                                <label>NIK</label>
                                                <input type="text" class="form-control" name="nik"
                                                    value="{{ $user->admins->nik }}">
                                            </div>
                                            <!-- jenis kelamin  -->
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                                    <option value="Laki-laki"
                                                        {{ $user->admins->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                                        Laki-laki</option>
                                                    <option value="Perempuan"
                                                        {{ $user->admins->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                                        Perempuan</option>
                                                </select>
                                            </div>
                                            <!-- no_telepon -->
                                            <div class="form-group">
                                                <label>No Telephone</label>
                                                <input type="text" class="form-control" name="no_hp"
                                                    value="{{ $user->admins->no_hp }}">
                                            </div>
                                            <!-- upload ktp  -->
                                            <div class="form-group">
                                                <label>Upload KTP</label>
                                                <input type="file" class="form-control" name="ktp"
                                                    value="{{ $user->admins->foto_ktp }}">
                                                <p class="text-danger">{{ $errors->first('foto_ktp') }}</p>
                                                <p class="text-warning">Kosongkan jika tidak ingin mengubah gambar</p>
                                                <img src="{{ asset('storage/foto_ktp/' . $user->admins->foto_ktp) }}"
                                                    width="300px" height="200px" alt="foto ktp">
                                                <input type="hidden" name="old_ktp" value="{{ $user->admins->foto_ktp }}">
                                                <br>
                                            </div>
                                        </div>
                                        <!-- /bagian sebelah kanan  -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tempat Lahir</label>
                                                <input type="text" class="form-control" name="tempat_lahir"
                                                    value="{{ $user->admins->tempat_lahir }}">
                                            </div>

                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tanggal_lahir"
                                                    value="{{ $user->admins->tanggal_lahir }}">
                                            </div>
                                            <!-- //form multiple select provinsi  -->
                                            <div class="form-group">
                                                <label>Provinsi</label>
                                                <select class="form-control" name="provinsi" id="provinsi">
                                                    <option value="">{{ $alamat->provinsi }}</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Kota / Kabupaten</label>
                                                <select class="form-control" name="kota" id="kota">
                                                    <option value="">{{ $alamat->kota }}</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Kecamatan </label>
                                                <select class="form-control" name="kecamatan" id="kecamatan">
                                                    <option value="">{{ $alamat->kecamatan }}</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Kelurahan</label>
                                                <select class="form-control" name="kelurahan" id="kelurahan">
                                                    <option value="">{{ $alamat->kelurahan }}</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label> Kode Pos</label>
                                                <input type="text" class="form-control" name="kode_pos"
                                                    id="kode_pos" value="{{ $alamat->kode_pos }}">
                                            </div>

                                            <!-- //alalamat  -->
                                            <div class="form-group">
                                                <label>Alamat Lengkap</label>
                                                <textarea type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap" style="height: 128px;">{{ $alamat->alamat_lengkap }}</textarea>
                                            </div>

                                            <!-- end  -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

@endsection

@push('styles')
    <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css">

    <style>
        /* Style for the file input */
        .image-upload-input {
            display: none;
        }
    </style>
@endpush

@push('scripts')
    <script>
        const imageInput = document.getElementById('profile-image-input');
        const imagePreview = document.getElementById('profile-preview');

        imageInput.addEventListener('change', function() {
            const file = imageInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script>
        // Menggunakan jQuery untuk melakukan permintaan AJAX ke endpoint getProvinsi
        $.get('/admin/getProvinsi', function(data) {
            // Menghapus semua opsi sebelumnya dari dropdown
            $('#provinsi').empty();

            // Menambahkan opsi default
            $('#provinsi').append($('<option>', {
                value: '',
                text: '{{ $alamat->provinsi }}'
            }));

            // Menambahkan data provinsi ke dropdown
            data.forEach(function(provinsi) {
                $('#provinsi').append($('<option>', {
                    value: provinsi.id,
                    text: provinsi.name
                }));
            });
        });

        // Menangkap perubahan pada dropdown "Provinsi"
        document.getElementById('provinsi').addEventListener('change', function() {
            var selectedProvinsi = this.value;
            var kotaDropdown = document.getElementById('kota');

            // Jika "Pilih" yang dipilih, bersihkan dan sembunyikan dropdown "Kota / Kabupaten"
            if (selectedProvinsi === '') {
                kotaDropdown.innerHTML = '<option value="">Pilih</option>';
                kotaDropdown.hidden = true;
            } else {
                // Jika provinsi dipilih, minta data kota berdasarkan ID provinsi
                fetch(`/admin/getKota/${selectedProvinsi}`)
                    .then(response => response.json())
                    .then(data => {
                        // Bersihkan opsi-opsi sebelum menambahkan yang baru
                        kotaDropdown.innerHTML = '<option value="">Pilih</option>';
                        data.forEach(city => {
                            var option = document.createElement('option');
                            option.value = city.id;
                            option.text = city.name;
                            kotaDropdown.appendChild(option);
                        });
                        // Tampilkan dropdown "Kota / Kabupaten"
                        kotaDropdown.hidden = false;
                    })
                    .catch(error => {
                        console.error('Terjadi kesalahan:', error);
                    });
            }
        });

        // Menangkap perubahan pada dropdown "Kota / Kabupaten"
        document.getElementById('kota').addEventListener('change', function() {
            var selectedKota = this.value;
            var kecamatanDropdown = document.getElementById('kecamatan');

            // Jika "Pilih" yang dipilih, bersihkan dan sembunyikan dropdown "Kecamatan"
            if (selectedKota === '') {
                kecamatanDropdown.innerHTML = '<option value="">Pilih</option>';
                kecamatanDropdown.hidden = true;
            } else {
                // Jika kota dipilih, minta data kecamatan berdasarkan ID kota
                fetch(`/admin/getKecamatan/${selectedKota}`)
                    .then(response => response.json())
                    .then(data => {
                        // Bersihkan opsi-opsi sebelum menambahkan yang baru
                        kecamatanDropdown.innerHTML = '<option value="">Pilih</option>';
                        data.forEach(kecamatan => {
                            var option = document.createElement('option');
                            option.value = kecamatan.id;
                            option.text = kecamatan.name;
                            kecamatanDropdown.appendChild(option);
                        });
                        // Tampilkan dropdown "Kecamatan"
                        kecamatanDropdown.hidden = false;
                    })
                    .catch(error => {
                        console.error('Terjadi kesalahan:', error);
                    });
            }
        });

        // Menangkap perubahan pada dropdown "Kecamatan"
        document.getElementById('kecamatan').addEventListener('change', function() {
            var selectedKecamatan = this.value;
            var kelurahanDropdown = document.getElementById('kelurahan');

            // Jika "Pilih" yang dipilih, bersihkan dan sembunyikan dropdown "Kelurahan"
            if (selectedKecamatan === '') {
                kelurahanDropdown.innerHTML = '<option value="">Pilih</option>';
                kelurahanDropdown.hidden = true;
            } else {
                // Jika kecamatan dipilih, minta data kelurahan berdasarkan ID kecamatan
                fetch(`/admin/getKelurahan/${selectedKecamatan}`)
                    .then(response => response.json())
                    .then(data => {
                        // Bersihkan opsi-opsi sebelum menambahkan yang baru
                        kelurahanDropdown.innerHTML = '<option value="">Pilih</option>';
                        data.forEach(kelurahan => {
                            var option = document.createElement('option');
                            option.value = kelurahan.id;
                            option.text = kelurahan.name;
                            kelurahanDropdown.appendChild(option);
                        });
                        // Tampilkan dropdown "Kelurahan"
                        kelurahanDropdown.hidden = false;
                    })
                    .catch(error => {
                        console.error('Terjadi kesalahan:', error);
                    });
            }
        });
    </script>
@endpush
