@extends('backend.layouts.master')
@section('title', 'Pijat.in || Pelanggan')
@section('main-content')
    <div class="row justify-content-center align-items-center">
        <div class="col-md-12">
            <h4 class="font-weight-bold"
                style="padding-left: 10px; margin-bottom: 20px; margin-top: 10px; display: inline-block; vertical-align: middle;">
                Verifikasi Akun Pelanggan</h4>
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
                    <table id="myTable" class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Nomor ID</th>
                                <th>Nama Lengkap</th>
                                <th>Tanggal Lahir</th>
                                <th>Email</th>
                                <th>Jenis Kelamin</th>
                                <th>Kota/Kabupaten</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>CTS{{ $item->id }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ date('d M Y', strtotime($item->tanggal_lahir)) }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->kota }}</td>
                                    <td>
                                        <div class="button-container">
                                            <a href="{{ route('admin.customer-verif-detail', $item->id) }}"
                                                class="btn-sm mr-1">
                                                <img src="{{ asset('assets/detail.svg') }}" alt="icon">
                                            </a>
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
    </div>
    </div>

@endsection
@push('styles')
    <style>
        div.dataTables_wrapper div.dataTables_paginate {
            display: none;
        }
    </style>
    <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css">
    <link href = "{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel = "stylesheet">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
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
        $(document).ready(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('backend/js/demo/datatables-demo.js') }}"></script>
@endpush
