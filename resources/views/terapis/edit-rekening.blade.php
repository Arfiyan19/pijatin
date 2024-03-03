<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Therapist || Edit Rekening</title>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href=" {{ asset('frontend/terapist/css/edit-profile.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
    <!-- ======= link lib. icon ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="topbar">
            <div class="backbtn">
                <a href="{{ route('terapis.rekening', $id) }}">
                    <i class="material-icons" style="font-size:36px">chevron_left</i>
                </a>
            </div>
            <!-- <h5>Rekening Therapist</h5> -->
            <p>Rekening Therapist</p>

        </div>

        <div class="content">
            <form id="form" method="post" action="{{ route('terapis.rekening.update', [$id, $id_rekening]) }}">
                @csrf
                @method('PUT')
                <label for="nama" class="form-label">Nama lengkap pemilik rekening<span>*</span></label>
                <div class="input-field">
                    <input type="text" class="form-input" name="nama_pemilik" id="nama" value="{{ $bank->nama_pemilik }}" placeholder="masukan nama pemilik">
                    <!-- <div class="error"></div> -->
                    @if($errors->has('nama_pemilik'))
                    <div class="error" style="color: red; font-size: 12px;">
                        {{ $errors->first('nama_pemilik')}}
                    </div>
                    @endif
                </div>
                <label for="kota" class="form-label">No Rekening<span>*</span></label>
                <div class="input-field">
                    <input type="text" class="form-input" name="no_rek" id="kota" value="{{ $bank->nomor_rekening }}" placeholder="masukan nomor rekening">
                    @if($errors->has('no_rek'))
                    <div class="error" style="color: red; font-size: 12px;">
                        {{ $errors->first('no_rek')}}
                    </div>
                    @endif
                </div>
                <label for="email" class="form-label">Nama Bank<span>*</span></label>
                <div class="input-field">
                    <input type="text" class="form-input" id="email" name="nama_bank" value="{{ $bank->nama_bank }}" placeholder="masukan nama bank">
                    @if($errors->has('nama_bank'))
                    <div class="error" style="color: red; font-size: 12px; margin-left: 2px;">
                        {{ $errors->first('nama_bank')}}
                    </div>
                    @endif
                </div>
                <div class="tombol">
                    <input type="reset" value="Edit">
                    <input type="submit" value="Simpan">
                </div>
            </form>

        </div>


    </div>

</body>

</html>