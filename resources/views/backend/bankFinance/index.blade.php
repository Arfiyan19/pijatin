@extends('backend.layouts.master')
@section('title', 'Pijat.in || Bank Perusahaan')
@section('main-content')
<!-- //css button  -->
<style>
    .hoverImage {
        transition: filter 0.2s;
    }

    .hoverImage:hover {
        filter: brightness(0.7) hue-rotate(90deg);
        transition: filter 0.2s;
    }

    .dltBtn {
        background-color: white;
        border: none;
        cursor: pointer;
    }

    .dltBtn:hover {
        background-color: white;
    }


    .custom-icon {
        width: 30px;
        height: 30px;
        background-image: url('/frontend/assets/image/icon-delete.png');
        background-size: cover;
        display: inline-block;
        transition: transform 0.2s;
    }

    .custom-icon:hover {
        transform: scale(1.2);
    }

    /* //edit  */
    .btn_warning {
        background-color: white;
        border: none;
        cursor: pointer;
    }

    .btn_warning:hover {
        background-color: white;
    }

    .custom-icon-edit {
        width: 30px;
        height: 30px;
        background-image: url('/frontend/assets/image/icon-edit.png');
        background-size: cover;
        display: inline-block;
        transition: transform 0.2s;
    }

    .custom-icon-edit:hover {
        transform: scale(1.2);
    }

    /* //detail  */
    .btn_success {
        background-color: white;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s;
        /* Efek transisi saat warna berubah */
    }

    .btn_success:hover {
        background-color: white;
    }


    .custom-icon-detail {
        width: 30px;
        height: 30px;
        background-image: url('/frontend/assets/image/icon-detail.png');
        background-size: cover;
        display: inline-block;
        transition: transform 0.2s;
    }

    .custom-icon-detail:hover {
        transform: scale(1.2);
    }
</style>
<!-- DataTales Example -->
<div class="row justify-content-center align-items-center">
    <div class="card" style="width: 96%;">
        <div class="card shadow mb-4">
            <div class="row">
                <div class="col-md-12">
                </div>
            </div>
            <div class="card-header py-4">
                <h5 class="m-0 font-weight-bold text-primary float-left">Data Bank Perusahaan</h5>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#financeModal" style="background-color: #036666;" class="btn btn-primary btn-sm float-right" data-placement="bottom" title="Add Bank Perusahaan"><i class="fas fa-plus"></i> Tambah Bank Perusahaan</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="logo-dataTable" width="100%" cellspacing="0">
                        <thead style="background: linear-gradient(180deg, #036666 0%, #67B99A 100%);">
                            <tr style="color: white;">
                                <!-- No -->
                                <th>No.</th>
                                <th>Logo Bank</th>
                                <th>No Rekening</th>
                                <th>Bank</th>
                                <th>Nama Pemilik</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $data)
                            <tr>
                                <td>
                                    {{ $key + 1 }}
                                </td>
                                <td>
                                    <img src="{{ asset('storage/foto/' . $data->logo) }}" class="img-fluid" style="width: 80px" alt="{{ $data->logo }}">
                                </td>
                                <td>{{ $data->no_rek }}</td>
                                <td>{{ $data->bank }}</td>
                                <td>{{ $data->nama_pemilik }}</td>
                                <td style="text-align: center;">
                                    <a href="javascript:void(0)" id="lihat" name="lihat" data-toggle="modal" data-target="#showModal" class="btn_success btn-sm" data-id="{{ $data->id }}"><i class="custom-icon-detail"></i></a>
                                    <a href="javascript:void(0)" id="edit" name="edit" data-toggle="modal" data-target="#editModal" class="btn_warning btn-sm" data-id="{{ $data->id }}"><i class="custom-icon-edit"></i></a>
                                    <!-- //button delete  -->
                                    <form method="POST" action="{{ url('superadmin/superadmin-bank-finance/destroy', [$data->id]) }}" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn-danger btn-sm dltBtn" data-id="{{ $data->id }}"><i class="custom-icon"></i></button>
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
<!-- tambah bank perusahaanaa modal -->
<div class="modal fade" id="financeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Bank Perusahaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding-left: 35px; padding-right: 35px;">
                <!-- //form  -->
                <form method="POST" enctype="multipart/form-data" id="image-upload" action="javascript:void(0)">
                    <!-- upload foto  -->
                    <div class="form-group">
                        <label for="image" class="col-form-label">Logo <span class="text-danger">*</span></label>
                        <div class="imgWrap" style="margin-bottom: 10px;">
                            <img id="preview-image-before-upload" alt=" preview image" style="max-height: 250px;">
                            <!-- errorFoto -->
                            <span class="text-danger" id="errorLogo"></span>
                        </div>
                        <input type="file" name="image" placeholder="Choose image" id="image">
                    </div>
                    <div class="form-group">
                        <label for="no_rek" class="col-form-label">Nomor Rekening <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="no_rek" id="no_rek">
                        <span class="text-danger" id="errorNo_rek"></span>
                    </div>
                    <!-- bank  -->
                    <div class="form-group">
                        <label for="bank" class="col-form-label">Bank <span class="text-danger">*</span></label>
                        <select name="bank" id="bank" class="form-control">
                            <option value="">-- Pilih Bank --</option>
                            <option value="BRI">BRI</option>
                            <option value="BNI">BNI</option>
                            <option value="BCA">BCA</option>
                            <option value="Mandiri">Mandiri</option>
                            <option value="Bank Syariah">Bank Syariah</option>
                        </select>
                        <span class="text-danger" id="errorBank"></span>
                    </div>
                    <!-- nama pemilik  -->
                    <div class="form-group">
                        <label for="nama_pemilik" class="col-form-label">Nama Pemilik <span class="text-danger">*</span></label>
                        <input type="nama_pemilik" class="form-control" name="nama_pemilik" id="nama_pemilik">
                        <span class="text-danger" id="errorNama_pemilik"></span>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="submit" class="btn btn-primary btn-simpan">SIMPAN</button>
            </div>
            </form>
        </div>
    </div>
</div>
<br>
<!-- //modal show  -->
<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <!-- <div class="modal-dialog" role="document"> -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Detail Data Bank Perusahaan
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- buat bentuk id card -->
                <div class="card" style="margin-bottom: 20px; width: 46.8rem;text-align: center;border-radius: 10px;background-color: #036666;box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);color: #fff;">
                    <div class="card-body">
                        <h8 class="card-text"><b>ID BANK</b></h8>
                        <p id="id_bank" style="margin-bottom: 2px;"></p>
                        <div>
                            <!-- //image bentuk circle  -->
                            <img src="" class="card-img-top" alt="..." id="view_logo_Bank" style="width: 150px; height: 130px;border-radius: 50%;margin-bottom: 10px; background: antiquewhite;">
                        </div>
                        <!-- //NAMA  -->
                        <p class="card-text" id="no_rek_show" style="margin-bottom: 2px;">Nomor Rekening</p>
                        <!-- //no_hp  -->
                        <p class="card-text" id="bank_show" style="margin-bottom: 2px;">Nama Bank</p>
                        <!-- nik  -->
                        <p class="card-text" id="nama_pemilik_show" style="margin-bottom: 2px;">Nama Pemilik</p>
                    </div>
                </div>
                <!-- tabel -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
<!-- //modal edit  -->
<div class="modal fade" role="dialog" id="editModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Bank Perusahaan </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding-left: 35px; padding-right: 35px;">
                <form enctype="multipart/form-data" id="image-update">
                    <!-- upload foto  -->
                    <div class="form-group">
                        <label for="image-logo" class="col-form-label">Logo <span class="text-danger">*</span></label>
                        <div class="imgWrap" style="margin-bottom: 10px;">
                            <img id="preview-image-logo" alt="preview image" style="max-height: 250px;">
                            <!-- errorFoto -->
                            <span class="text-danger" id="errorLogo"></span>
                        </div>
                        <input type="file" name="image-logo" placeholder="Choose image" id="image-logo">
                    </div>
                    <!-- //no_rek  -->
                    <div class="form-group">
                        <input type="hidden" id="id" name="id">
                        <label for="no_rek_edit" class="col-form-label">Nomor Rekening <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="no_rek_edit" id="no_rek_edit">
                    </div>

                    <!-- //Bank  -->
                    <div class="form-group">
                        <label for="bank_edit" class="col-form-label">Bank<span class="text-danger">*</span></label>
                        <select name="bank_edit" id="bank_edit" class="form-control" id="bank_edit">
                            <option value="">-- Pilih Bank --</option>
                            <option value="BRI">BRI</option>
                            <option value="BNI">BNI</option>
                            <option value="BCA">BCA</option>
                            <option value="Mandiri">Mandiri</option>
                            <option value="Bank Syariah">Bank Syariah</option>
                        </select>
                    </div>
                    <!-- //Nama_Penmilik -->
                    <div class="form-group">
                        <label for="nama_pemilik_edit" class="col-form-label">Nama Pemilik <span class="text-danger">*</span></label>
                        <input type="nama_pemilik_edit" class="form-control" name="nama_pemilik_edit" id="nama_pemilik_edit">
                    </div>
                    <!-- </form> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="submit" class="btn btn-primary btn-update">UPDATE</button>
            </div>
            </form>
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
<script></script>
<script>
    $(document).ready(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //upload foto
        $('#image').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {

                $('#preview-image-before-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
        //submit
        $('#image-upload').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('superadmin-bank-finance.store') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    console.log(data);
                    swal({
                        title: "Sukses",
                        text: "Data Finance berhasil ditambahkan",
                        icon: "success",
                        button: "OK",
                    }).then((value) => {
                        location.reload();
                    });
                },
                error: function(data) {
                    console.log(data);
                    if (data.responseJSON.errors.logo) {
                        $('#errorLogo').text('Logo harus diisi');
                    }
                    if (data.responseJSON.errors.no_rek) {
                        $('#errorNo_rek').text('Nomor Rekening harus diisi');
                    }
                    if (data.responseJSON.errors.bank) {
                        $('#errorBank').text('Nama Bank harus diisi');
                    }
                    if (data.responseJSON.errors.nama_pemilik) {
                        $('#errorNama_pemilik').text('Nama Pemilik harus diisi');
                    }
                    // jika post ulang maka error akan hilang
                    this.reset();
                }
            });
        });
    });
    $('#logo-dataTable').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [3, 4]
        }]
    });

    //btn-show
    $(document).ready(function() {
        $('#showModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            // console.log(id);
            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + id)
            let url = `superadmin-bank-finance/${id}`
            // console.log(url);
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function(res) {
                    // console.log(res);
                    if (res) {
                        $('#id_bank').text('BNKS' + res.id);
                        $('#view_logo_Bank').attr('src', "{{ asset('storage/foto') }}/" +
                            res.logo);
                        $('#no_rek_show').text(res.no_rek);
                        $('#bank_show').text(res.bank);
                        $('#nama_pemilik_show').text(res.nama_pemilik);
                    }
                }
            })
        })
    });
    // button delete
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
                title: "Apakah Kamu Yakin?",
                text: "Setelah dihapus, Anda tidak akan dapat memulihkan data ini!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                buttons: ["Cancel", "Yes! Delete"],
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                    // jika succes tampilkan pemberitahuan 
                    swal("Data berhasil dihapus!", {
                        icon: "success",
                    });

                } else {
                    swal("Data batal dihapus!");
                }
            })
        })
    });
    //button edit 
    $(document).ready(function() {
        $('.btn_warning').on('click', function() {
            // console.log('ok');
            let id = $(this).data('id');
            // console.log(id);
            $.ajax({
                url: `superadmin-bank-finance/${id}/edit`,
                method: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data.no_rek);
                    $('#editModalEdit').modal('show');
                    $('#id').val(data.id);
                    $('#no_rek_edit').val(data.no_rek);
                    $('#nama_pemilik_edit').val(data.nama_pemilik);
                    $('#bank_edit').append(
                        `<option value="${data.bank}" selected>${data.bank}</option>`
                    );
                    $('#preview-image-logo').attr('src', "{{ asset('storage/foto') }}/" +
                        data.logo);
                }
            })
        })
    });

    // button update
    $(document).ready(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //upload foto
        $('#image-logo').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {

                $('#preview-image-logo').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
        //submit
        $('#image-update').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                type: 'POST',
                url: "{{ url('superadmin/superadmin-bank-finance-update') }}",
                headers: {
                    'X-CSRF-TOKEN': token
                },
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    console.log(data);
                    swal({
                        title: "Sukses",
                        text: "Data Bank Perusahaan berhasil diupdate",
                        icon: "success",
                        button: "OK",
                    }).then((value) => {
                        location.reload();
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    });
</script>
@endpush