@extends('keuangan.layouts.master')
@section('content')
    <div class="topbar">

        <div class="toggle">
            <i class='bx bx-menu'></i>
            <div class="col">
                <p>Pengembalian Dana</p>
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

    <nav class="navbar">
        <div class="btn-nav">
            <button><a href="">Menunggu</a></button>
            <button><a href="">Selesai</a></button>
        </div>
        <span class="target"></span>
        <div class="search">
            <label>
                <input type="text" placeholder="Search here">
                <i class=' bx bx-search'></i>
            </label>
        </div>
    </nav>

    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            @include('keuangan.refund.tableRefund', $data)
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
                window.location.href = "{{ route('export.refund') }}";
            }
        });
        return false;
    }

    function refund(id) {
        console.log("Refunding ID:", id);

        Swal.fire({
            icon: "info",
            html: '<br>Ini akan mengubah status<br>Menjadi Lunas',
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: "success",
                    title: "Transfer Sukses!",
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = '/finance/refund/konfirmasi/' + id;
                });
            } else {
                // User clicked "Cancel" or closed the modal
                // You can add additional handling or leave it empty
            }
        });

    }

    function openDetailModal(itemId) {
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
                            <h3>Layanan ${data[0].pemesanan.pemesanan_detail[0].layanan.nama_layanan}</h3>
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
    function cetakStruk() {
    // Create a new window for printing
    var printWindow = window.open('', '_blank');

    // Define the content you want to print
    var printContent = `
        <!-- Your HTML content for the receipt -->
        <div style="text-align: left;">
            <!-- ... (rest of your HTML content) ... -->
        </div>
    `;

    // Set the content of the new window
    printWindow.document.write(printContent);

    // Print the content
    printWindow.document.close(); // Close the document opened with document.write
    printWindow.print();

    // Close the new window after printing
    printWindow.onafterprint = function () {
        printWindow.close();
    };
}
</script>
@endsection