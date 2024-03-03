@extends('backend.layouts.master')
@section('title', 'Pijet.In || Layanan')
@push('styles')
    <style>
        .max-width-cell {
            max-width: 500px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
@endpush
@section('main-content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4"
        style="border-left-width: 20px; margin-left: 20px; margin-right: 20px;">
        <div class="col-md-12">
            <h4 class="font-weight-bold"
                style="margin-bottom: 20px; margin-top: 10px; display: inline-block; vertical-align: middle;">
                Data Layanan Utama</h4>

            <a href="{{ route(Auth::user()->role . '-layanan.create') }}" class="btn btn-primary float-right"
                data-placement="bottom" title="Add Admin">
                <img src="{{ asset('icon/plus.svg') }}" alt="icon">
                Buat Layanan Baru
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            @foreach ($layanan_utama as $item)
                <div class="col-md-4" style="padding-bottom: 20px;">
                    <div
                        style="width: 100%; height: 100%; padding-bottom: 20px; background: white; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.05); border-radius: 10px; overflow: hidden; flex-direction: column; justify-content: center; align-items: flex-start; gap: 20px; display: inline-flex">
                        <img style="align-self: stretch; height: 180px" src="{{ asset('storage/' . $item->gambar) }}" />
                        <div
                            style="align-self: stretch; padding-left: 20px; padding-right: 20px; justify-content: space-between; align-items: center; display: inline-flex">
                            <div
                                style="padding-left: 10px; padding-right: 10px; padding-top: 5px; padding-bottom: 5px; background: rgba(63, 193, 192, 0.20); border-radius: 10px; justify-content: center; align-items: center; gap: 10px; display: flex">
                                <div style="width: 10px; height: 10px; background: #3FC1C0; border-radius: 9999px">
                                </div>
                                <div
                                    style="color: #3FC1C0; font-size: 16px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                    Aktif</div>
                            </div>
                            <div
                                style="width: 30.38px; padding-left: 13px; padding-right: 13px; padding-top: 5px; padding-bottom: 5px; justify-content: flex-start; align-items: center; gap: 10px; display: flex">
                                <a href="{{ route('superadmin-layanan.edit', $item->id) }}">
                                    <img style="width: 4.38px; height: 19.38px;" src="{{ asset('assets/titik3.svg') }}">
                                </a>
                                <div style="width: 4.38px; height: 19.38px; background: #454545"></div>
                            </div>
                        </div>
                        <div
                            style="align-self: stretch; height: 60px; flex-direction: column; justify-content: center; align-items: flex-start; gap: 5px; display: flex">
                            <div
                                style="align-self: stretch; padding-left: 20px; padding-right: 20px; justify-content: flex-start; align-items: flex-start; gap: 10px; display: inline-flex">
                                <div
                                    style="color: #454545; font-size: 24px; font-family: Poppins; font-weight: 600; line-height: 32.57px; word-wrap: break-word">
                                    {{ $item->nama_layanan }}</div>
                            </div>
                            <div
                                style="align-self: stretch; padding-left: 20px; padding-right: 20px; justify-content: flex-start; align-items: flex-start; gap: 10px; display: inline-flex">
                                <div><span
                                        style="color: #A2A2A2; font-size: 16px; font-family: Poppins; font-weight: 400; line-height: 21.71px; word-wrap: break-word">Telah
                                        dipesan sebanyak </span><span
                                        style="color: #A2A2A2; font-size: 16px; font-family: Poppins; font-weight: 600; line-height: 21.71px; word-wrap: break-word">12</span><span
                                        style="color: #A2A2A2; font-size: 16px; font-family: Poppins; font-weight: 400; line-height: 21.71px; word-wrap: break-word">
                                        ribu kali</span></div>
                            </div>
                        </div>
                        <div
                            style="align-self: stretch; padding-left: 20px; padding-right: 20px; justify-content: space-between; align-items: flex-start; display: inline-flex">
                            <div style="justify-content: flex-start; align-items: flex-start; gap: 10px; display: flex">
                                <div
                                    style="color: #85B804; font-size: 16px; font-family: Poppins; font-weight: 400; line-height: 21.71px; word-wrap: break-word">
                                    Rp.</div>
                                <div
                                    style="color: #85B804; font-size: 16px; font-family: Poppins; font-weight: 600; line-height: 21.71px; word-wrap: break-word">
                                    {{-- format rupiah --}}
                                    {{ number_format($item->harga, 0, ',', '.') }}
                                </div>
                            </div>
                            <div style="justify-content: flex-start; align-items: flex-start; gap: 10px; display: flex">
                                <div
                                    style="width: 20.30px; align-self: stretch; padding-left: 3px; padding-right: 3px; padding-top: 2px; padding-bottom: 2px; justify-content: center; align-items: center; gap: 10px; display: flex">
                                    {{-- <div style="width: 14.30px; height: 16.25px; background: #469D89"></div> --}}
                                    <img style="width: 14.30px; height: 16.25px" src="{{ asset('assets/jam.svg') }}">
                                </div>
                                <div
                                    style="color: #469D89; font-size: 16px; font-family: Poppins; font-weight: 600; line-height: 21.71px; word-wrap: break-word">
                                    {{ $item->durasi }} Menit</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4"
        style="border-left-width: 20px; margin-left: 20px; margin-right: 20px;">
        <div class="col-md-12">
            <h4 class="font-weight-bold"
                style="margin-bottom: 20px; margin-top: 10px; display: inline-block; vertical-align: middle;">
                Data Layanan Tambahan</h4>

            <a href="{{ route(Auth::user()->role . '-layanan.create') }}" class="btn btn-primary float-right"
                data-placement="bottom" title="Add Admin">
                <img src="{{ asset('icon/plus.svg') }}" alt="icon">
                Buat Layanan Baru
            </a>
        </div>
    </div>
    <div class="card" style="margin-left: 20px; margin-right: 20px;">
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Durasi</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($layanan_tambahan as $item)
                            <tr>
                                <td>{{ $item->nama_layanan }}</td>
                                <td>{{ 'Rp ' . number_format($item->harga, 0, ',', '.') }}</td>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20"
                                        viewBox="0 0 18 20" fill="none">
                                        <path
                                            d="M8.71795 2.5641C13.5327 2.5641 17.4359 6.46726 17.4359 11.2821C17.4359 16.0968 13.5327 20 8.71795 20C3.90316 20 0 16.0968 0 11.2821C0 6.46726 3.90316 2.5641 8.71795 2.5641ZM8.71795 4.10256C4.75283 4.10256 1.53846 7.31693 1.53846 11.2821C1.53846 15.2472 4.75283 18.4615 8.71795 18.4615C12.6831 18.4615 15.8974 15.2472 15.8974 11.2821C15.8974 7.31693 12.6831 4.10256 8.71795 4.10256ZM8.71795 5.64103C9.10738 5.64103 9.42923 5.93041 9.48021 6.30588L9.48718 6.41026V11.0256C9.48718 11.4505 9.14277 11.7949 8.71795 11.7949C8.32851 11.7949 8.00667 11.5054 7.95569 11.1301L7.94872 11.0256V6.41026C7.94872 5.98543 8.29313 5.64103 8.71795 5.64103ZM16.0484 2.68073L16.1331 2.7421L17.3212 3.73101C17.6478 4.00279 17.6921 4.48782 17.4204 4.81434C17.1712 5.11365 16.7429 5.17589 16.4217 4.97484L16.337 4.91347L15.1489 3.92456C14.8224 3.65278 14.7781 3.16775 15.0497 2.84123C15.299 2.54192 15.7273 2.47968 16.0484 2.68073ZM11.0256 0C11.4505 0 11.7949 0.3444 11.7949 0.769231C11.7949 1.15867 11.5054 1.4805 11.1301 1.53144L11.0256 1.53846H6.41026C5.98543 1.53846 5.64103 1.19406 5.64103 0.769231C5.64103 0.379795 5.93041 0.057959 6.30588 0.00702565L6.41026 0H11.0256Z"
                                            fill="#454545" />
                                    </svg>
                                    {{ $item->durasi }} Menit
                                </td>
                                <td class="max-width-cell">{{ $item->deskripsi }}</td>
                                <td>
                                    <div class="button-container">
                                        <a href="{{ route('superadmin-layanan.edit', $item->id) }}" class="btn-sm mr-1">
                                            <img src="{{ asset('assets/pencil.svg') }}" alt="icon">
                                        </a>
                                        <form action="{{ route('superadmin-layanan.destroy', $item->id) }}" method="POST"
                                            id="delete-form-{{ $item->id }}">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="delete-button" data-id="{{ $item->id }}">
                                                <img src="{{ asset('assets/sampah.svg') }}" alt="icon">
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
