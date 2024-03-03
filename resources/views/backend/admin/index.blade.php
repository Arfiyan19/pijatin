@extends('backend.layouts.master')
@section('title', 'Pijat.in || Karyawan')
@section('main-content')
    <div class="row justify-content-center align-items-center">
        <div class="col-md-12">
            <h4 class="font-weight-bold"
                style="padding-left: 10px; margin-bottom: 20px; margin-top: 10px; display: inline-block; vertical-align: middle;">
                Data Akun Karyawan</h4>

            <a href="{{ route('superadmin-admin.create') }}" class="btn btn-primary float-right" data-placement="bottom"
                title="Add Admin" style="margin-right: 10px;">
                <img src="{{ asset('icon/plus.svg') }}" alt="icon">
                Buat Akun Baru
            </a>
        </div>
        <div class="col-md-12" style="display: flex; left: 14px;">
            <a href="{{ route('superadmin-admin.index') }}" class="btn"
                style="background-color: white; color: #469D89;">Admin</a>
            <a href="{{ route('superadmin-finance.index') }}" class="btn"
                style="background-color: #888888; color: white;">Finance</a>
        </div>
        <div class="card" style="width: 96%;">

            <div class="row">
                <div class="col-md-12">
                </div>
            </div>

            <div class="row" style="margin-top: 20px;margin-left: 20px;">
                <div class="col-md-3" style="margin-right: -10px;">
                    <input type="text" id="search" name="search" class="form-control"
                        placeholder="Cari nomor id, nama, kota, dll" value="">
                </div>
                <button type="submit" class="btn" style="margin-left: -7px; background-color: #469D89;"><i
                        class="fa fa-search" style="color: white;"></i></button>

                <div class="col-md-8">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle float-right" type="button" id="dropdownMenuButton"
                            style="background-color: #ffffff; color: rgb(0, 0, 0); " data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><img src="{{ asset('assets/urutkan.svg') }}"
                                alt="icon">
                            Urutkan
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('superadmin-admin.index') }}">Semua</a>
                            <a class="dropdown-item"
                                href="{{ route('superadmin-admin.index', ['status' => 'active']) }}">Active</a>
                            <a class="dropdown-item"
                                href="{{ route('superadmin-admin.index', ['status' => 'deactive']) }}">Deactive</a>
                        </div>
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle float-right" type="button" id="dropdownMenuButton"
                            style="background-color: #ffffff; color: rgb(0, 0, 0); margin-right: 10px;"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('assets/filter.svg') }}" alt="icon   ">
                            Filter
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('superadmin-admin.index') }}">Semua</a>
                            <a class="dropdown-item"
                                href="{{ route('superadmin-admin.index', ['status' => 'active']) }}">Active</a>
                            <a class="dropdown-item"
                                href="{{ route('superadmin-admin.index', ['status' => 'deactive']) }}">Deactive</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Nomor ID</th>
                                <th>Nama Lengkap</th>
                                <th>Tanggal Begabung</th>
                                <th>Ponsel</th>
                                <th>Jenis Kelamin</th>
                                <th>Area Penempatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>ADM{{ $item->id }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                                    <td>{{ $item->no_hp }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->kota }}</td>
                                    <td>
                                        <div class="button-container">
                                            <a href="{{ route('superadmin-admin.show', $item->id) }}" class="btn-sm mr-1">
                                                <img src="{{ asset('assets/detail.svg') }}" alt="icon">
                                            </a>
                                            <form action="{{ route('superadmin-admin.destroy', $item->id) }}"
                                                method="POST" id="delete-form-{{ $item->id }}">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="delete-button" data-id="{{ $item->id }}">
                                                    <img src="{{ asset('assets/sampah.svg') }}" alt="icon">
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p>Halaman {{ $data->currentPage() }} dari {{ $data->lastPage() }}</p>
                    </div>
                    <div class="col-md-6">
                        {{ $data->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>



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
        $(document).ready(function() {
            // Fungsi pencarian
            function searchTable() {
                var searchText = $('#search').val().toLowerCase();

                $('table tbody tr').each(function() {
                    var rowText = $(this).text().toLowerCase();
                    if (rowText.includes(searchText)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }

            // Panggil fungsi pencarian saat input pencarian diubah
            $('#search').on('input', function() {
                searchTable();
            });
        });
    </script>

    <script>
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
