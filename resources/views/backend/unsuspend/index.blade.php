@extends('backend.layouts.master')
@section('title', 'Pijat.in || Unsuspend')
@section('main-content')
<!-- DataTales Example -->
<div class="row justify-content-center align-items-center">
    <div class="card" style="width: 96%;">

        <div class="card shadow mb-4">
            <div class="row">
                <div class="col-md-12">
                </div>
            </div>
            <div class="card-header py-4">
                <h5 class="m-0 font-weight-bold text-primary float-left">Data Unsuspend</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="unsuspend-dataTable" width="100%" cellspacing="0" style="border-color: #E21F30;">
                        <thead style="background: #E21F30;border-color: #E21F30;">
                            <tr style="color: white; border-color: white;">
                                <!-- No -->
                                <th style="border-color: white;width: 20px;">No.</th>
                                <th style="border-color: white;">ID User</th>
                                <th style="border-color: white;">Nama</th>
                                <th style="border-color: white;">Kota / Kab </th>
                                <th style="border-color: white;">Akun</th>
                                <th style="border-color: white;">No.Telp</th>
                                <th style="border-color: white;">Status</th>
                                <th style="border-color: white;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="border-color: white;">
                            @if(auth()->user()->role == 'superadmin')
                            @foreach($arrayGabungan as $user)
                            <tr style="border-color: white;">
                                <td style="border-color: #E21F30;">{{$loop->iteration}}</td>
                                <!-- user id -->
                                <td style="border-color: #E21F30;">Usr-{{ $user['user_id'] }}</td>
                                <!-- //nama  -->
                                <td style="border-color: #E21F30;">{{ $user['nama'] }}</td>
                                <!-- //kota  -->
                                @if(auth()->user()->role == 'admin')
                                <td style="border-color: #E21F30;">{{ $user['user']['alamat'][0]['kota'] }}</td>
                                @elseif(auth()->user()->role == 'superadmin')
                                <td style="border-color: #E21F30;">{{ $user['user']['alamat'][0]['kota'] }}</td>
                                @endif
                                <!-- //role  -->
                                <td style="border-color: #E21F30;" id="role">{{ $user['user']['role'] }}</td>
                                <!-- //no_hp  -->
                                <td style="border-color: #E21F30;">{{ $user['no_hp'] }}</td>
                                <!-- //status  -->
                                @if($user['status'] == 'active')
                                <td style="border-color: #E21F30;"><span class="badge badge-success">{{ $user['status'] }}</span></td>
                                @elseif($user['status'] == 'suspended')
                                <td style="border-color: #E21F30;"><span class="badge badge-danger">{{ $user['status'] }}</span></td>
                                @endif
                                <!-- //nama  -->
                                @if(auth()->user()->role == 'superadmin')
                                <td style="border-color: #E21F30;">
                                    <!-- //showForm  -->
                                    <a href="#" onclick="showForm(this)" class="btn btn-primary btn-sm d-inline-block btn-edit" data-id="{{ $user['user_id']    }}" data-toggle="modal" data-target="#show-{{ $user['user_id']  }}" title="Show"><i class="fas fa-eye"></i></a>
                                    <!-- //edit Form -->
                                    <!--  swict button untuk edit status -->
                                    <label class="switch">
                                        <input type="checkbox" id="mySwitch" onclick="aktifkan(this)" name="mySwitch" data-id="{{ $user['user_id']  }}" value="<?php echo ($user['status'] == 'active') ? 'suspended' : 'active'; ?>" <?php
                                                                                                                                                                                                                                        if ($user['status'] == 'active') {
                                                                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                                                                        } elseif ($user['status'] == 'suspended') {
                                                                                                                                                                                                                                            echo '';
                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                        ?>>
                                        <span class=" slider round"></span>
                                    </label>
                                    <style>
                                        .switch {
                                            position:
                                                relative;
                                            display:
                                                inline-block;
                                            width:
                                                50px;
                                            height:
                                                24px;
                                        }

                                        .switch input {
                                            opacity: 0;
                                            width: 0;
                                            height: 0;
                                        }

                                        .slider {
                                            position: absolute;
                                            cursor: pointer;
                                            top: 0;
                                            left: 0;
                                            right: 0;
                                            bottom: 0;
                                            background-color: #ccc;
                                            -webkit-transition: .4s;
                                            transition: .4s;
                                        }

                                        .slider:before {
                                            position: absolute;
                                            content: "";
                                            height: 18px;
                                            width: 18px;
                                            left: 4px;
                                            bottom: 4px;
                                            background-color: white;
                                            -webkit-transition: .4s;
                                            transition: .4s;
                                        }

                                        input:checked+.slider {
                                            background-color: green;
                                        }

                                        input:focus+.slider {
                                            box-shadow: 0 0 1px #2196F3;
                                        }

                                        input:checked+.slider:before {
                                            -webkit-transform: translateX(26px);
                                            -ms-transform: translateX(26px);
                                            transform: translateX(26px);
                                        }

                                        /* Rounded sliders */
                                        .slider.round {
                                            border-radius: 34px;
                                        }

                                        .slider.round:before {
                                            border-radius: 50%;
                                        }
                                    </style>
                                    <!-- //delete  -->
                                    <form method="POST" action="{{url('unsuspend.destroy',[ $user['user_id']    ])}}" class="d-inline-block">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm dltBtn" data-id={{ $user['user_id']    }} title="Delete"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                                @elseif(auth()->user()->role == 'admin')
                                <td style="border-color: #E21F30;">
                                    <!-- //showForm  -->
                                    <a href="#" onclick="showForm(this)" class="btn btn-primary btn-sm d-inline-block btn-edit" data-id="{{ $user['user_id']    }}" data-toggle="modal" data-target="#show-{{ $user['user_id']  }}" title="Show"><i class="fas fa-eye"></i></a>
                                    <!-- //edit Form -->
                                    <!--  swict button untuk edit status -->
                                    <label class="switch">
                                        <input type="checkbox" id="mySwitch" onclick="aktifkanAdmin(this)" name="mySwitch" data-id="{{ $user['user_id']  }}" value="<?php echo ($user['status'] == 'active') ? 'suspended' : 'active'; ?>" <?php
                                                                                                                                                                                                                                            if ($user['status'] == 'active') {
                                                                                                                                                                                                                                                echo 'checked';
                                                                                                                                                                                                                                            } elseif ($user['status'] == 'suspended') {
                                                                                                                                                                                                                                                echo '';
                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                            ?>>
                                        <span class=" slider round"></span>
                                    </label>
                                    <style>
                                        .switch {
                                            position:
                                                relative;
                                            display:
                                                inline-block;
                                            width:
                                                50px;
                                            height:
                                                24px;
                                        }

                                        .switch input {
                                            opacity: 0;
                                            width: 0;
                                            height: 0;
                                        }

                                        .slider {
                                            position: absolute;
                                            cursor: pointer;
                                            top: 0;
                                            left: 0;
                                            right: 0;
                                            bottom: 0;
                                            background-color: #ccc;
                                            -webkit-transition: .4s;
                                            transition: .4s;
                                        }

                                        .slider:before {
                                            position: absolute;
                                            content: "";
                                            height: 18px;
                                            width: 18px;
                                            left: 4px;
                                            bottom: 4px;
                                            background-color: white;
                                            -webkit-transition: .4s;
                                            transition: .4s;
                                        }

                                        input:checked+.slider {
                                            background-color: green;
                                        }

                                        input:focus+.slider {
                                            box-shadow: 0 0 1px #2196F3;
                                        }

                                        input:checked+.slider:before {
                                            -webkit-transform: translateX(26px);
                                            -ms-transform: translateX(26px);
                                            transform: translateX(26px);
                                        }

                                        /* Rounded sliders */
                                        .slider.round {
                                            border-radius: 34px;
                                        }

                                        .slider.round:before {
                                            border-radius: 50%;
                                        }
                                    </style>
                                    <!-- //delete  -->
                                    <form method="POST" action="{{url('unsuspend.destroy',[ $user['user_id']    ])}}" class="d-inline-block">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm dltBtn" data-id={{ $user['user_id']    }} title="Delete"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                            @elseif(auth()->user()->role == 'admin')
                            @foreach($arrayGabungan as $user)
                            <tr style="border-color: white;">
                                <td style="border-color: #E21F30;">{{$loop->iteration}}</td>
                                <!-- user id -->
                                <td style="border-color: #E21F30;">Usr-{{ $user->user_id }}</td>
                                <td style="border-color: #E21F30;">{{ $user->nama }}</td>
                                <td style="border-color: #E21F30;">{{ $user->kota }}</td>
                                <!-- //nama  -->
                                <!-- //kota  -->
                                <!-- //role  -->
                                <td style="border-color: #E21F30;" id="role">{{ $user->role }}</td>
                                <!-- //no_hp  -->
                                <td style="border-color: #E21F30;">{{ $user->no_hp }}</td>
                                <!-- //status  -->
                                @if($user->status == 'active')
                                <td style="border-color: #E21F30;"><span class="badge badge-success">{{ $user->status }}</span></td>
                                @elseif($user->status == 'suspended')
                                <td style="border-color: #E21F30;"><span class="badge badge-danger">{{ $user->status }}</span></td>
                                @endif
                                <!-- //nama  -->
                                <td style="border-color: #E21F30;">
                                    <!-- //showForm  -->
                                    <a href="#" onclick="showForm(this)" class="btn btn-primary btn-sm d-inline-block btn-edit" data-id="{{ $user->status    }}" data-toggle="modal" data-target="#show-{{ $user->status  }}" title="Show"><i class="fas fa-eye"></i></a>
                                    <!-- //edit Form -->
                                    <!--  swict button untuk edit status -->
                                    <label class="switch">
                                        <input type="checkbox" id="mySwitch" onclick="aktifkanAdmin(this)" name="mySwitch" data-id="{{ $user->user_id  }}" value="<?php echo ($user->status == 'active') ? 'suspended' : 'active'; ?>" <?php
                                                                                                                                                                                                                                        if ($user->status == 'active') {
                                                                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                                                                        } elseif ($user->status == 'suspended') {
                                                                                                                                                                                                                                            echo '';
                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                        ?>>
                                        <span class=" slider round"></span>
                                    </label>
                                    <style>
                                        .switch {
                                            position:
                                                relative;
                                            display:
                                                inline-block;
                                            width:
                                                50px;
                                            height:
                                                24px;
                                        }

                                        .switch input {
                                            opacity: 0;
                                            width: 0;
                                            height: 0;
                                        }

                                        .slider {
                                            position: absolute;
                                            cursor: pointer;
                                            top: 0;
                                            left: 0;
                                            right: 0;
                                            bottom: 0;
                                            background-color: #ccc;
                                            -webkit-transition: .4s;
                                            transition: .4s;
                                        }

                                        .slider:before {
                                            position: absolute;
                                            content: "";
                                            height: 18px;
                                            width: 18px;
                                            left: 4px;
                                            bottom: 4px;
                                            background-color: white;
                                            -webkit-transition: .4s;
                                            transition: .4s;
                                        }

                                        input:checked+.slider {
                                            background-color: green;
                                        }

                                        input:focus+.slider {
                                            box-shadow: 0 0 1px #2196F3;
                                        }

                                        input:checked+.slider:before {
                                            -webkit-transform: translateX(26px);
                                            -ms-transform: translateX(26px);
                                            transform: translateX(26px);
                                        }

                                        /* Rounded sliders */
                                        .slider.round {
                                            border-radius: 34px;
                                        }

                                        .slider.round:before {
                                            border-radius: 50%;
                                        }
                                    </style>
                                    <!-- //delete  -->
                                    <form method="POST" action="{{url('unsuspend.destroy',[ $user->user_id ])}}" class="d-inline-block">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm dltBtn" data-id={{ $user->user_id  }} title="Delete"><i class="fas fa-trash"></i></button>
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

<!-- Modal Tambah Customer -->
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <div class="card" style="margin-bottom: 20px; width: 46.8rem;text-align: center;border-radius: 10px;background-color: #036666;box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);color: #fff;">
                    <div class="card-body">
                        <h8 class="card-text"><b>ID Customer</b></h8>
                        <p id="idCard">CS001</p>
                        <div>
                            <!-- //image bentuk circle  -->
                            <img src="" class="card-img-top" alt="..." id="view_foto_idCard" style="width: 150px; height: 130px;border-radius: 50%;margin-bottom: 10px;">
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
                                <img src="" class="img-fluid" alt="" id="view_foto" style="width: 150px; height: 130px;">
                            </td>
                        </tr>
                        <!-- Foto KTP -->
                        <tr>
                            <td>Foto KTP</td>
                            <td>
                                <img src="" class="img-fluid" alt="" id="view_foto_ktp" style="width: 150px; height: 130px;">
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
    $('#unsuspend-dataTable').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [3, 4]
        }]
    });

    // Sweet alert
    function deleteData(id) {

    }
</script>
<?php
$cek = auth()->user()->role;
?>
<script>
    // fungsi aktifkan pada superadmin
    function aktifkan(element) {
        var id = $(element).data('id');
        var status = $(element).val();
        console.log(id);
        $.ajax({
            //updatestaus
            url: "{{url('superadmin/superadmin-aduan/update-status')}}",
            type: "POST",
            data: {
                id: id,
                status: status,
                _token: '{{csrf_token()}}'
            },
            success: function(data) {
                console.log(data);
                // if success == true (we have well formated json response)
                if (data.success == true) {
                    swal({
                        title: "Success!",
                        text: data.message,
                        icon: "success",
                        button: "OK",
                    }).then((OK) => {
                        if (OK) {
                            location.reload();
                        }
                    });
                }
            }
        });
        // alert(id);
    }
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
    //edit 
    function showForm(element) {
        var id = $(element).data('id');
        var role = $(element).closest('tr').find('#role').text();
        // console.log(id);
        $.ajax({
            url: "{{url('superadmin/superadmin-aduan/show')}}",
            type: "GET",
            data: {
                id: id,
                role: role,
                _token: '{{csrf_token()}}'
            },

            success: function(data) {
                $('#customerModal').modal('show');
                $('#idCard').text('CS00' + data.data.customers.id);
                // view_foto_idCard
                $('#view_foto_idCard').attr('src', "{{asset('storage/foto/')}}" + '/' + data.data.customers.foto);
                // nama_idCard
                $('#nama_idCard').text(data.data.customers.nama);
                // no_hp_idCard
                $('#no_hp_idCard').text(data.data.customers.no_hp);
                // nik_idCard
                $('#nik_idCard').text(data.data.customers.nik);
                // alamat_idCard
                $('#alamat_idCard').text(data.data.customers.alamat);

                // idCust
                $('#idCust').text('CS00' + data.data.customers.id);
                // view_nik
                $('#view_nik').text(data.data.customers.nik);
                // view_name
                $('#view_name').text(data.data.customers.nama);
                // view_email
                $('#view_email').text(data.data.email);
                // view_jenis_kelamin
                $('#view_jenis_kelamin').text(data.data.customers.jenis_kelamin);
                // view_no_hp
                $('#view_no_hp').text(data.data.customers.no_hp);
                // view_foto
                $('#view_foto').attr('src', "{{asset('storage/foto/')}}" + '/' + data.data.customers.foto);
                // view_foto_ktp
                $('#view_foto_ktp').attr('src', "{{asset('storage/foto_ktp/')}}" + '/' + data.data.customers.foto_ktp);
                // view_alamat
                for (var i = 0; i < data.data.alamat.length; i++) {
                    // buatkan table 1kolom header dan 2 kolom isi data 
                    var html = '<table class="table table-bordered table-striped">' +
                        '<tbody>' +
                        '<tr>' +
                        '<th colspan="2" style="text-align: center;background-color: #036666;color: white;">' +
                        'DETAIL DATA ALAMAT</th>' +
                        '</tr>' +
                        '<tr>' +
                        '<td>Alamat</td>' +
                        '<td>' + data.data.alamat[i].alamat + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<td>Kecamatan</td>' +
                        '<td>' + data.data.alamat[i].kecamatan + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<td>Kota</td>' +
                        '<td>' + data.data.alamat[i].kota + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<td>Provinsi</td>' +
                        '<td>' + data.data.alamat[i].provinsi + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<td>Kode Pos</td>' +
                        '<td>' + data.data.alamat[i].kode_pos + '</td>' +
                        '</tr>' +
                        '</tbody>' +
                        '</table>';
                    $('#view_alamat').append(html);
                }





                // $('#view_alamat').text(data.data.alamat);

            }
        });
    }
    //aktifkan pada admin
    function aktifkanAdmin(element) {
        var id = $(element).data('id');
        var status = $(element).val();
        console.log(id);
        $.ajax({
            //updatestaus
            url: "{{url('admin/admin-aduan/update-status')}}",
            type: "POST",
            data: {
                id: id,
                status: status,
                _token: '{{csrf_token()}}'
            },
            success: function(data) {
                console.log(data);
                // if success == true (we have well formated json response)
                if (data.success == true) {
                    swal({
                        title: "Success!",
                        text: data.message,
                        icon: "success",
                        button: "OK",
                    }).then((OK) => {
                        if (OK) {
                            location.reload();
                        }
                    });
                }
            }
        });
        // alert(id);
    }
</script>
</script>
@endpush