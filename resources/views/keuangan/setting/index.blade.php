@extends('keuangan.layouts.master')
@section('content')
<div class="topbar">

    <div class="toggle">
        <i class='bx bx-menu'></i>
        <div class="col">
            <p>Pengaturan</p>
        </div>
    </div>
    <div class="notifikasi">
        <div class="col">
            <i class='bx bx-bell'></i>
        </div>
        <div class="col">
            <div class="user">
                <img src="{{ 'finance/imgs/customer02.jpg' }}" alt="">
            </div>
        </div>
    </div>
</div>

<div class="heading">Informasi rekening</div>
@foreach($data as $data)
<div class="form-set">
    <div class="form">
        <table>
            <tr>
                <td><label for="rekening">No Rekening</label></td>
                <td><input type="text" readonly class="form-control-plaintext" id="rekening" value="{{ $data->no_rek }}">
                </td>
            </tr>
            <tr>
                <td><label for="Bank">Nama Bank</label></td>
                <td><input type="text" readonly class="form-control-plaintext" id="Bank" value="{{ $data->bank }}">
                </td>
            </tr>
            <tr>
                <td><label for="nama_pemilik">Nama Pemilik</label></td>
                <td><input type="text" readonly class="form-control-plaintext" id="nama_pemilik" value="{{ $data->nama_pemilik }}"></td>
            </tr>
        </table>
    </div>
    <div class="logo-bank" style="margin-left: 20%;margin-top: 5px;">
        <!-- <img src="{{ asset('storage/foto/' . $data->logo) }}" alt=""> -->
        <img src="{{ asset('storage/foto/' . $data->logo) }}" class="img-fluid" style="width: 150px;margin-right: 50px;" alt="{{ $data->logo }}">

    </div>
</div>
@endforeach
@endsection