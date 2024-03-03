@extends('backend.layouts.master')
@section('title', 'Pijat.in || Order')
@section('main-content')
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 95%;">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
                <div class="card-header py-4">
                    <h5 class="m-0 font-weight-bold text-primary float-left">Data Orders</h5>

                </div>
                {{-- dropdown untuk filter status --}}
                <div class="card-header mb-4">
                    <div class="row">
                        <form action="#" method="GET" class="col-md-6">
                            <div class="form-group">
                                <label for="status" class="sr-only">Status</label>
                                <select id="status" name="status" class="form-control"
                                    style="border: 1px solid #015b3b;">
                                    <span class="badge badge-success"><i class="fa fa-circle"></i></span>
                                    <option value="">Total Order</option>
                                    <option value="masuk">Masuk </option>
                                    <option value="batal">Batal </option>
                                </select>
                            </div>
                        </form>
                        {{-- samping kanan button filter yang dapat memunculkan popup daerah & layanan --}}
                        <div class="col-md-6 text-right">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                {{-- icon filter --}}
                                <i class="fas fa-filter"></i> Filter
                            </button>

                            <!-- Modal -->
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="data-table table table-sm table-bordered table-striped" id="data-table" width="100%"
                            cellspacing="0">
                            <thead style="background: linear-gradient(180deg, #036666 0%, #67B99A 100%);">
                                <tr style="color: rgb(245, 240, 240);">
                                    <!-- No -->
                                    <th>No.</th>
                                    <th>Nama Customers</th>
                                    <th>Layanan</th>
                                    <!-- Tanggal Waktu Pemesanan -->
                                    <th>Tanggal Pemesanan</th>
                                    <!-- Daerah -->
                                    <th>Daerah</th>
                                    <!-- Status -->
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->nama_layanan }}</td>
                                        <td>{{ $item->tanggal_pemesanan }}</td>
                                        <td>{{ $item->kota }}</td>
                                        <td>
                                            @if ($item->status_pemesanan == 'Masuk')
                                                <span class="badge badge-success">{{ $item->status_pemesanan }}</span>
                                            @elseif($item->status_pemesanan == 'Batal')
                                                <span class="badge badge-danger">{{ $item->status_pemesanan }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            <form class="d-inline" action="#" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm dltBtn"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('styles')
    <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
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

    <!-- Page level custom scripts -->
    <script src="{{ asset('backend/js/demo/datatables-demo.js') }}"></script>
    <script>
        // console.log(route);

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.dltBtn').click(function(e) {
                var form = $(this).closest('form');
                var dataID = $(this).data('id');
                // alert(dataID);
                e.preventDefault();
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this data!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        } else {
                            swal("Your data is safe!");
                        }
                    });
            })
        })


        // $(document).ready(function() {
        //     //filter databale 
        //     $('#post-category-dataTable').DataTable({
        //         "columnDefs": [{
        //             "orderable": false,
        //             "targets": [3, 4]
        //         }]
        //     });
        // })
    </script>
@endpush
