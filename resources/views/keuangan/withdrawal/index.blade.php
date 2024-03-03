@extends('keuangan.layouts.master')
@section('content')
    <div class="topbar">

        <div class="toggle">
            <i class='bx bx-menu'></i>
            <div class="col">
                <p>Penarikan Saldo</p>
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
            <button><a href="">Dikonfirmasi</a></button>
            <button><a href="">Menunggu</a></button>
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
            @include('keuangan.withdrawal.table')
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

@if(session()->has('error'))
    <script>
        console.log("Gagal");

        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Saldo Tidak Mencukupi!",
        });
    </script>
@endif

@if(session()->has('success'))
    <script>
        Swal.fire({
            icon: "success",
            text: "Penarikan Saldo Berhasil!",
        });
    </script>
@endif

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
                window.location.href = "{{ route('export.withdrawal') }}";
            }
        });
        return false;
    }

    function konfirmasiWithdrawal(id) {
        console.log("Withdrawal ID:", id);

        Swal.fire({
            icon: "info",
            html: '<br>Ini akan mengubah status<br>Menjadi Konfirmasi',
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/finance/withdrawal/konfirmasi/' + id;
            }
        });
    }

    function openDetailModal(itemId) {
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
                                <p>Rp. ${data[0].terapis_id}</p>
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
                                    `<button onclick="konfirmasiWithdrawal(${data[0].id})" style="background-color: #4CAF50; color: white; padding: 15px 20px; font-size: 18px; border: none; border-radius: 5px; cursor: pointer;">Konfirmasi</button>`
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

    // Set the content of the new windowx
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
