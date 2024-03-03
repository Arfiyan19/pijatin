@extends('backend.layouts.master')
@section('title', 'Pijat.in || Karyawan')
@section('main-content')

    <div class="row justify-content-center align-items-center">
        {{-- h4 Data Akun karyawan disebelah kiri tidak center dengan tulisan bold dan sejajar dengan card --}}
        <div class="col-md-12">
            <h4 class="font-weight-bold"
                style="padding-left: 10px; margin-bottom: 20px; margin-top: 10px; display: inline-block; vertical-align: middle;">
                Data Daftar Cabang</h4>
            {{-- 
            <a href="javascript:void(0)" data-toggle="modal" data-target="#adminModal" class="btn btn-primary float-right"
                data-placement="bottom" title="Add Admin" style="margin-right: 10px;">
                <img src="{{ asset('icon/plus.svg') }}" alt="icon">
                Buat Akun Baru
            </a> --}}
        </div>

        <div class="card" style="width: 96%;">

            <div class="row">
                <div class="col-md-12">
                </div>
            </div>

            <form action="#" method="GET" style="margin-top: 20px;margin-left: 20px;">
                <div class="row">
                    <div class="col-md-4" style="margin-right: -10px;">
                        <input type="text" name="search" class="form-control" placeholder="Search" value="">
                    </div>
                    <button type="submit" class="btn" style="margin-left: -7px; background-color: #469D89;"><i
                            class="fa fa-search" style="color: white;"></i></button>
                </div>
            </form>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID Cabang</th>
                                <th>Kota</th>
                                <th>Provinsi</th>
                                <th>Tanggal Peresmian</th>
                                <th>Status Cabang</th>
                                <th>Email Cabang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>CBS{{ $item->id }}</td>
                                    <td>{{ $item->kota }}</td>
                                    <td>{{ $item->provinsi }}</td>
                                    <td>{{ $item->tanggal_berdiri }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>N/A</td>
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
        });
    </script>
@endpush
