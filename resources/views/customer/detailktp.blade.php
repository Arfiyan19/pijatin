<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- my style -->
    <link rel="stylesheet" href="{{ asset('frontend/css/homeCustomer.css') }}">

    <!-- logo tittle bar -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }}">

    <title>Pijat.in</title>
</head>

<body>
    <div class="topbar">
        <div class="content">
            <div class="tittle">
                <a href="{{ route('profile.index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                        <path d="M19.9492 25.9502L13.0492 19.0502C12.8992 18.9002 12.7932 18.7377 12.7312 18.5627C12.6682 18.3877 12.6367 18.2002 12.6367 18.0002C12.6367 17.8002 12.6682 17.6127 12.7312 17.4377C12.7932 17.2627 12.8992 17.1002 13.0492 16.9502L19.9492 10.0502C20.2242 9.77519 20.5742 9.6377 20.9992 9.6377C21.4242 9.6377 21.7742 9.77519 22.0492 10.0502C22.3242 10.3252 22.4617 10.6752 22.4617 11.1002C22.4617 11.5252 22.3242 11.8752 22.0492 12.1502L16.1992 18.0002L22.0492 23.8502C22.3242 24.1252 22.4617 24.4752 22.4617 24.9002C22.4617 25.3252 22.3242 25.6752 22.0492 25.9502C21.7742 26.2252 21.4242 26.3627 20.9992 26.3627C20.5742 26.3627 20.2242 26.2252 19.9492 25.9502Z" fill="white" />
                    </svg></a>
                <p>Detail KTP</p>
            </div>
        </div>
    </div>
    @if(auth()->check() == true)
    <div class="container-detailktp">
        <div class="header">
            <div class="tittle">Informasi KTP</div>
        </div>

        <div class="card-foto">
            <div class="frame">
                <div class="txt">Foto KTP</div>
                <div class="pict">
                    <img src="{{ asset('storage/foto_ktp/' . $data['customers']['foto_ktp'] ) }}" alt="">

                </div>
            </div>
            <div class="frame">
                <div class="txt">Foto KTP</div>
                <div class="pict"><img src="{{ asset('frontend/assets/image/ktp-selfi.png') }}" alt=""></div>
            </div>
        </div>

        <div class="detail">
            <table>
                <thead>
                    <tr>
                        <td>Nik KTP</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $data['customers']['nik'] }}</td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <td>Nama lengkap(sesuai KTP)</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $data['customers']['nama'] }}</td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <td>Tempat lahir</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $data['alamat'][0]['provinsi'] }}</td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <td>Tanggal lahir</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ date('d F Y',strtotime($data['customers']['tanggal_lahir'])) }}</td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <td>Alamat</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$data['alamat'][0]['alamat_lengkap'] . ', '. $data['alamat'][0]['kecamatan'] . ', '. $data['alamat'][0]['kota'] . ', '. $data['alamat'][0]['provinsi'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @elseif(auth()->check() == false)
    <div class="container-detailktp">
        <div class="header">
            <div class="tittle">Informasi KTP</div>
        </div>

        <div class="card-foto">
            <div class="frame">
                <div class="txt">Foto KTP</div>
                <div class="pict"><img src="{{ asset('frontend/assets/image/ktp4.png') }}" alt=""></div>
            </div>
            <div class="frame">
                <div class="txt">Foto KTP</div>
                <div class="pict"><img src="{{ asset('frontend/assets/image/ktp-selfi.png') }}" alt=""></div>
            </div>
        </div>

        <div class="detail">
            <table>
                <thead>
                    <tr>
                        <td>No KTP</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>12345678910</td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <td>Nama lengkap(sesuai KTP)</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Supriadi Jalaludin</td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <td>Tempat lahir</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jakarta</td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <td>Tanggal lahir</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>08 November 2023</td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <td>Alamat</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jl.Raya Janti Gg.Arjuna No 59 Banguntapan,Bantul </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endif


</body>

</html>