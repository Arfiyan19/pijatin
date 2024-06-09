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

    <!-- //cdn jquery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- my style -->
    <link rel="stylesheet" href="{{ asset('frontend/css/homeCustomer.css') }}">

    <!-- logo tittle bar -->
    <link rel="icon" href="{{ asset('frontend/assets/image/logo-70.png') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Pijat.in</title>
</head>

<style>
    .toast-success {
        background-color: var(--primary-primary-007, #67b99a);
    }

    .toast-error {
        background-color: var(--primary-danger-007, #e7515a);
    }

    .input-pemesanan {
        border-radius: 8px;
        border: 2px solid #34CBAA;
        background: #FFF;
        display: flex;
        padding: 10px 13px;
        align-items: center;
        gap: 10px;
    }

    .tampilan-pemesanan {
        padding: 23px 22px 0;
    }

    /* .tampilan-from {
        padding: 21px 23px 0;
    } */

    .container-detail h6 {
        color: #000;
        font-family: Poppins;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        letter-spacing: -0.64px;
    }

    .container-detail label {
        color: #000;
        font-family: Poppins;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        letter-spacing: -0.56px;
    }

    .pemesan span {
        color: #56AB91;
        font-family: Poppins;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        letter-spacing: -0.64px;
    }

    .pemesan {
        padding-top: 50px;
    }

    .simpan-button {
        margin-top: 50px;
        border-radius: 20px;
        width: 208px;
        height: 50px;
        padding: 10px 0px;
        justify-content: center;
        align-items: center;
        gap: 10px;
        flex-shrink: 0;
    }

    .price {
        margin-left: 50px;
    }
</style>

<body>

    <div class="topbar">
        <div class="content">
            <div class="tittle">
                <a href="{{ route('detaillayanan') }}"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                        <path d="M19.9492 25.9502L13.0492 19.0502C12.8992 18.9002 12.7932 18.7377 12.7312 18.5627C12.6682 18.3877 12.6367 18.2002 12.6367 18.0002C12.6367 17.8002 12.6682 17.6127 12.7312 17.4377C12.7932 17.2627 12.8992 17.1002 13.0492 16.9502L19.9492 10.0502C20.2242 9.77519 20.5742 9.6377 20.9992 9.6377C21.4242 9.6377 21.7742 9.77519 22.0492 10.0502C22.3242 10.3252 22.4617 10.6752 22.4617 11.1002C22.4617 11.5252 22.3242 11.8752 22.0492 12.1502L16.1992 18.0002L22.0492 23.8502C22.3242 24.1252 22.4617 24.4752 22.4617 24.9002C22.4617 25.3252 22.3242 25.6752 22.0492 25.9502C21.7742 26.2252 21.4242 26.3627 20.9992 26.3627C20.5742 26.3627 20.2242 26.2252 19.9492 25.9502Z" fill="white" />
                    </svg></a>
                <p>Detail Pemesanan</p>
            </div>
        </div>
    </div>

    @if(auth()->check() == false)
    <div class="container-detail">
        <div class="tampilan-semua">
            <div class="tampilan-pemesanan">
                <input class="form-control input-pemesanan" type="text" placeholder="Masukan nama pemesan" aria-label="default input example">
            </div>
            <div class="tampilan-from">
                <h6>Pilih Gender Pemesan</h6>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Laki-Laki
                    </label>
                </div>
                <div class="form-check form-check-inline" style="margin-left: 81px;">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Perempuan
                    </label>
                </div>
            </div>

            <!-- <div class="tampilan-from form-check-inline">
                <h6>Pilih Gender Terapis</h6>
                <div class="form-check form-check-inline">
                    <input class=" form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault3">
                    <label class="form-check-label" for="flexRadioDefault3">
                        Laki-Laki
                    </label>
                </div>
                <div class="form-check form-check-inline" style="margin-left: 81px;">
                    <input class=" form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault4">
                    <label class="form-check-label" for="flexRadioDefault4">
                        Perempuan
                    </label>
                </div>
            </div> -->

            <div class="tampilan-from">
                <h6>Layanan Tambahan</h6>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Kerokan
                        <p> <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                <path d="M7.5 12.5C10.25 12.5 12.5 10.25 12.5 7.5C12.5 4.75 10.25 2.5 7.5 2.5C4.75 2.5 2.5 4.75 2.5 7.5C2.5 10.25 4.75 12.5 7.5 12.5ZM7.5 1.25C10.9375 1.25 13.75 4.0625 13.75 7.5C13.75 10.9375 10.9375 13.75 7.5 13.75C4.0625 13.75 1.25 10.9375 1.25 7.5C1.25 4.0625 4.0625 1.25 7.5 1.25ZM10.625 8.6875L10.1875 9.5L6.875 7.6875V4.375H7.8125V7.125L10.625 8.6875Z" fill="#56AB91" />
                            </svg>
                            10 menit
                            <span class="price">Rp.10.000</span>
                        </p>
                    </label>
                </div>

                <div class="form-check">
                    <input class=" form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Lulur
                        <p> <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                <path d="M7.5 12.5C10.25 12.5 12.5 10.25 12.5 7.5C12.5 4.75 10.25 2.5 7.5 2.5C4.75 2.5 2.5 4.75 2.5 7.5C2.5 10.25 4.75 12.5 7.5 12.5ZM7.5 1.25C10.9375 1.25 13.75 4.0625 13.75 7.5C13.75 10.9375 10.9375 13.75 7.5 13.75C4.0625 13.75 1.25 10.9375 1.25 7.5C1.25 4.0625 4.0625 1.25 7.5 1.25ZM10.625 8.6875L10.1875 9.5L6.875 7.6875V4.375H7.8125V7.125L10.625 8.6875Z" fill="#56AB91" />
                            </svg>
                            10 menit
                            <span class="price">Rp.10.000</span>
                        </p>
                    </label>
                </div>
                <div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Totok Wajah
                            <p> <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                    <path d="M7.5 12.5C10.25 12.5 12.5 10.25 12.5 7.5C12.5 4.75 10.25 2.5 7.5 2.5C4.75 2.5 2.5 4.75 2.5 7.5C2.5 10.25 4.75 12.5 7.5 12.5ZM7.5 1.25C10.9375 1.25 13.75 4.0625 13.75 7.5C13.75 10.9375 10.9375 13.75 7.5 13.75C4.0625 13.75 1.25 10.9375 1.25 7.5C1.25 4.0625 4.0625 1.25 7.5 1.25ZM10.625 8.6875L10.1875 9.5L6.875 7.6875V4.375H7.8125V7.125L10.625 8.6875Z" fill="#56AB91" />
                                </svg>
                                10 menit
                                <span class="price">Rp.10.000</span>
                            </p>
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Refleksi
                            <p> <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                    <path d="M7.5 12.5C10.25 12.5 12.5 10.25 12.5 7.5C12.5 4.75 10.25 2.5 7.5 2.5C4.75 2.5 2.5 4.75 2.5 7.5C2.5 10.25 4.75 12.5 7.5 12.5ZM7.5 1.25C10.9375 1.25 13.75 4.0625 13.75 7.5C13.75 10.9375 10.9375 13.75 7.5 13.75C4.0625 13.75 1.25 10.9375 1.25 7.5C1.25 4.0625 4.0625 1.25 7.5 1.25ZM10.625 8.6875L10.1875 9.5L6.875 7.6875V4.375H7.8125V7.125L10.625 8.6875Z" fill="#56AB91" />
                                </svg>
                                10 menit
                                <span class="price">Rp.10.000</span>
                            </p>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div id="tambahButton" class="pemesan text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                <path d="M13.75 11.25H18.75V13.75H13.75V18.75H11.25V13.75H6.25V11.25H11.25V6.25H13.75V11.25ZM12.5 25C9.18479 25 6.00537 23.683 3.66117 21.3388C1.31696 18.9946 0 15.8152 0 12.5C0 9.18479 1.31696 6.00537 3.66117 3.66117C6.00537 1.31696 9.18479 0 12.5 0C15.8152 0 18.9946 1.31696 21.3388 3.66117C23.683 6.00537 25 9.18479 25 12.5C25 15.8152 23.683 18.9946 21.3388 21.3388C18.9946 23.683 15.8152 25 12.5 25ZM12.5 22.5C15.1522 22.5 17.6957 21.4464 19.5711 19.5711C21.4464 17.6957 22.5 15.1522 22.5 12.5C22.5 9.84783 21.4464 7.3043 19.5711 5.42893C17.6957 3.55357 15.1522 2.5 12.5 2.5C9.84783 2.5 7.3043 3.55357 5.42893 5.42893C3.55357 7.3043 2.5 9.84783 2.5 12.5C2.5 15.1522 3.55357 17.6957 5.42893 19.5711C7.3043 21.4464 9.84783 22.5 12.5 22.5Z" fill="#56AB91" />
            </svg> <span>Pemesan</span>
        </div>
        <div class="text-center">
            <button type="button" class="simpan-button" style="">Simpan</button> <!-- Tombol "Simpan" -->
        </div>
    </div>
    @elseif(auth()->check() == true)
    <form id="form-pemesanan" class="form-pemesanan" action="javascript:void(0)" method="POST">
        @csrf
        <div class="container-detail">
            <div class="tampilan-semua">
                <div class="tampilan-pemesanan">
                    <input class="form-control input-pemesanan" name="nama_pemesan" id="nama_pemesan" type="text" placeholder="Masukan nama pemesan" aria-label="default input example">
                    <span class="text-danger" id="nama_pemesanError"></span>
                </div>
                <div class="tampilan-from">
                    <h6>Pilih Gender Pemesan</h6>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jk_pemesan" id="jk_pemesan" value="Laki-Laki">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Laki-Laki
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jk_pemesan" id="jk_pemesan" value="Perempuan">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Perempuan
                        </label>
                    </div>
                </div>
                <div class="tampilan-from">
                    <span class="text-danger" id="jk_pemesanError"></span>
                </div>

                <!-- <div class="tampilan-from form-check-inline">
                    <h6>Pilih Gender Terapis</h6>
                    <div class="form-check form-check-inline">
                        <input class=" form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault3">
                        <label class="form-check-label" for="flexRadioDefault3">
                            Laki-Laki
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class=" form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault4">
                        <label class="form-check-label" for="flexRadioDefault4">
                            Perempuan
                        </label>
                    </div>
                </div> -->

                <div class="tampilan-from">
                    <h6>Layanan Tambahan</h6>
                    @foreach($layanan as $layanan)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="layanan_tambahan[]" value="{{ $layanan->id }}" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{ $layanan->nama_layanan }}
                            <p> <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                    <path d="M7.5 12.5C10.25 12.5 12.5 10.25 12.5 7.5C12.5 4.75 10.25 2.5 7.5 2.5C4.75 2.5 2.5 4.75 2.5 7.5C2.5 10.25 4.75 12.5 7.5 12.5ZM7.5 1.25C10.9375 1.25 13.75 4.0625 13.75 7.5C13.75 10.9375 10.9375 13.75 7.5 13.75C4.0625 13.75 1.25 10.9375 1.25 7.5C1.25 4.0625 4.0625 1.25 7.5 1.25ZM10.625 8.6875L10.1875 9.5L6.875 7.6875V4.375H7.8125V7.125L10.625 8.6875Z" fill="#56AB91" />
                                </svg>
                                {{ $layanan->durasi }}
                                <span class="price">Rp.{{ $layanan->harga }}</span>
                            </p>
                        </label>
                    </div>
                    @endforeach

                </div>
            </div>
            <!-- <div id="tambahButton" class="pemesan text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                    <path d="M13.75 11.25H18.75V13.75H13.75V18.75H11.25V13.75H6.25V11.25H11.25V6.25H13.75V11.25ZM12.5 25C9.18479 25 6.00537 23.683 3.66117 21.3388C1.31696 18.9946 0 15.8152 0 12.5C0 9.18479 1.31696 6.00537 3.66117 3.66117C6.00537 1.31696 9.18479 0 12.5 0C15.8152 0 18.9946 1.31696 21.3388 3.66117C23.683 6.00537 25 9.18479 25 12.5C25 15.8152 23.683 18.9946 21.3388 21.3388C18.9946 23.683 15.8152 25 12.5 25ZM12.5 22.5C15.1522 22.5 17.6957 21.4464 19.5711 19.5711C21.4464 17.6957 22.5 15.1522 22.5 12.5C22.5 9.84783 21.4464 7.3043 19.5711 5.42893C17.6957 3.55357 15.1522 2.5 12.5 2.5C9.84783 2.5 7.3043 3.55357 5.42893 5.42893C3.55357 7.3043 2.5 9.84783 2.5 12.5C2.5 15.1522 3.55357 17.6957 5.42893 19.5711C7.3043 21.4464 9.84783 22.5 12.5 22.5Z" fill="#56AB91" />
                </svg> <span>Pemesan</span>
            </div> -->
            <div class="text-center">
                <button type="button" class="simpan-button" style="">Simpan</button> <!-- Tombol "Simpan" -->
            </div>
        </div>
    </form>
    @endif
    @if(auth()->check() == true)
    <script>
        // form-pemesanan aler test
        $(document).ready(function() {
            $('.simpan-button').click(function() {
                // input-pemesanan
                var input = $(this).val();
                //form 
                var form = $('#form-pemesanan').serialize();
                $.ajax({
                    type: "POST",
                    url: "{{ route('customers.simpanDetailPemesan', $id) }}",
                    data: form,
                    dataType: "json",
                    success: function(data) {
                        // Toastr with green background color for toastr style
                        //   if success true and false 
                        if (data.success == true) {
                            toastr.success(data.message, 'Success');
                            var id_layanan = data.data.detail_pemesanan.layanan_id;
                            var id_pemesanan = data.data.detail_pemesanan.pemesanan_id;
                            // /layanan/pesan/{id}/detailPemesan/{id_pemesanan}
                            window.location.href = "{{ url('customers/layanan/pesan') }}/" + id_layanan + "/detailPemesan/" + id_pemesanan;


                            //redirect route layanan/pesan/{id}/detailPemesan/{id_pemesanan}
                        } else {
                            toastr.error(data.message, 'Error');
                            //tampilkan error message
                            $('#nama_pemesanError').text(data.data.nama_pemesan).css({
                                'font-family': 'Poppins',
                                'font-size': '12px',
                            });
                            $('#jk_pemesanError').text(data.data.jk_pemesan).css({
                                'font-family': 'Poppins',
                                'font-size': '12px',
                            });
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>
    @endif
    <script>
        const tambahButton = document.getElementById("tambahButton");
        const containerDetail = document.querySelector(".container-detail");
        let formCounter = 2; // Mulai dari "Masukan nama pemesanan 2"
        const maxPemesanan = 3;

        tambahButton.addEventListener("click", function() {
            if (formCounter <= maxPemesanan) {
                // Cloning the form elements
                const clonedForm = document.querySelector(".tampilan-semua").cloneNode(true);

                // Change the name attribute of radio buttons in the cloned form
                clonedForm.querySelectorAll('input[type="radio"]').forEach((radio) => {
                    const nameAttribute = radio.getAttribute("name");
                    radio.setAttribute("name", `${nameAttribute}-${formCounter}`);
                    radio.checked = false; // Uncheck the radio buttons
                });

                // Change the placeholder attribute of input for "Masukan nama pemesanan"
                clonedForm.querySelector('.input-pemesanan').setAttribute("placeholder", `Masukan nama pemesanan ${formCounter}`);

                // Add text above the "Masukan nama pemesan" input
                const pemesanText = document.createElement("p");
                pemesanText.textContent = `Pemesan ${formCounter}`;
                clonedForm.querySelector('.tampilan-pemesanan').insertBefore(pemesanText, clonedForm.querySelector('.input-pemesanan'));

                // Uncheck all the checkboxes in the cloned form
                clonedForm.querySelectorAll('input[type="checkbox"]').forEach((checkbox) => {
                    checkbox.checked = false;
                });

                // Insert the cloned form before the tambahButton
                containerDetail.insertBefore(clonedForm, tambahButton);

                formCounter++;

                if (formCounter > maxPemesanan) {
                    tambahButton.style.display = "none"; // Menyembunyikan tombol setelah mencapai maksimum
                }
            }
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>