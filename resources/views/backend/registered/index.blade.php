@extends('backend.layouts.master')
@section('title', 'Pijat.in || Registered')
@section('main-content')
    <!-- DataTales Example -->
    <style>
        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background: linear-gradient(180deg, #036666 0%, #67B99A 100%);
        }

        a {
            color: green;
            text-decoration: none;
            background-color: transparent;
        }
    </style>
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 96%;">
            <div class="card shadow mb-4">
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
                <div class="card-header py-4">
                    <h5 class="m-0 font-weight-bold text-primary float-left">Data Registered</h5>
                    <!-- <a href="javascript:void(0)" id="tambah" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#customerModal"><i class="fas fa-plus"></i> Tambah Customer</a> -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="post-category-dataTable" width="100%" cellspacing="0">
                            <!-- //menu 1 pendaftar -->
                            <div class="row">
                                <div class="col-md-12">
                                    @if (auth()->user()->role == 'superadmin')
                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" onclick="pilihPendaftar()"
                                                    id="pills-pendaftar-tab" data-toggle="pill" href="#pills-pendaftar"
                                                    role="tab" aria-controls="pills-pendaftar"
                                                    aria-selected="true">Pendaftar</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" onclick="pilihInterview()" id="pills-interview-tab"
                                                    data-toggle="pill" href="#pills-interview" role="tab"
                                                    aria-controls="pills-interview" aria-selected="false">Interview</a>
                                            </li>
                                        </ul>
                                    @elseif(auth()->user()->role == 'admin')
                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" onclick="AdminpilihPendaftar()"
                                                    id="pills-pendaftar-tab" data-toggle="pill" href="#pills-pendaftar"
                                                    role="tab" aria-controls="pills-pendaftar"
                                                    aria-selected="true">Pendaftar</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" onclick="AdminpilihInterview()" id="pills-interview-tab"
                                                    data-toggle="pill" href="#pills-interview" role="tab"
                                                    aria-controls="pills-interview" aria-selected="false">Interview</a>
                                            </li>
                                        </ul>
                                    @endif

                                </div>
                            </div>

                            <!-- //menu 2 interciew / -->
                            <thead style="background: linear-gradient(180deg, #036666 0%, #67B99A 100%);">
                                <tr style="color: white;">
                                    <th>No.</th>
                                    <!-- ID USER  -->
                                    <th> ID User</th>
                                    <!-- Nama -->
                                    <th>Nama</th>
                                    <!-- tanggal  -->
                                    <th>Tanggal</th>
                                    <!-- No.Telp -->
                                    <th>No.Telp</th>
                                    <!-- KTP -->
                                    <th>Daerah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                @if (auth()->user()->role == 'superadmin')
                                    @foreach ($terapis as $terapis)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $terapis->id }}</td>
                                            <td>{{ $terapis->nama }}</td>
                                            <td>{{ $terapis->created_at }}</td>
                                            <td>{{ $terapis->no_hp }}</td>
                                            <td>{{ $terapis->kota }}</td>
                                            <td>
                                                <<<<<<< HEAD=======<<<<<<< HEAD=======<!-- //buttom lihat -->
                                                    >>>>>>> d0bdbea0aa927238b4e9175633f87766770c3284
                                                    >>>>>>> main
                                                    <a href="javascript:void(0)" id="lihat" name="lihat"
                                                        data-toggle="modal" data-target="#customerModal"
                                                        class="btn btn-success btn-sm" data-id="{{ $terapis->id }}"><i
                                                            class="fas fa-eye"></i> </a>
                                                    <a href="javascript:void(0)" id="edit" name="edit"
                                                        data-toggle="modal" data-target="#customerModalEdit"
                                                        class="btn btn-warning btn-sm" data-id="{{ $terapis->id }}"><i
                                                            class="fas fa-edit"></i> </a>
                                                    <form method="POST"
                                                        action="{{ url('superadmin/superadmin-register/' . $terapis->id) }}"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm dltBtn"
                                                            data-id="{{ $terapis->id }}" data-toggle="tooltip"
                                                            data-placement="bottom" title="Delete"><i
                                                                class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @elseif(auth()->user()->role == 'admin')
                                    @foreach ($terapis as $terapis)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $terapis->id }}</td>
                                            <td>{{ $terapis->nama }}</td>
                                            <td>{{ $terapis->created_at }}</td>
                                            <td>{{ $terapis->no_hp }}</td>
                                            <td>{{ $terapis->kota }}</td>
                                            <td>
                                                <!-- //buttom lihat  -->
                                                <a href="javascript:void(0)" id="lihat" name="lihat"
                                                    data-toggle="modal" data-target="#customerModal"
                                                    class="btn btn-success btn-sm" data-id="{{ $terapis->id }}"><i
                                                        class="fas fa-eye"></i> </a>
                                                <a href="javascript:void(0)" id="edit" name="edit"
                                                    data-toggle="modal" data-target="#customerModalEdit"
                                                    class="btn btn-warning btn-sm" data-id="{{ $terapis->id }}"><i
                                                        class="fas fa-edit"></i> </a>
                                                <form method="POST"
                                                    action="{{ url('superadmin/superadmin-register/' . $terapis->id) }}"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm dltBtn"
                                                        data-id="{{ $terapis->id }}" data-toggle="tooltip"
                                                        data-placement="bottom" title="Delete"><i
                                                            class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- //modal tambah customer  -->

    <!-- Modal Tambah Customer -->
    <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <!-- <div class="modal-dialog" role="document"> -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Detail Customers
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- buat bentuk id card -->
                    <div class="card"
                        style="margin-bottom: 20px; width: 46.8rem;text-align: center;border-radius: 10px;background-color: #036666;box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);color: #fff;">
                        <div class="card-body">
                            <h8 class="card-text"><b>ID Customer</b></h8>
                            <p id="idCard">CS001</p>
                            <div>
                                <!-- //image bentuk circle  -->
                                <img src="" class="card-img-top" alt="..." id="view_foto_idCard"
                                    style="width: 150px; height: 130px;border-radius: 50%;margin-bottom: 10px;">
                            </div>
                            <!-- //NAMA  -->
                            <p class="card-text" id="nama_idCard" style="margin-bottom: 2px;">
                                Nama</p>
                            <!-- //no_hp  -->
                            <p class="card-text" id="no_hp_idCard" style="margin-bottom: 2px;">No
                                Hp</p>
                            <!-- nik  -->
                            <p class="card-text" id="nik_idCard" style="margin-bottom: 2px;">NIK
                            </p>
                            <!-- //alamat  -->
                            <p class="card-text" id="alamat_idCard" style="margin-bottom: 2px;">
                                Alamat
                            </p>
                        </div>
                    </div>
                    <!-- tabel -->
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <!-- ID Customer -->
                            <!-- //detail data Customer  -->
                            <tr>
                                <th colspan="2" style="text-align: center;background-color: #036666;color: white;">
                                    DETAIL DATA CUSTOMER</th>
                            </tr>
                            <tr>
                                <td>ID Customer</td>
                                <td id="idCust"></td>
                            </tr>
                            <!-- NIK -->
                            <tr>
                                <td>NIK</td>
                                <td id="view_nik"></td>
                            </tr>
                            <!-- Nama -->
                            <tr>
                                <td>Nama</td>
                                <td id="view_name"></td>
                            </tr>
                            <!-- Email -->
                            <tr>
                                <td>Email</td>
                                <td id="view_email"></td>
                            </tr>
                            <!-- Jenis Kelamin -->
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td id="view_jenis_kelamin"></td>
                            </tr>
                            <!-- No Hp -->
                            <tr>
                                <td>No Hp</td>
                                <td id="view_no_hp"></td>
                            </tr>
                            <!-- Foto -->
                            <tr>
                                <td>Foto</td>
                                <td>
                                    <img src="" class="img-fluid" alt="" id="view_foto"
                                        style="width: 150px; height: 130px;">
                                </td>
                            </tr>
                            <!-- Foto KTP -->
                            <tr>
                                <td>Foto KTP</td>
                                <td>
                                    <img src="" class="img-fluid" alt="" id="view_foto_ktp"
                                        style="width: 150px; height: 130px;">
                                </td>
                            </tr>
                            <!-- Daerah Pengguna -->
                            <tr>
                                <td>Daerah Pengguna</td>
                                <td id="view_alamat"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->

                </div>
            </div>
        </div>
    </div>
    <!-- customerModalEdit -->
    <!-- Modal -->
    <div class="modal fade" role="dialog" id="customerModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">EDIT CUSTOMER</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- @csrf -->
                    <!-- <form class='form-horizontal' id='document_form' enctype="multipart/form-data"> -->
                    <div class="form-group">
                        <input type="hidden" id="idCustomers" name="idCustomers">
                        <label for="name" class="col-form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" required
                            value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- //email -->
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" required value="{{ old('email') }}"
                            id="email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </span>
                    </div>
                    <!-- //nik  -->
                    <div class="form-group">
                        <label for="nik" class="col-form-label">NIK <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nik" required value="{{ old('nik') }}"
                            id="nik">
                        @error('nik')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- //jenis kelamin  -->
                    <div class="form-group">
                        <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin <span
                                class="text-danger">*</span></label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" id="jenis_kelamin">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                            @error('jenis_kelamin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>
                    <!-- //tempat lahir  -->
                    <!-- //no_hp -->
                    <div class="form-group">
                        <label for="no_hp" class="col-form-label">No.Hp <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="no_hp" required value="{{ old('no_hp') }}"
                            id="no_hp">
                        @error('no_hp')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- //foto  -->
                    <div class="form-group">
                        <label for="inputPhoto" class="col-form-label">Foto<span class="text-danger">*</span></label>
                        <!-- img -->
                        <div class="imgWrap" style="margin-bottom: 10px;">
                            <img src="" id="fotoimg" class="img-fluid img-thumbnail"
                                style="width: 150px; height:140px;">
                        </div>
                        <form id="imageUploadForm" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="image" id="image">
                            <p id="imgName" hidden></p>
                            <!-- //submit  -->
                            <input type="submit" name="submit" value="Update" style="background-color: #036666;"
                                class="btn btn-primary btn-sm" id="submit">
                        </form>
                    </div>
                    <!-- //foto ktp  -->
                    <div class="form-group">
                        <label for="inputPhoto" class="col-form-label">Foto KTP<span class="text-danger">*</span></label>
                        <!-- img -->
                        <div class="imgWrap" style="margin-bottom: 10px;">
                            <img src="" id="fotoKtpImg" class="img-fluid img-thumbnail"
                                style="width: 150px; height:140px;">
                        </div>
                        <form id="KtpUploadForm" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="imageKtp" id="imageKtp">
                            <p id="imgNameKtp" hidden></p>
                            <!-- //submit  -->
                            <input type="submit" name="submit" value="Update" style="background-color: #036666;"
                                class="btn btn-primary btn-sm" id="submit">
                        </form>
                    </div>
                    <!-- tanggal_lahir -->
                    <div class="form-group">
                        <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir <span
                                class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="tanggal_lahir" required
                            value="{{ old('tanggal_lahir') }}" id="tanggal_lahir">
                        @error('tanggal_lahir')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- //tempat_lahir -->
                    <div class="form-group">
                        <label for="tempat_lahir" class="col-form-label">Tempat Lahir <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="tempat_lahir" required
                            value="{{ old('tempat_lahir') }}" id="tempat_lahir">
                        @error('tempat_lahir')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <!-- //PASSWORD  -->
                    <div class="form-group">
                        <label for="password" class="col-form-label">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password" required
                            value="{{ old('password') }}" id="password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                        <button type="button" class="btn btn-primary" id="update">UPDATE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script></script>


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
        $('#post-category-dataTable').DataTable({
            "columnDefs": [{
                "orderable": false,
                "targets": [3, 4]
            }]
        });
        //deletewall
        $(document).ready(function() {
            $('.dltBtn').click(function(e) {
                let form = $(this).closest('form');
                let id = $(this).data('id');
                // alert(id);
                e.preventDefault();
                // alert('hello');
                swal({
                        title: "Apakah kamu yakin?",
                        text: "Setelah dihapus, Anda tidak akan dapat memulihkan file ini!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        // console.log(willDelete);
                        if (willDelete) {
                            form.submit();
                        } else {
                            swal("File Anda aman!");
                        }
                    });
            })
        })

        var role = "{{ Auth::user()->role }}";

        // /upload image 
        $(document).ready(function() {
            $('#imageUploadForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "/" + role + "/" + role + "-customers/upload",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $('#fotoimg').attr('src', data.image_url);
                        $('#imgName').text(data.image_name);
                    }
                })
            });

        });
        //upload ktp
        $(document).ready(function() {
            $('#KtpUploadForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "/" + role + "/" + role + "-customers/uploadKtp",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $('#fotoKtpImg').attr('src', data.image_url);
                        $('#imgNameKtp').text(data.image_name);
                    }
                })
            });
        });
        //Show data
        $(document).ready(function() {
            $('.btn-success').click(function() {
                const id = $(this).data('id');
                console.log(id);
                $.ajax({

                    url: "/" + role + "/" + role + "-customers/" + id,
                    method: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        console.log(data);
                        // /id card 
                        $('#idCard').text('CST-' + data.id);
                        $('#view_foto_idCard').attr('src', "{{ asset('storage/foto/') }}" +
                            '/' + data.customers.foto);
                        $('#nama_idCard').text(data.customers.nama);
                        $('#no_hp_idCard').text(data.customers.no_hp);
                        $('#nik_idCard').text(data.customers.nik);
                        for (let i = 0; i < data.alamat.length; i++) {
                            $('#alamat_idCard').text(data.alamat[i].kota);
                        }
                        // end idcard 
                        $('#idCust').text('CST-' + data.customers.id);
                        $('#view_nik').text(data.customers.nik);
                        $('#view_name').text(data.customers.nama);
                        $('#view_email').text(data.email);
                        $('#view_jenis_kelamin').text(data.customers.jenis_kelamin);
                        $('#view_no_hp').text(data.customers.no_hp);
                        $('#view_foto').attr('src', "{{ asset('storage/foto/') }}" + '/' + data
                            .customers.foto);
                        $('#view_foto_ktp').attr('src', "{{ asset('storage/foto_ktp/') }}" +
                            '/' + data.customers.foto_ktp);
                        // $('#alamat').text(data.alamat.kota);
                        // for alamat 
                        for (let i = 0; i < data.alamat.length; i++) {
                            $('#view_alamat').text(data.alamat[i].kota);
                        }
                    }
                })
            });

        });
        //Edit data
        $(document).ready(function() {
            $('.btn-warning').click(function() {
                var id = $(this).data('id');
                console.log(id);
                $.ajax({
                    url: "/" + role + "/" + role + "-customers/" + id + "/edit",
                    method: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        console.log(data);
                        $('#idCustomers').val(data.customers.user_id);
                        $('#name').val(data.customers.nama);
                        $('#email').val(data.email);
                        $('#nik').val(data.customers.nik);
                        $('#jenis_kelamin').append('<option value="' + data.customers
                            .jenis_kelamin + '" selected>' + data.customers.jenis_kelamin +
                            '</option>');
                        $('#no_hp').val(data.customers.no_hp);
                        $('#fotoimg').attr('src', "{{ asset('storage/foto/') }}" + '/' + data
                            .customers.foto);
                        $('#fotoKtpImg').attr('src', "{{ asset('storage/foto_ktp/') }}" + '/' +
                            data.customers.foto_ktp);
                        $('#tanggal_lahir').val(data.customers.tanggal_lahir);
                        $('#tempat_lahir').val(data.customers.tempat_lahir);
                        $('#alamat').val(data.customers.alamat);
                        $('#password').val(data.password);
                    }
                })
            });
        });
        //update data
        $('#update').click(function(e) {
            e.preventDefault();
            var id = $("#idCustomers").val();

            var name = $("#name").val();
            var email = $("#email").val();
            var nik = $("#nik").val();
            //password
            var password = $("#password").val();
            var no_hp = $("#no_hp").val();
            var alamat = $("#alamat").val();
            var jenis_kelamin = $("#jenis_kelamin").val();
            var tempat_lahir = $("#tempat_lahir").val();
            var tanggal_lahir = $("#tanggal_lahir").val();
            var foto = $("#imgName").text();
            var foto_ktp = $("#imgNameKtp").text();

            let token = $("meta[name='csrf-token']").attr("content");
            console.log(id);
            $.ajax({
                url: "/" + role + "/" + role + "-customers/" + id,
                type: "PUT",
                cache: false,
                data: {
                    "id": id,
                    "name": name,
                    "email": email,
                    "nik": nik,
                    "no_hp": no_hp,
                    "alamat": alamat,
                    "password": password,
                    "jenis_kelamin": jenis_kelamin,
                    "tempat_lahir": tempat_lahir,
                    "tanggal_lahir": tanggal_lahir,
                    "foto": foto,
                    "foto_ktp": foto_ktp,
                    "_token": token
                },
                success: function(response) {
                    console.log(response);
                    // $("#customerModalEdit").modal('hide');
                    // alert("Data berhasil diupdate");
                    // location.reload();
                    swal({
                        title: "Sukses",
                        text: "Data berhasil diupdate",
                        icon: "success",
                        button: "OK",
                    }).then((value) => {
                        location.reload();
                    });
                },
            });
        });
    </script>

    <script>
        //fungsi pilih pendaftar
        function pilihInterview() {
            //datatable hide t<body></body>
            $('#tbody').hide();
            //ajax get data where status interview
            $.ajax({
                url: "/superadmin/superadmin-register/interview",
                method: "GET",
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    // //datatable showw
                    $('#tbody').show();
                    // //datatable clearr
                    $('#tbody').empty();
                    // //datatable append dengan perulangan
                    for (let i = 0; i < data.length; i++) {
                        //tammpilkan pada datatable data json
                        $('#tbody').append('<tr><td>' + (i + 1) + '</td><td>' +
                            data[i].user_id + '</td><td>' + data[i].nama +
                            '</td><td>' + data[i].created_at + '</td><td>' +
                            data[i].no_hp + '</td><td>' +
                            data[i].kota +
                            //button/
                            '</td><td><a href="javascript:void(0)" id="lihat" name="lihat" data-toggle="modal" data-target="#customerModal" class="btn btn-success btn-sm" data-id="' +
                            data[i].id + '"><i class="fas fa-eye"></i> </a>' +
                            '<a href="javascript:void(0)" id="edit" name="edit" data-toggle="modal" data-target="#customerModalEdit" class="btn btn-warning btn-sm" data-id="' +
                            data[i].id + '"><i class="fas fa-edit"></i> </a>' +
                            '<form method="POST" action="/superadmin/superadmin-register/' +
                            data[i].id + '" style="display: inline-block;">' +
                            '@csrf' +
                            '@method('delete')' +
                            '<button class="btn btn-danger btn-sm dltBtn" data-id="' +
                            data[i].id +
                            '" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i>' +
                            '</button>' +
                            '</form>' +
                            '</td>' +
                            '</tr>');
                    }
                }
            })
        }
        //fungsi pilih pendaftar
        function pilihPendaftar() {
            //datatable show
            $('#tbody').hide();
            $.ajax({
                url: "/superadmin/superadmin-register/pendaftaran",
                method: "GET",
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    $('#tbody').show();
                    // //datatable clearr
                    $('#tbody').empty();
                    // //datatable append dengan perulangan
                    for (let i = 0; i < data.length; i++) {
                        //tammpilkan pada datatable data json
                        $('#tbody').append('<tr><td>' + (i + 1) + '</td><td>' +
                            data[i].user_id + '</td><td>' + data[i].nama +
                            '</td><td>' + data[i].created_at + '</td><td>' +
                            data[i].no_hp + '</td><td>' +
                            data[i].kota +
                            //button/
                            '</td><td><a href="javascript:void(0)" id="lihat" name="lihat" data-toggle="modal" data-target="#customerModal" class="btn btn-success btn-sm" data-id="' +
                            data[i].id + '"><i class="fas fa-eye"></i> </a>' +
                            '<a href="javascript:void(0)" id="edit" name="edit" data-toggle="modal" data-target="#customerModalEdit" class="btn btn-warning btn-sm" data-id="' +
                            data[i].id + '"><i class="fas fa-edit"></i> </a>' +
                            '<form method="POST" action="/superadmin/superadmin-register/' +
                            data[i].id + '" style="display: inline-block;">' +
                            '@csrf' +
                            '@method('delete')' +
                            '<button class="btn btn-danger btn-sm dltBtn" data-id="' +
                            data[i].id +
                            '" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i>' +
                            '</button>' +
                            '</form>' +
                            '</td>' +
                            '</tr>');
                    }
                }
            })
        }

        //pilih interview byadmin
        function AdminpilihInterview() {
            //datatable hide t<body></body>
            $('#tbody').hide();
            //ajax get data where status interview
            $.ajax({
                url: "/admin/admin-register-Interview",
                method: "GET",
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    // //datatable showw
                    $('#tbody').show();
                    // //datatable clearr
                    $('#tbody').empty();
                    // //datatable append dengan perulangan
                    for (let i = 0; i < data.length; i++) {
                        //tammpilkan pada datatable data json
                        $('#tbody').append('<tr><td>' + (i + 1) + '</td><td>' +
                            data[i].user_id + '</td><td>' + data[i].nama +
                            '</td><td>' + data[i].created_at + '</td><td>' +
                            data[i].no_hp + '</td><td>' + data[i].kota +
                            //button/
                            '</td><td><a href="javascript:void(0)" id="lihat" name="lihat" data-toggle="modal" data-target="#customerModal" class="btn btn-success btn-sm" data-id="' +
                            data[i].id + '"><i class="fas fa-eye"></i> </a>' +
                            '<a href="javascript:void(0)" id="edit" name="edit" data-toggle="modal" data-target="#customerModalEdit" class="btn btn-warning btn-sm" data-id="' +
                            data[i].id + '"><i class="fas fa-edit"></i> </a>' +
                            '<form method="POST" action="/superadmin/superadmin-register/' +
                            data[i].id + '" style="display: inline-block;">' +
                            '@csrf' +
                            '@method('delete')' +
                            '<button class="btn btn-danger btn-sm dltBtn" data-id="' +
                            data[i].id +
                            '" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i>' +
                            '</button>' +
                            '</form>' +
                            '</td>' +
                            '</tr>');
                    }
                }
            })
        }
        //fungsi pilih pendaftar by Admin
        function AdminpilihPendaftar() {
            //datatable show
            $('#tbody').hide();
            $.ajax({
                url: "/admin/admin-register-Pendaftaran",
                method: "GET",
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    $('#tbody').show();
                    // //datatable clearr
                    $('#tbody').empty();
                    // //datatable append dengan perulangan
                    for (let i = 0; i < data.length; i++) {
                        //tammpilkan pada datatable data json
                        $('#tbody').append('<tr><td>' + (i + 1) + '</td><td>' +
                            data[i].user_id + '</td><td>' + data[i].nama +
                            '</td><td>' + data[i].created_at + '</td><td>' +
                            data[i].no_hp + '</td><td>' + data[i].kota +
                            //button/
                            '</td><td><a href="javascript:void(0)" id="lihat" name="lihat" data-toggle="modal" data-target="#customerModal" class="btn btn-success btn-sm" data-id="' +
                            data[i].id + '"><i class="fas fa-eye"></i> </a>' +
                            '<a href="javascript:void(0)" id="edit" name="edit" data-toggle="modal" data-target="#customerModalEdit" class="btn btn-warning btn-sm" data-id="' +
                            data[i].id + '"><i class="fas fa-edit"></i> </a>' +
                            '<form method="POST" action="/superadmin/superadmin-register/' +
                            data[i].id + '" style="display: inline-block;">' +
                            '@csrf' +
                            '@method('delete')' +
                            '<button class="btn btn-danger btn-sm dltBtn" data-id="' +
                            data[i].id +
                            '" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i>' +
                            '</button>' +
                            '</form>' +
                            '</td>' +
                            '</tr>');
                    }
                }
            })
        }
    </script>
@endpush
