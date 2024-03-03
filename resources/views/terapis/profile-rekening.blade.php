<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rekening Terapis Profile </title>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href=" {{ asset('frontend/terapist/css/profile-rekening.css') }}">
    <!-- ======= logo tittle bar ====== -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }} ">
    <!-- ======= link lib. icon ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        .swal-button--danger:not([disabled]):hover {
            background-color: #64b79ede !important;
        }

        .swal-button--danger {
            background-color: #56AB91 !important;
        }

        .swal-button--cancel {
            background-color: white !important;
        }

        .swal-button--cancel:hover {
            background-color: #adbfaf !important;
        }
    </style>
    <!-- //cdn jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <div class="container">
        @if(session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
        @elseif(session('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
        @endif
        <div class="topbar">
            @if(auth()->check() == false)
            <a href="{{ url('terapis/profile-therapist') }}">
                <i class="material-icons" style="font-size:36px">chevron_left</i>
            </a>
            @elseif(auth()->check() == true)
            <a href="{{ route('terapis-profile.index') }}">
                <i class="material-icons" style="font-size:36px">chevron_left</i>
            </a>
            @endif
            <p>Rekening Therapist</p>
        </div>
        <div class="content">
            @if(auth()->check() == false)
            <div class="tambah-rekening">
                <p>Anda belum menambahkan rekening</p>
            </div>
            @elseif(auth()->check() == true && $data->terapis->BankAccount->isEmpty())
            <div class="tambah-rekening">
                <p>Anda belum menambahkan rekening</p>
            </div>
            @endif
            @foreach($data->terapis->BankAccount as $rekening)
            <div class="lokasi">
                <!-- //rekening logo bank  -->
                <div class="logo-bank">
                    <img src="{{ asset('storage/foto/bri.png') }}" class="img-rekening">
                </div>
                <div class="nama-pemilik">
                    <p>{{ $rekening->nama_pemilik }}</p>
                </div>
                <div class="nomer-rekening">
                    {{ $rekening->nomor_rekening }}
                </div>
                <div class="aksi">
                    <div class="head">
                        <div class="head-tittle">
                            <a href="javascript:void(0)" onclick="editRekening('{{ $rekening->id }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                    <path d="M7.5 12.5H13.125" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M10.3125 2.18715C10.5611 1.93851 10.8984 1.79883 11.25 1.79883C11.4241 1.79883 11.5965 1.83312 11.7574 1.89975C11.9182 1.96638 12.0644 2.06404 12.1875 2.18715C12.3106 2.31027 12.4083 2.45643 12.4749 2.61728C12.5415 2.77814 12.5758 2.95054 12.5758 3.12465C12.5758 3.29876 12.5415 3.47117 12.4749 3.63202C12.4083 3.79288 12.3106 3.93904 12.1875 4.06215L4.375 11.8747L1.875 12.4997L2.5 9.99965L10.3125 2.18715Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                            <a href="javascript:void(0)" style="margin-left: 10px;" onclick="deleteRekening('{{ $rekening->id }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                    <path d="M1.875 3.75H3.125H13.125" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M11.875 3.75V12.5C11.875 12.8315 11.7433 13.1495 11.5089 13.3839C11.2745 13.6183 10.9565 13.75 10.625 13.75H4.375C4.04348 13.75 3.72554 13.6183 3.49112 13.3839C3.2567 13.1495 3.125 12.8315 3.125 12.5V3.75M5 3.75V2.5C5 2.16848 5.1317 1.85054 5.36612 1.61612C5.60054 1.3817 5.91848 1.25 6.25 1.25H8.75C9.08152 1.25 9.39946 1.3817 9.63388 1.61612C9.8683 1.85054 10 2.16848 10 2.5V3.75" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.25 6.875V10.625" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M8.75 6.875V10.625" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @if(auth()->check() == false)
            <div class="submit">
                <a href="http://127.0.0.1:8000/terapis/profile-rekening2">
                    <button class="button-rekening" type="submit">+ Tambah Rekening</button>
                </a>
            </div>
            @elseif(auth()->check() == true)
            <div class="submit">
                <a href="{{ route('terapis.rekening.tambah', $user_id) }}">
                    <button class="button-rekening" type="submit">+ Tambah Rekening</button>
                </a>
            </div>
            @endif

        </div>
    </div>

</body>
<script>
    //edit rekening
    function editRekening(id) {
        var user_id = '{{ $user_id }}';
        window.location.href = "{{ url('terapis/terapis-profile/rekening') }}/" + user_id + "/edit/" + id;
    }
    //delete rekening
    function deleteRekening(id) {
        var user_id = '{{ $user_id }}';
        swal({
                title: "Apakah anda yakin?",
                text: "Setelah dihapus, Anda tidak akan dapat memulihkan data ini!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    $.ajax({
                        url: "{{ url('terapis/terapis-profile/rekening') }}/" + user_id + "/delete/" + id,
                        type: "GET",
                        success: function(data) {
                            swal("Alamat berhasil dihapus", {
                                icon: "success",
                            }).then((willDelete) => {
                                if (willDelete) {
                                    window.location.href = "{{ route('terapis.rekening', $user_id) }}";
                                }
                            });
                        },
                    });
                } else {
                    swal("Data tidak jadi dihapus");
                }
            });
    }
</script>

</html>