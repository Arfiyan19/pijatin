@extends('keuangan.layouts.detail')
@section('content')
<div class="main">
    <div class="topbar">

        <div class="logo">
            <span class="icon">
                <img src="{{ asset('frontend/assets/image/logo-70.png') }}" alt="">
            </span>
        </div>

        <div class="notifikasi">
            <div class="col">
                <ion-icon name="notifications-sharp"></ion-icon>
            </div>
            <div class="col">
                <div class="user">
                    <img src="{{ asset('finance/imgs/customer01.jpg') }}" alt="">
                </div>
            </div>
        </div>

    </div>

    <div class="cardMain">
        <div class="card">
            <div>
                <p>Detail Refund</p>
            </div>
        </div>
    </div>
    <!-- //form  -->

    <div class="cardBox">
        <div class="card">
            <div class="card-left w-50 h-100">
                <table>
                    <thead>
                        @foreach($data as $dt)
                        <tr>
                            <td>Id Pemesanan</td>
                            <input type="hidden" name="id-pemesanan" id="id-pemesanan" value="<?php echo $dt->id; ?>" />
                            <td>ORDR-0{{ $dt->pemesanan->id }}</td>
                        </tr>
                        <tr>
                            <td>ID Costumer</td>
                            <td>cst-{{ $dt->customer_id }}</td>
                        </tr>
                        <tr>
                            <td>Nama Customer</td>
                            <td>{{ $dt->customers->nama }}</td>
                        </tr>

                        <tr>
                            <td>ID Terapis</td>
                            <td>TP-{{ $dt->pemesanan->terapis->id }}</td>
                        </tr>
                        <tr>
                            <td>Nama Terapis</td>
                            <td>{{ $dt->pemesanan->terapis->nama }}</td>
                        </tr>
                        <tr>
                            <td>Layanan</td>
                                @foreach($dt->pemesanan->pemesanan_detail as $detail)
                                    <td>
                                        {{ $detail->layanan->nama_layanan }}
                                        @if ($detail->layananExtra)
                                            + {{ $detail->layananExtra->nama_layanan }}
                                        @endif
                                    </td>                                
                                @endforeach
                        </tr>
                        <tr>
                            <td>Tanggal Pemesanan</td>
                            <td>{{ date('d/m/Y', strtotime($dt->pemesanan->tanggal_pemesanan)) }}</td>
                        </tr>
                        <tr>
                            <td>Metode Pembayaran</td>
                            @if($dt->pemesanan->status_pemesanan == 'Batal')
                                <td style="color:red; font-weight:bold">Dibatalkan</td>
                            @endif
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="card-right w-50 h-100">
                <table>
                    <thead>
                        @foreach ($dt->customers->bankAccount as $bankAccount)
                            <tr>
                                <td>No Rekening</td>
                                <td>{{ $bankAccount->nomor_rekening}}</td>
                            </tr>
                            <tr>
                                <td>Nama Bank</td>
                                <td>{{ $bankAccount->nama_bank }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>{{ $bankAccount->nama_pemilik }}</td>
                            </tr>
                        @endforeach

                        <tr>
                            <td>Jumlah Rupiah</td>
                            <td>Rp {{ number_format($dt->pemesanan->total_bayar, 0, ',', '.')  }},00</td>
                        </tr>
                        <tr>
                            @if($dt->status_refund == "Selesai")
                                <td>Status</td>
                                <td style="color:green; font-weight:bold">Lunas</td>
                            @else
                                <td></td>
                                <td style="text-align: left;">
                                    <button class="btn btn-primary" style="background: var(--tosca); color: white; font-size: 15px; height: 56px;">
                                        Transfer
                                    </button>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection