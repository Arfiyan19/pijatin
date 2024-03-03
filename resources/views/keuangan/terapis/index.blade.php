@extends('keuangan.layouts.master')
@section('content')
    <div class="topbar">

        <div class="toggle">
            <i class='bx bx-menu'></i>
            <div class="col">
                <p>Transaksi Terapist</p>
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
    
    <nav style="margin: 80px 20px 0;">
        <div style="display: flex; justify-content: space-between;">
            <div class="btn-nav">
                <button><a href="">Cair</a></button>
                <button><a href="">Belum Cair</a></button>
            </div>
            <div style="display: flex; flex-direction: column; align-items: flex-end;">
                <div style="width: 200%; position: relative;">
                    <form action="{{ route('finance.terapis-transaksi.search') }}" method="GET">
                        @csrf
                        <input type="hidden" name="view_name" value="transaksi">
                        <input type="text" name="query" placeholder="Search here.." style="width: 100%; padding: 8px; border: 1px solid #000;">
                    </form>
                </div>
            </div>
            </div>
        </div>
    </nav>

    <div class="details">
        <div class="recentOrders">
            @include('keuangan.terapis.table')
        </div>


    </div>
    <div style="display: flex; justify-content: center; align-items: center; margin-bottom: 50px">
        <div class="btn-unduh">
            <a href="" onclick="return confirmDownload();">
                <i class='bx bx-download'></i>
                <p>Unduh File</p>
            </a>
        </div>
        <div style="border: 1px solid gray; margin: auto; border-radius: 10px;">
        @if(isset($keyword))
            {{ $data->appends(['query' => $keyword, 'view_name' => $viewName])->links() }}
        @else
            {{ $data->links() }}
        @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
    //Pop up Detail Deposit
    function openDetailModalDeposit(itemId) {
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

    //Pop up Detail Withdrawal
    function openDetailModalWithdrawal(itemId) {
        $.ajax({
            url: '/finance/withdrawal/detail/' + itemId,
            method: 'GET',
            success: function (data) {
                Swal.fire({
                    showConfirmButton: false,
                    width: '40%',
                    html: `
                        <div style="text-align: left;">
                            <h3>Penarikan Saldo E-Wallet</h3>
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
                                <p>Saldo E-Wallet:</p>
                                <p>Nominal Penarikan Saldo:</p>
                                <p>Metode:</p>
                            </div>
                            <div style="text-align: right;">
                                <p>${data[0].terapis.nama}</p>
                                <p>${data[0].terapis_id}</p>
                                <p>Rp. ${data[0].terapis.saldo.saldo}</p>
                                <p>Rp. ${data[0].jumlah}</p>
                                <p></p>
                            </div>
                        </div>
                        <br>
                        <hr><br>
                        <div style="display: flex; justify-content: center;">
                            
                            <div style="text-align: right;">
                                <p>
                                ${data[0].status == 'success' ? 
                                    '<h2 style="color: green;">Dikonfirmasi</h2>' : 
                                    '<h2 style="color: red;"> Belum Dikonfirmasi</h2>'
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

    //Pop up Detail Layanan
    function openDetailModalPemesanan(itemId, terapisId) {
        console.log('terapisId:', terapisId);

        $.ajax({
            url: '/finance/customer/detail/' + itemId,
            method: 'GET',
            data: {terapis_id: terapisId},
            success: function (data) {
                console.log(data);
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
                        ${terapisId === data[0].terapis_id_1 ? `
                            <div style="display: flex; justify-content: space-between;">
                                <div style="text-align: left;">
                                    <p><strong>Customer 1</strong></p>
                                    <p>Nama Customer:</p>
                                    <p>Nama Terapis:</p>
                                    <p>Layanan Tambahan:</p>
                                    <p>Harga:</p>
                                    <p>Durasi:</p>
                                    <p>Total Biaya layanan:</p>
                                    <p>Potongan Biaya Bagi Hasil:</p>
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
                                    <p>15%</p>
                                </div>
                            </div>
                        ` : terapisId === data[0].terapis_id_2 ? `
                            <div style="display: flex; justify-content: space-between;">
                                <div style="text-align: left;">
                                    <p><strong>Customer 2</strong></p>
                                    <p>Nama Customer:</p>
                                    <p>Nama Terapis:</p>
                                    <p>Layanan Tambahan:</p>
                                    <p>Harga:</p>
                                    <p>Durasi:</p>
                                    <p>Total Biaya layanan:</p>
                                    <p>Potongan Biaya Bagi Hasil:</p>
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
                                    <p>15%</p>
                                </div>
                            </div>
                            ` : `
                            <div style="display: flex; justify-content: space-between;">
                                <div style="text-align: left;">
                                    <p><strong>Customer 3</strong></p>
                                    <p>Nama Customer:</p>
                                    <p>Nama Terapis:</p>
                                    <p>Layanan Tambahan:</p>
                                    <p>Harga:</p>
                                    <p>Durasi:</p>
                                    <p>Total Biaya layanan:</p>
                                    <p>Potongan Biaya Bagi Hasil:</p>
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
                                    <p>15%</p>
                                    <br>
                                </div>
                            </div>
                            `}
                        <br>
                        <div style="display: flex; justify-content: space-between;">
                            <div style="text-align: left;">
                                <p>Metode : ${data[0].metode_pembayaran === 'Transfer Bank' ? 'Transfer' : 'Cash'}</p>
                                ${data[0].metode_pembayaran === 'Transfer Bank' ? '<p>Bank : </p>' : ''}
                            </div>
                            <div style="text-align: right;">
                                ${data[0].metode_pembayaran === 'Transfer Bank' ? '<br>' : ''}
                                <p><strong>Total Tagihan Rp. 
                                    ${data[0].terapis_id_3 === terapisId ? 
                                        (data[0].pemesanan_detail[0].layanan_extra3 ? 
                                            'Rp. ' + (data[0].pemesanan_detail[0].layanan.harga + data[0].pemesanan_detail[0].layanan_extra3.harga - (data[0].pemesanan_detail[0].layanan.harga + data[0].pemesanan_detail[0].layanan_extra3.harga) * 0.15) :
                                            'Rp. ' + (data[0].pemesanan_detail[0].layanan.harga - (data[0].pemesanan_detail[0].layanan.harga * 0.15))
                                        ) : data[0].terapis_id_2 === terapisId ? 
                                        (data[0].pemesanan_detail[0].layanan_extra2 ? 
                                            'Rp. ' + (data[0].pemesanan_detail[0].layanan.harga + data[0].pemesanan_detail[0].layanan_extra2.harga - (data[0].pemesanan_detail[0].layanan.harga + data[0].pemesanan_detail[0].layanan_extra2.harga) * 0.15) :
                                            'Rp. ' + (data[0].pemesanan_detail[0].layanan.harga - (data[0].pemesanan_detail[0].layanan.harga * 0.15))
                                        ) : data[0].terapis_id_1 === terapisId ? 
                                        (data[0].pemesanan_detail[0].layanan_extra1 ? 
                                            'Rp. ' + (data[0].pemesanan_detail[0].layanan.harga + data[0].pemesanan_detail[0].layanan_extra1.harga - (data[0].pemesanan_detail[0].layanan.harga + data[0].pemesanan_detail[0].layanan_extra1.harga) * 0.15) :
                                            'Rp. ' + (data[0].pemesanan_detail[0].layanan.harga - (data[0].pemesanan_detail[0].layanan.harga * 0.15))
                                        ) : 'data tidak ditemukan'}
                                </strong></p>
                            </div>
                        </div>
                        <hr><br>
                        <div style="display: flex; justify-content: end;">
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
    </script>
@endsection
