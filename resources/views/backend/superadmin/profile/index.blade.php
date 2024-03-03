@extends('backend.layouts.master')
@section('title', 'Pijet.In || Profile Admin')
@section('main-content')
    <!-- <h1>Profile</h1>
                                        <br> -->
    <div class="row justify-content-center align-items-center">

        <div class="card" style="width: 95%;">
            <div class="card shadow mb-4">
                <div class="card-header py-4">
                    <h4 class="m-0 font-weight-bold float-left" style="color: #469D89">Data Profile</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row justify-content-center">
                            {{-- Tampilkan foto di tengah --}}
                            <div class="col-md-4">
                                <div class="d-flex flex-column align-items-center">
                                    <div class="rounded-circle overflow-hidden" style="width: 150px; height: 150px;">
                                        <img id="profile-preview" src="{{ asset('storage/' . $user->superadmin->foto) }}"
                                            width="100%" height="100%" alt="foto profil">
                                    </div>
                                    <a href="{{ route('superadmin.edit.profile', Auth::user()->id) }}" id="edit"
                                        name="edit" class="btn btn-success btn-sm mt-2"><i class="fas fa-edit"></i> Edit
                                        Profile</a>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" disabled="disabled"
                                                value="{{ $user->superadmin->nama }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" disabled="disabled"
                                                value="{{ $user->email }}">
                                        </div>
                                        <!-- //nik  -->
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input type="text" class="form-control" disabled="disabled"
                                                value="{{ $user->superadmin->nik }}">
                                        </div>
                                        <!-- //jenis kelamin  -->
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <input type="text" class="form-control" disabled="disabled"
                                                value="{{ $user->superadmin->jenis_kelamin }}">
                                        </div>
                                        <!-- no_telepon -->
                                        <div class="form-group">
                                            <label>No Telephone</label>
                                            <input type="text" class="form-control" disabled="disabled"
                                                value="{{ $user->superadmin->no_hp }}">
                                        </div>

                                        <!-- //foto_ktp  -->
                                        <div class="form-group">
                                            <label>Foto KTP</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="{{ asset('storage/foto_ktp/' . $user->superadmin->foto_ktp) }}"
                                                        data-lightbox="ktp">
                                                        <img src="{{ asset('storage/foto_ktp/' . $user->superadmin->foto_ktp) }}"
                                                            width="100%" height="100%" alt="foto ktp">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" class="form-control" disabled="disabled"
                                                value="{{ $user->superadmin->tempat_lahir }}, {{ $user->superadmin->tanggal_lahir }}">
                                        </div>
                                        <!-- provinsi  -->
                                        @if ($alamat == null)
                                            <div class="form-group">
                                                <label>Provinsi</label>
                                                <input type="text" class="form-control" disabled="disabled"
                                                    value="">
                                            </div>
                                        @elseif($alamat->provinsi == 'null')
                                            <div class="form-group">
                                                <label>Provinsi</label>
                                                <input type="text" class="form-control" disabled="disabled"
                                                    value="{{ $alamat->provinsi }}">
                                            </div>
                                        @elseif($alamat->provinsi != null)
                                            <div class="form-group">
                                                <label>Provinsi</label>
                                                <input type="text" class="form-control" disabled="disabled"
                                                    value="{{ $alamat->provinsi }}">
                                            </div>
                                        @endif
                                        <!-- //kota  -->
                                        @if ($alamat == null)
                                            <div class="form-group">
                                                <label>Kota</label>
                                                <input type="text" class="form-control" disabled="disabled"
                                                    value="">
                                            </div>
                                        @elseif($alamat->kota != null)
                                            <div class="form-group">
                                                <label>Kota</label>
                                                <input type="text" class="form-control" disabled="disabled"
                                                    value="{{ $alamat->kota }}">
                                            </div>
                                        @endif
                                        <!-- kecamatan  -->
                                        @if ($alamat == null)
                                            <div class="form-group">
                                                <label>Kecamatan</label>
                                                <input type="text" class="form-control" disabled="disabled"
                                                    value="">
                                            </div>
                                        @elseif($alamat->kecamatan != null)
                                            <div class="form-group">
                                                <label>Kecamatan</label>
                                                <input type="text" class="form-control" disabled="disabled"
                                                    value="{{ $alamat->kecamatan }}">
                                            </div>
                                        @endif
                                        @if ($alamat == null)
                                            <div class="form-group">
                                                <label>Kelurahan</label>
                                                <input type="text" class="form-control" disabled="disabled"
                                                    value="">
                                            </div>
                                        @elseif($alamat->kelurahan != null)
                                            <div class="form-group">
                                                <label>Kelurahan</label>
                                                <input type="text" class="form-control" disabled="disabled"
                                                    value="{{ $alamat->kelurahan }}">
                                            </div>
                                        @endif
                                        <!-- //kode pos  -->
                                        @if ($alamat == null)
                                            <label>Kode Pos</label>
                                            <input type="text" class="form-control" disabled="disabled"
                                                value="">
                                        @elseif($alamat->kode_pos != null)
                                            <div class="form-group">
                                                <label>Kode Pos</label>
                                                <input type="text" class="form-control" disabled="disabled"
                                                    value="{{ $alamat->kode_pos }}">
                                            </div>
                                        @endif
                                        <!-- alamat  -->
                                        @if ($alamat == null)
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea type="text" class="form-control" disabled="disabled"></textarea>
                                            </div>
                                        @elseif($alamat->alamat_lengkap != null)
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea type="text" class="form-control" disabled="disabled">{{ $alamat->alamat_lengkap }}</textarea>
                                            </div>
                                        @endif

                                        <!-- end  -->

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
@push('scripts')
    <script src="{{ asset('app-assests/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assests/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assests/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assests/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
    <script src="{{ asset('app-assests/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('app-assests/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    {{-- sweetalert succes --}}
    @if (Session::has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ Session::get('
                                                                                                                                                                        success ') }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    {{-- sweetalert error --}}
    @if (Session::has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ Session::get('
                                                                                                                                                                        error ') }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
@endpush
