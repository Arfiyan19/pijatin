@extends('backend.layouts.master')
@section('title', 'Pijat.in || Penangguhan Ditangguhkan')
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
                    <h5 class="m-0 font-weight-bold float-left" style="color: #469D89">Aduan Pengguna</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="finance-dataTable" width="100%" cellspacing="0">
                            <thead style="background: linear-gradient(180deg, #036666 0%, #67B99A 100%);">
                                <tr style="color: white;">
                                    <!-- No -->
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tipe Pengguna</th>
                                    <th>Alasan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
