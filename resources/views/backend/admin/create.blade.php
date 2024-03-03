@extends('backend.layouts.master')
@section('title', 'Pijat.in || Karyawan')
@section('main-content')
    <div class="row justify-content-center align-items-center">
        <div class="col-md-12">
            <a href="{{ route('superadmin-admin.index') }}">
                <img src="{{ asset('assets/left_arrow.svg') }}" alt="icon" style="margin-left: 15px;">
            </a>
            <h4 class="font-weight-bold"
                style="padding-left: 10px; margin-bottom: 20px; margin-top: 10px; display: inline-block; vertical-align: middle;">
                Buat Akun Karyawan</h4>

        </div>
        <div class="card" style="width: 96%;">

            <div class="row">
                <div class="col-md-12">
                </div>
            </div>

            <form method="POST" action="" enctype="multipart/form-data" class="d-inline">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Depan<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama_depan" placeholder="Masukan nama depan"
                                    name="nama_depan" required>
                            </div>

                            <div class="form-group">
                                <label>Tempat Lahir<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="tempat_lahir"
                                    placeholder="Masukan tempat lahir" required name="tempat_lahir">
                            </div>

                            <div class="form-group">
                                <label>Jenis Kelamin <span class="text-danger">*</span></label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value=""> Pilih Jenis Kelamin </option>
                                    <option value="Laki-laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Masukan alamat email" required>
                            </div>

                            <div class="form-group">
                                <label>Alamat<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    placeholder="Masukan alamat lengkap" required>
                            </div>

                            <br>
                            <br>
                            <h4>Area Penempatan</h4>
                            <br>
                            <div class="form-group">
                                <label>Provinsi<span class="text-danger">*</span></label>
                                <select class="form-control" name="provinsi" id="provinsi">
                                    <option value="">Pilih Provinsi</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Kecamatan<span class="text-danger">*</span></label>
                                <select class="form-control" name="kecamatan" id="kecamatan">
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                            </div>

                            <div class="form-group" hidden>
                                <label for="provinceNameInput">Nama Provinsi:</label>
                                <input type="text" class="form-control" id="provinceNameInput" name="provinceNameInput"
                                    readonly>
                            </div>

                            <div class="form-group" hidden>
                                <label for="cityNameInput">Nama Kota:</label>
                                <input type="text" class="form-control" id="cityNameInput" name="cityNameInput" readonly>
                            </div>

                            <div hidden>
                                <label>Kecamatan:</label>
                                <input type="text" class="form-control" id="districtNameDisplay"
                                    name="districtNameDisplay" readonly>
                            </div>

                            <div hidden>
                                <label>Kelurahan:</label>
                                <input type="text" class="form-control" id="villageNameDisplay" name="villageNameDisplay"
                                    readonly>
                            </div>


                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Belakang<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama_belakang" name="nama_belakang"
                                    placeholder="Masukan nama belakang" required>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                                <span class="text-danger" id="errorTanggal_lahir"></span>
                            </div>

                            <div class="form-group">
                                <label>Pilih Hak Akses Akun <span class="text-danger">*</span></label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value=""> Pilih Role </option>
                                    <option value="admin">Admin</option>
                                    <option value="finance">Finance</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label>No. Ponsel<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp"
                                    placeholder="Masukan nomor ponsel" required>
                            </div>

                            <div class="form-group">
                                <label>Kode Pos <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="kodepos" id="kodepos"
                                    placeholder="Masukan kode pos" required>
                            </div>
                            <br>
                            <br>
                            <h4>-</h4>
                            <br>

                            <div class="form-group">
                                <label>Kota / Kabupaten <span class="text-danger">*</span></label>
                                <select class="form-control" name="kota" id="kota">
                                    <option value="">Pilih Kota/Kabupaten</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Kelurahan<span class="text-danger">*</span></label>
                                <select class="form-control" name="kelurahan" id="kelurahan">
                                    <option value="">Pilih kelurahan</option>
                                </select>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="rounded-circle overflow-hidden" style="width: 150px; height: 150px;">
                                <img id="profile-preview" src="{{ asset('assets/profile.jpg') }}" width="100%"
                                    height="100%" alt="foto profil">
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Upload Foto<span class="text-danger">*</span></label>
                                <input name="gambar" id="profile-image-input" type="file"
                                    class="form-control dt-post required" accept="image/*" onchange="previewImage()">
                            </div>
                            <br>
                            <h4>Pembuatan Kata Sandi</h4>
                            <div class="form-group">
                                <label>Kata Sandi<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Masukan kata sandi" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" onclick="togglePassword('password')">
                                            <i id="password-toggle" class="fa fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Konfirmasi Kata Sandi<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" name="confirm_password" id="confirm_password"
                                        class="form-control" placeholder="Konfirmasi kata sandi" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" onclick="togglePassword('confirm_password')">
                                            <i id="confirm_password-toggle" class="fa fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br><br><br><br><br><br>
                            <div>
                                <button type="submit" class="btn"
                                    style="background-color: #3FC1C0; color:white;">Buat Akun</button>
                            </div>

                        </div>
                    </div>

            </form>
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
        div.dataTables_wrapper div.dataTables_paginate {
            display: none;
        }
    </style>
@endpush

@push('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- <script src="{{ asset('app-assests/vendors/js/extensions/sweetalert2.all.min.js') }}"></script> -->
    <!-- Page level custom scripts -->
    <script src="{{ asset('backend/js/demo/datatables-demo.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>

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

        function togglePassword(inputId) {
            var passwordInput = document.getElementById(inputId);
            var passwordToggle = document.getElementById(inputId + '-toggle');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordToggle.className = 'fa fa-eye-slash';
            } else {
                passwordInput.type = 'password';
                passwordToggle.className = 'fa fa-eye';
            }
        }

        $(document).ready(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            // Menggunakan jQuery untuk melakukan permintaan AJAX ke endpoint getProvinsi
            $.get('/superadmin/getProvinsi', function(data) {
                // Menghapus semua opsi sebelumnya dari dropdown
                $('#provinsi').empty();

                // Menambahkan opsi default
                $('#provinsi').append($('<option>', {
                    value: '',
                    text: 'Pilih Provinsi'
                }));

                // Menambahkan data provinsi ke dropdown
                data.forEach(function(provinsi) {
                    $('#provinsi').append($('<option>', {
                        value: provinsi.id,
                        text: provinsi.name
                    }));
                });
            });

            document.getElementById('provinsi').addEventListener('change', function() {
                var selectedProvinsi = this.value;
                var kotaDropdown = document.getElementById('kota');

                // Jika "Pilih" yang dipilih, bersihkan dan sembunyikan dropdown "Kota / Kabupaten"
                if (selectedProvinsi === '') {
                    kotaDropdown.innerHTML = '<option value="">Pilih Kota/Kabupaten</option>';
                    kotaDropdown.hidden = true;
                } else {
                    // Jika provinsi dipilih, minta data kota berdasarkan ID provinsi
                    fetch(`/superadmin/getKota/${selectedProvinsi}`)
                        .then(response => response.json())
                        .then(data => {
                            // Bersihkan opsi-opsi sebelum menambahkan yang baru
                            kotaDropdown.innerHTML = '<option value="">Pilih Kota/Kabupaten</option>';
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
                    kecamatanDropdown.innerHTML = '<option value="">Pilih Kecamatan</option>';
                    kecamatanDropdown.hidden = true;
                } else {
                    // Jika kota dipilih, minta data kecamatan berdasarkan ID kota
                    fetch(`/superadmin/getKecamatan/${selectedKota}`)
                        .then(response => response.json())
                        .then(data => {
                            // Bersihkan opsi-opsi sebelum menambahkan yang baru
                            kecamatanDropdown.innerHTML = '<option value="">Pilih Kecamatan</option>';
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
                    kelurahanDropdown.innerHTML = '<option value="">Pilih kelurahan</option>';
                    kelurahanDropdown.hidden = true;
                } else {
                    // Jika kecamatan dipilih, minta data kelurahan berdasarkan ID kecamatan
                    fetch(`/superadmin/getKelurahan/${selectedKecamatan}`)
                        .then(response => response.json())
                        .then(data => {
                            // Bersihkan opsi-opsi sebelum menambahkan yang baru
                            kelurahanDropdown.innerHTML = '<option value="">Pilih kelurahan</option>';
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


            $(document).ready(function() {
                $('#provinsi').on('change', function() {
                    var selectedOption = $(this).find('option:selected');
                    var selectedProvinceName = selectedOption
                        .text(); // Mengambil teks opsi yang dipilih

                    $('#provinceNameInput').val(
                        selectedProvinceName); // Menggunakan val() untuk mengubah nilai input

                    var selectedProvinceId = selectedOption
                        .val(); // Mengambil nilai (value) dari opsi yang dipilih

                    if (selectedProvinceId) {
                        loadCities(selectedProvinceId);
                    }
                });

                $('#kota').on('change', function() {
                    var selectedOptionCities = $(this).find('option:selected');
                    var selectedCitiesName = selectedOptionCities
                        .text(); // Mengambil teks opsi yang dipilih

                    $('#cityNameInput').val(
                        selectedCitiesName); // Menggunakan val() untuk mengubah nilai input

                    var selectedCityId = selectedOptionCities
                        .val(); // Mengambil nilai (value) dari opsi yang dipilih

                    if (selectedCityId) {
                        loadDistricts(selectedCityId);
                    }
                });

                $('#kecamatan').on('change', function() {
                    var selectedDistrictId = $(this).val();
                    var selectedDistrictName = $(this).find('option:selected').text();

                    $('#districtNameDisplay').val(selectedDistrictName);
                    if (selectedDistrictId) {
                        loadSubDistricts(selectedDistrictId);
                    }
                });

                $('#kelurahan').on('change', function() {
                    var selectedOptionSubDistrict = $(this).find('option:selected');
                    var selectedSubDistrictName = selectedOptionSubDistrict
                        .text(); // Mengambil teks opsi yang dipilih

                    $('#villageNameDisplay').val(
                        selectedSubDistrictName); // Menggunakan val() untuk mengubah nilai input
                });


            });

        });
    </script>
@endpush
