@extends('keuangan.layouts.master')
@section('content')
    <div class="topbar">

        <div class="toggle">
            <i class='bx bx-menu'></i>
            <div class="col">
                <p>Keseluruhan Transaksi</p>
            </div>
        </div>
        <div class="notifikasi">
            <div class="col">
                <i class='bx bx-bell'></i>
            </div>
            <div class="col">
                <div class="user">
                    <img src="{{ 'frontend\assets\image\orang3.jpg' }}" alt="">
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar">
        <div class="btn-nav">
            <button><a href="">Transaksi Masuk</a></button>
            <button><a href="">Transaksi Keluar</a></button>
        </div>
        <div class="search">
            <label>
                    <form action="" method="POST">
                        @csrf
                        <input type="hidden" name="view_name" value="index">
                        <input type="text" name="query" placeholder="Search here">
                    </form>
            </label>
        </div>
</nav>

    <div class="details">
        <div class="recentOrders">
            @include('keuangan.transaksi.table')
        </div>
    </div>
    <div class="footer">
    <div class="btn-unduh">
        <a href="" onclick="return confirmDownload();">
            <i class='bx bx-download'></i>
            <p>Unduh File</p>
        </a>
    </div>
    <div class="pagination">
        <i class='bx bxs-left-arrow'></i>
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <i class='bx bxs-right-arrow'></i>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    function confirmDownload() {
        // Show a confirmation popup
        Swal.fire({
            html: '<br>Ini akan disimpan dalam bentuk excel<br>Klik simpan untuk menyimpan<br>',
            confirmButtonColor: '#469D89',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Simpan'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Saved!",
                    text: "Data telah di unduh.",
                    icon: "success"
                });
                window.location.href = "";
            }
        });
        return false;
    }

    //Pop up Detail Deposit
    function openDetailModalDeposit(itemId) {
        // Make an AJAX request to fetch data
        $.ajax({
            url: '/finance/deposit/detail/' + itemId,
            method: 'GET',
            success: function (data) {

                Swal.fire({
                    showConfirmButton: false,
                    width: '40%',
                    html: `
                        <div style="text-align: left;">
                            <h3 style="color: black;">Top Up E-Wallet Terapis</h3>
                            <p> ${data[0].terapis.nama}&nbsp;&nbsp;&nbsp;&nbsp;#TP${data[0].terapis_id}</p>
                            <br>
                        </div>

                        <br>
                        <hr>
                        <br>

                        <div style="display: flex; justify-content: space-between;">
                            <div style="text-align: left;">
                                <p>Nama Terapis:</p>
                                <p>ID Terapis:</p>
                                <p>Tanggal:</p>
                                <p>Nominal Top Up:</p>
                                <p>Metode:</p>
                            </div>
                            <div style="text-align: right;">
                                <p>${data[0].terapis.nama}</p>
                                <p>${data[0].terapis_id}</p>
                                <p>${data[0].tanggal}</p>
                                <p>Rp. ${data[0].jumlah}</p>
                                <p></p>
                            </div>
                        </div>
                        <br>
                        <hr><br>
                        <div style="display: flex; justify-content: right;">
                            <div style="text-align: right;">
                                <p>
                                    ${data[0].status === 'success' ? 
                                        `<h3 style="color: black;">Total Saldo Masuk: Rp. ${data[0].jumlah}</h3>` : ''}
                                </p>
                            </div>
                        </div>
                        <br>
                    `
                });

            },
            error: function (error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    //Pop up Detail Pemesanan Customer
    function openDetailModalPemesanan(itemId) {
        $.ajax({
            url: '/finance/customer/detail/' + itemId,
            method: 'GET',
            success: function (data) {
                // Format tanggal
                var jadwalDate = new Date(data[0].jadwal[0].tanggal);
                var tanggalPemesananDate = new Date(data[0].tanggal_pemesanan);

                var formattedJadwal = ("0" + jadwalDate.getDate()).slice(-2) + "-" + ("0" + (jadwalDate.getMonth() + 1)).slice(-2) + "-" + jadwalDate.getFullYear();
                var formattedTanggalPemesanan = ("0" + tanggalPemesananDate.getDate()).slice(-2) + "-" + ("0" + (tanggalPemesananDate.getMonth() + 1)).slice(-2) + "-" + tanggalPemesananDate.getFullYear();
                
                Swal.fire({
                    showConfirmButton: false,
                    width: '40%',
                    html: `
                        <div style="text-align: left;">
                            <h3 style="color: black;">Layanan ${data[0].pemesanan_detail[0].layanan.nama_layanan}</h3>
                            <p>Pesanan ${data[0].customers.nama} &nbsp;&nbsp;&nbsp;&nbsp;#${data[0].id}</p>
                            <br>
                            <p style="color: #469D89;">Harga Layanan ${data[0].pemesanan_detail[0].layanan.nama_layanan} : &nbsp; Rp. ${data[0].pemesanan_detail[0].layanan.harga}</p>
                            <p>Jadwal layanan : &nbsp; ${formattedJadwal}</span></p>
                            <p>Tanggal Pemesanan : &nbsp; ${formattedTanggalPemesanan}</p>
                        </div>

                        <br>
                        <hr>
                        <br>

                        <div style="display: flex; justify-content: space-between;">
                            <div style="text-align: left;">
                                <p><strong>Customer 1</strong></p>
                                <p>Name:</p>
                                <p>Nama Customer:</p>
                                <p>Nama Terapis:</p>
                                <p>Harga:</p>
                                <p>Durasi:</p>
                                <p>Total Biaya layanan:</p>
                            </div>
                            <div style="text-align: right;">
                                <br>
                                <p>${data[0].nama_pemesan_1}</p>
                                <p>${data[0].terapis.nama}</p>
                                <p>${data[0].pemesanan_detail[0].layanan_extra1 ? data[0].pemesanan_detail[0].layanan_extra1.nama_layanan : '-'}</p>
                                <p>${data[0].pemesanan_detail[0].layanan_extra1 ? 'Rp. ' + data[0].pemesanan_detail[0].layanan_extra1.harga : '-'}</p>
                                <p>${data[0].pemesanan_detail[0].layanan_extra1 ? 
                                    data[0].pemesanan_detail[0].layanan.durasi + data[0].pemesanan_detail[0].layanan_extra1.durasi : 
                                    data[0].pemesanan_detail[0].layanan.durasi}
                                    Menit
                                </p>
                                <p>${data[0].pemesanan_detail[0].layanan_extra1 ? 
                                    'Rp. ' + (data[0].pemesanan_detail[0].layanan.harga + data[0].pemesanan_detail[0].layanan_extra1.harga) : 
                                    (data[0].terapis_id_1 !== null ? 'Rp. ' + data[0].pemesanan_detail[0].layanan.harga : '-')}
                                </p>
                            </div>
                        </div>
                        <br>
                        <div style="display: flex; justify-content: space-between;">
                            <div style="text-align: left;">
                                <p><strong>Customer 2</strong></p>
                                <p>Nama Customer:</p>
                                <p>Nama Terapis:</p>
                                <p>Layanan Tambahan:</p>
                                <p>Harga:</p>
                                <p>Durasi:</p>
                                <p>Total Biaya layanan:</p>
                            </div>
                            <div style="text-align: right;">
                                <br>
                                <p>${data[0].nama_pemesan_2 ? data[0].nama_pemesan_2 : '-'}</p>
                                <p>${data[0].terapis_id_2 ? data[0].terapis2.nama : '-' }</p>
                                <p>${data[0].pemesanan_detail[0].layanan_extra2 ? data[0].pemesanan_detail[0].layanan_extra2.nama_layanan : '-'}</p>
                                <p>${data[0].pemesanan_detail[0].layanan_extra2 ? 'Rp. ' + data[0].pemesanan_detail[0].layanan_extra2.harga : '-'}</p>
                                <p>${data[0].pemesanan_detail[0].layanan_extra2 ? 
                                    data[0].pemesanan_detail[0].layanan.durasi + data[0].pemesanan_detail[0].layanan_extra2.durasi + ' Menit' : 
                                    (data[0].terapis_id_2 !== null ? data[0].pemesanan_detail[0].layanan.durasi + ' Menit' : '-')}
                                </p>
                                <p>${data[0].pemesanan_detail[0].layanan_extra2 ? 
                                    'Rp. ' + (data[0].pemesanan_detail[0].layanan.harga + data[0].pemesanan_detail[0].layanan_extra2.harga) : 
                                    (data[0].terapis_id_2 !== null ? 'Rp. ' + data[0].pemesanan_detail[0].layanan.harga : '-')}
                                </p>
                            </div>
                        </div>
                        <br>
                        <div style="display: flex; justify-content: space-between;">
                            <div style="text-align: left;">
                                <p><strong>Customer 3</strong></p>
                                <p>Nama Customer:</p>
                                <p>Nama Terapis:</p>
                                <p>Layanan Tambahan:</p>
                                <p>Harga:</p>
                                <p>Durasi:</p>
                                <p>Total Biaya layanan:</p>
                            </div>
                            <div style="text-align: right;">
                                <br>
                                <p>${data[0].nama_pemesan_3 ? data[0].nama_pemesan_3 : '-'}</p>
                                <p>${data[0].terapis_id_3 ? data[0].terapis3.nama : '-' }</p>
                                <p>${data[0].pemesanan_detail[0].layanan_extra3 ? data[0].pemesanan_detail[0].layanan_extra3.nama_layanan : '-'}</p>
                                <p>${data[0].pemesanan_detail[0].layanan_extra3 ? 'Rp. ' + data[0].pemesanan_detail[0].layanan_extra3.harga : '-'}</p>
                                <p>${data[0].pemesanan_detail[0].layanan_extra3 ? 
                                    data[0].pemesanan_detail[0].layanan.durasi + data[0].pemesanan_detail[0].layanan_extra3.durasi + ' Menit' : 
                                    (data[0].terapis_id_3 !== null ? data[0].pemesanan_detail[0].layanan.durasi + ' Menit' : '-')}
                                </p>
                                <p>${data[0].pemesanan_detail[0].layanan_extra3 ? 
                                    'Rp. ' + (data[0].pemesanan_detail[0].layanan.harga + data[0].pemesanan_detail[0].layanan_extra3.harga) : 
                                    (data[0].terapis_id_3 !== null ? 'Rp. ' + data[0].pemesanan_detail[0].layanan.harga : '-')}
                                </p>
                                <br>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <div style="text-align: left;">
                                <p>Metode : ${data[0].metode_pembayaran === 'Transfer Bank' ? 'Transfer' : 'Cash'}</p>
                                ${data[0].metode_pembayaran === 'Transfer Bank' ? '<p>Bank : </p>' : ''}
                            </div>
                            <div style="text-align: right;">
                                ${data[0].metode_pembayaran === 'Transfer Bank' ? '<br>' : ''}
                                <p><strong>Grand Total Rp. 
                                    ${data[0].terapis_id_3 !== null ? 
                                        data[0].pemesanan_detail[0].layanan.harga * 3 + 
                                        (data[0].pemesanan_detail[0].layanan_extra1 ? data[0].pemesanan_detail[0].layanan_extra1.harga : 0) + 
                                        (data[0].pemesanan_detail[0].layanan_extra2 ? data[0].pemesanan_detail[0].layanan_extra2.harga : 0) + 
                                        (data[0].pemesanan_detail[0].layanan_extra3 ? data[0].pemesanan_detail[0].layanan_extra3.harga : 0) :
                                    (data[0].terapis_id_2 !== null ? 
                                        data[0].pemesanan_detail[0].layanan.harga * 2 + 
                                        (data[0].pemesanan_detail[0].layanan_extra1 ? data[0].pemesanan_detail[0].layanan_extra1.harga : 0) + 
                                        (data[0].pemesanan_detail[0].layanan_extra2 ? data[0].pemesanan_detail[0].layanan_extra2.harga : 0) :
                                    (data[0].pemesanan_detail[0].layanan_extra1 ? 
                                        data[0].pemesanan_detail[0].layanan_extra1.harga  + data[0].pemesanan_detail[0].layanan.harga : data[0].pemesanan_detail[0].layanan.harga))}
                                </strong></p>
                            </div>
                        </div>
                        <hr><br>
                        <div style="display: flex; justify-content: space-between;">
                            <div style="text-align: left;">
                                ${data[0].status_pembayaran == 'Pembayaran Sukses' ? '<button onclick="cetakStruk()" style="background-color: #4CAF50; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer;">Cetak Struk</button>' : ''}
                            </div>
                            <div style="text-align: right;">
                                <p>
                                ${data[0].status_pembayaran == 'Pembayaran Sukses' ? 
                                    '<h2 style="color:green">Lunas</h2>' : 
                                    (data[0].status_pemesanan == 'Batal' ? 
                                        '<h2 style="color:red">Dibatalkan</h2>' : 
                                        '<select class="form-select" id="inputGroupSelect01" style="text-align: center;width: 180px;height: 28px;font-size: 16px;">' +
                                            '<option value="Dalam Proses" selected>Belum Lunas</option>' +
                                            '<option value="Pembayaran Gagal">Pembayaran Gagal</option>' +
                                            '<option value="Pembayaran Sukses">Lunas</option>' +
                                            '<option value="Uang Kembali">Uang Kembali</option>' +
                                        '</select>'
                                    )
                                }
                                </p>
                            </div>
                        </div>
                        <br>
                    `
                });

            },
            error: function (error) {
                // Handle errors
                console.error('Error fetching data:', error);
            }
        });
    }

    //Pop up Detail Refund Customer
    function openDetailModalRefund(itemId) {
        $.ajax({
            url: '/finance/refund/detail/' + itemId,
            method: 'GET',
            success: function (data) {

                var tanggalPemesananDate = new Date(data[0].pemesanan.tanggal_pemesanan);
                var formattedTanggalPemesanan = ("0" + tanggalPemesananDate.getDate()).slice(-2) + "-" + ("0" + (tanggalPemesananDate.getMonth() + 1)).slice(-2) + "-" + tanggalPemesananDate.getFullYear();

                Swal.fire({
                    showConfirmButton: false,
                    width: '40%',
                    html: `
                        <div style="text-align: left;">
                            <h3 style="color: black;">Layanan ${data[0].pemesanan.pemesanan_detail[0].layanan.nama_layanan}</h3>
                            <p>Pesanan ${data[0].customers.nama}&nbsp;&nbsp;&nbsp;&nbsp;#${data[0].id}</p>

                            <br>
                            <p style="color: #469D89;">Harga Layanan ${data[0].pemesanan.pemesanan_detail[0].layanan.nama_layanan} : &nbsp; Rp. ${data[0].pemesanan.pemesanan_detail[0].layanan.harga}</p>
                            <p>Tanggal Pemesanan : &nbsp; ${formattedTanggalPemesanan}</p>
                            <p style="color:red"><strong>Pesananan Dibatalkan</strong></p>
                        </div>

                        <br>
                        <hr>
                        <br>

                        <div style="display: flex; justify-content: space-between;">
                            <div style="text-align: left;">
                                <p><strong>Customer 1</strong></p>
                                <p>Name:</p>
                                <p>Nama Customer:</p>
                                <p>Nama Terapis:</p>
                                <p>Harga:</p>
                                <p>Durasi:</p>
                                <p>Total Biaya layanan:</p>
                            </div>
                            <div style="text-align: right;">
                                <br>
                                <p>${data[0].pemesanan.nama_pemesan_1}</p>
                                <p>${data[0].pemesanan.terapis.nama}</p>
                                <p>${data[0].pemesanan.pemesanan_detail[0].layanan_extra1 ? data[0].pemesanan.pemesanan_detail[0].layanan_extra1.nama_layanan : '-'}</p>
                                <p>${data[0].pemesanan.pemesanan_detail[0].layanan_extra1 ? 'Rp. ' + data[0].pemesanan.pemesanan_detail[0].layanan_extra1.harga : '-'}</p>
                                <p>${data[0].pemesanan.pemesanan_detail[0].layanan_extra1 ? 
                                    data[0].pemesanan.pemesanan_detail[0].layanan.durasi + data[0].pemesanan.pemesanan_detail[0].layanan_extra1.durasi : 
                                    data[0].pemesanan.pemesanan_detail[0].layanan.durasi}
                                    Menit
                                </p>
                                <p>${data[0].pemesanan.pemesanan_detail[0].layanan_extra1 ? 
                                    'Rp. ' + (data[0].pemesanan.pemesanan_detail[0].layanan.harga + data[0].pemesanan.pemesanan_detail[0].layanan_extra1.harga) : 
                                    'Rp. ' + data[0].pemesanan.pemesanan_detail[0].layanan.harga}
                                </p>
                            </div>
                        </div>
                        <br>
                        <div style="display: flex; justify-content: space-between;">
                            <div style="text-align: left;">
                                <p><strong>Customer 2</strong></p>
                                <p>Nama Customer:</p>
                                <p>Nama Terapis:</p>
                                <p>Layanan Tambahan:</p>
                                <p>Harga:</p>
                                <p>Durasi:</p>
                                <p>Total Biaya layanan:</p>
                            </div>
                            <div style="text-align: right;">
                                <br>
                                <p>${data[0].pemesanan.nama_pemesan_2 ? data[0].pemesanan.nama_pemesan_2 : '-'}</p>
                                <p>${data[0].pemesanan.terapis_id_2 ? data[0].pemesanan.terapis2.nama : '-'}</p>
                                <p>${data[0].pemesanan.pemesanan_detail[0].layanan_extra2 ? data[0].pemesanan.pemesanan_detail[0].layanan_extra2.nama_layanan : '-'}</p>
                                <p>${data[0].pemesanan.pemesanan_detail[0].layanan_extra2 ? 'Rp. ' + data[0].pemesanan.pemesanan_detail[0].layanan_extra2.harga : '-'}</p>
                                <p>${data[0].pemesanan.pemesanan_detail[0].layanan_extra2 ? 
                                    data[0].pemesanan.pemesanan_detail[0].layanan.durasi + data[0].pemesanan.pemesanan_detail[0].layanan_extra2.durasi + ' Menit' : 
                                    (data[0].pemesanan.terapis_id_2 !== null ? data[0].pemesanan.pemesanan_detail[0].layanan.durasi + ' Menit' : '-')}
                                </p>
                                <p>${data[0].pemesanan.pemesanan_detail[0].layanan_extra2 ? 
                                    'Rp. ' + (data[0].pemesanan.pemesanan_detail[0].layanan.harga + data[0].pemesanan.pemesanan_detail[0].layanan_extra2.harga) : 
                                    (data[0].pemesanan.terapis_id_2 !== null ? 'Rp. ' + data[0].pemesanan.pemesanan_detail[0].layanan.harga : '-')}
                                </p>
                            </div>
                        </div>
                        <br>
                        <div style="display: flex; justify-content: space-between;">
                            <div style="text-align: left;">
                                <p><strong>Customer 3</strong></p>
                                <p>Nama Customer:</p>
                                <p>Nama Terapis:</p>
                                <p>Layanan Tambahan:</p>
                                <p>Harga:</p>
                                <p>Durasi:</p>
                                <p>Total Biaya layanan:</p>
                            </div>
                            <div style="text-align: right;">
                                <br>
                                <p>${data[0].pemesanan.nama_pemesan_3 ? data[0].pemesanan.nama_pemesan_3 : '-'}</p>
                                <p>${data[0].pemesanan.terapis_id_3 ? data[0].pemesanan.terapis3.nama : '-'}</p>
                                <p>${data[0].pemesanan.pemesanan_detail[0].layanan_extra3 ? data[0].pemesanan.pemesanan_detail[0].layanan_extra3.nama_layanan : '-'}</p>
                                <p>${data[0].pemesanan.pemesanan_detail[0].layanan_extra3 ? 'Rp. ' + data[0].pemesanan.pemesanan_detail[0].layanan_extra3.harga : '-'}</p>
                                <p>${data[0].pemesanan.pemesanan_detail[0].layanan_extra3 ? 
                                    data[0].pemesanan.pemesanan_detail[0].layanan.durasi + data[0].pemesanan.pemesanan_detail[0].layanan_extra3.durasi + ' Menit' : 
                                    (data[0].pemesanan.terapis_id_3 !== null ? data[0].pemesanan.pemesanan_detail[0].layanan.durasi + ' Menit' : '-')}
                                </p>
                                <p>${data[0].pemesanan.pemesanan_detail[0].layanan_extra2 ? 
                                    'Rp. ' + (data[0].pemesanan.pemesanan_detail[0].layanan.harga + data[0].pemesanan.pemesanan_detail[0].layanan_extra2.harga) : 
                                    (data[0].pemesanan.terapis_id_3 !== null ? 'Rp. ' + data[0].pemesanan.pemesanan_detail[0].layanan.harga : '-')}
                                </p>
                                <br>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                        <div style="text-align: left;">
                                <p>Metode : ${data[0].pemesanan.metode_pembayaran === 'Transfer Bank' ? 'Transfer' : 'Cash'}</p>
                            </div>
                            <div style="text-align: right;">
                                <p><strong>Grand Total Rp. 
                                    ${data[0].pemesanan.terapis_id_3 !== null ? 
                                        data[0].pemesanan.pemesanan_detail[0].layanan.harga * 3 + 
                                        (data[0].pemesanan.pemesanan_detail[0].layanan_extra1 ? data[0].pemesanan.pemesanan_detail[0].layanan_extra1.harga : 0) + 
                                        (data[0].pemesanan.pemesanan_detail[0].layanan_extra2 ? data[0].pemesanan.pemesanan_detail[0].layanan_extra2.harga : 0) + 
                                        (data[0].pemesanan.pemesanan_detail[0].layanan_extra3 ? data[0].pemesanan.pemesanan_detail[0].layanan_extra3.harga : 0) :
                                    (data[0].pemesanan.terapis_id_2 !== null ? 
                                        data[0].pemesanan.pemesanan_detail[0].layanan.harga * 2 + 
                                        (data[0].pemesanan.pemesanan_detail[0].layanan_extra1 ? data[0].pemesanan.pemesanan_detail[0].layanan_extra1.harga : 0) + 
                                        (data[0].pemesanan.pemesanan_detail[0].layanan_extra2 ? data[0].pemesanan.pemesanan_detail[0].layanan_extra2.harga : 0) :
                                    (data[0].pemesanan.pemesanan_detail[0].layanan_extra1 ? 
                                        data[0].pemesanan.pemesanan_detail[0].layanan_extra1.harga  + data[0].pemesanan.pemesanan_detail[0].layanan.harga : data[0].pemesanan.pemesanan_detail[0].layanan.harga))}
                                </strong></p>
                            </div>
                        </div>
                        <hr><br>
                        <div style="display: flex; justify-content: right;">
                            
                            <div style="text-align: right;">
                                <p>
                                ${data[0].status_refund == 'Selesai' ? 
                                    '<h2 style="color: green;">Refund Lunas</h2>' : 
                                    `<button onclick="refund(${data[0].id})" style="background-color: #4CAF50; color: white; padding: 15px 20px; font-size: 18px; border: none; border-radius: 5px; cursor: pointer;">Refund</button>`
                                }
                            </div>
                        </div>
                        <br>
                    `
                });

            },
            error: function (error) {
                // Handle errors
                console.error('Error fetching data:', error);
            }
        });
    }
</script>
    
@endsection
