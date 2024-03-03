@extends('backend.layouts.master')
@section('title', 'Pijat.in || Report')
@section('main-content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="row">
        <div class="col-md-12">
        </div>
    </div>
    <div class="card-header py-4">
        <h5 class="m-0 font-weight-bold text-primary float-left">Data Reports</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="post-category-dataTable" width="100%" cellspacing="0">
                <thead style="background: linear-gradient(180deg, #036666 0%, #67B99A 100%);">
                    <tr style="color: white;">
                        <!-- No -->
                        <th>No.</th>
                        <th>Status</th>
                        <th>ID Pesanan</th>
                        <th>Tanggal</th>
                        <th>Daerah Pemesanan</th>
                        <th>Detail</th>
                        <!-- Aksi -->
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <td>1</td>
                    <td>Selesai</td>
                    <td>PSN-1</td>
                    <td>12-12-2020</td>
                    <td>Bandung</td>
                    <td>Bandung</td>
                    <td>Bandung</td>


                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@push('styles')
<link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<style>
    div.dataTables_wrapper div.dataTables_paginate {
        display: none;
    }
</style>
@endpush

@push('scripts')

<!-- Page level plugins -->
<script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
<script>
    $('#post-category-dataTable').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [3, 4]
        }]
    });

    // Sweet alert

    function deleteData(id) {

    }
</script>
<script>
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