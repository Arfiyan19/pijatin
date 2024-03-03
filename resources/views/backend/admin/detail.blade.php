@extends('backend.layouts.master')
@section('title', 'Pijat.in || Karyawan')
@section('main-content')
    <div class="col-md-12">
        <a href="{{ route('superadmin-admin.index') }}">
            <img src="{{ asset('assets/left_arrow.svg') }}" alt="icon" style="margin-left: 15px;">
        </a>
        <h4 class="font-weight-bold"
            style="padding-left: 10px; margin-bottom: 20px; margin-top: 10px; display: inline-block; vertical-align: middle;">
            Detail Akun Administrasi</h4>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center rounded-circle overflow-hidden">
                            <img id="profile-preview" src="{{ asset('storage/' . $data[0]->foto) }}" width="81%"
                                height="81%" alt="foto profil">
                        </div>
                        <h3 class="profile-username text-center">{{ $data[0]->nama }}</h3>
                        <p class="text-muted text-center">{{ $data[0]->role }}</p>

                        <h4>Infromasi Akun</h4>
                        <table class="table">
                            <tr>
                                <td class="text-left">Nomor ID</td>
                                <td class="text-right">ADM{{ $data[0]->id }}</td>
                            </tr>
                            <tr>
                                <td class="text-left">Peran Akun</td>
                                <td class="text-right">{{ $data[0]->role }}</td>
                            </tr>
                            <tr>
                                <td class="text-left">Alamat Email</td>
                                <td class="text-right">{{ $data[0]->email }}</td>
                            </tr>
                            <tr>
                                <td class="text-left">Ponsel</td>
                                <td class="text-right">{{ $data[0]->no_hp }}</td>
                            </tr>
                            <tr>
                                <td class="text-left">Area Penempatan</td>
                                <td class="text-right">{{ $data[0]->kecamatan }}, {{ $data[0]->kota }}</td>
                            </tr>
                        </table>
                        <a href="" class="btn btn-danger float-right" style="background-color: white; color: red;">
                            Hapus Akun</a>
                    </div>
                </div>
            </div>


            <div class="col-md-7">
                <div class="card">
                    <!-- Konten Card -->
                    <h4
                        style="
                            padding-left: 20px;
                            padding-top: 20px;">
                        Identitas Diri
                    </h4>
                    <table class="table">
                        <tr>
                            <td class="text-left">NIK</td>
                            <td class="text-right">{{ $data[0]->nik }}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Nama Lengkap</td>
                            <td class="text-right">{{ $data[0]->nama }}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Tempat Lahir</td>
                            <td class="text-right">{{ $data[0]->tempat_lahir }}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Tanggal Lahir</td>
                            <td class="text-right">{{ $data[0]->tanggal_lahir }}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Jenis Kelamin</td>
                            <td class="text-right">{{ $data[0]->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Alamat</td>
                            <td class="text-right">{{ $data[0]->kelurahan }}, {{ $data[0]->kecamatan }},
                                {{ $data[0]->kota }}</td>
                        </tr>
                    </table>
                </div>
                <br>

            </div>

        </div>
    </div>
    <br>
@endsection
