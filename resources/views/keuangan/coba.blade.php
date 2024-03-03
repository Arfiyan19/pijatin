<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="{{ asset('finance/css/style.css') }}">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="sidebar close">
        <div class="logo-details">
            <img src="{{ asset('frontend/assets/image/logo-70.png') }}" alt="">
            <span class="logo_name">Finance</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="{{route('keuangan')}}">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Transaksi Customer</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="{{route('customer')}}">
                        <i class='bx bx-transfer'></i>
                        <span class="link_name">Transaksi Customer</span>
                    </a>
                    <i class=' bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="{{route('customer')}}">Transaksi Customer</a></li>
                    <li><a href="#">Daftar pembayaran Transfer</a></li>
                    <li><a href="#">daftar pembayaran Cash</a></li>
                    <li><a href="#">daftar pembayaran di cancel</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="{{route('terapis')}}">
                        <i class='bx bx-money'></i>
                        <span class="link_name">Transaksi Terapist</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="{{route('terapis')}}">Transaksi Terapist</a></li>
                    <li><a href="#">daftar nama member terapis</a></li>
                    <li><a href="#">Daftar transaksi cash terapis</a></li>
                </ul>
            </li>
            <li>
                <a href="{{route('transaksi')}}">
                    <i class='bx bx-dollar'></i>
                    <span class="link_name">Keseluruhan Transaksi</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="{{route('transaksi')}}">Keseluruhan Transaksi</a></li>
                </ul>
            </li>
            <li>
                <a href="{{route('cashback')}}">
                    <i class='bx bx-line-chart'></i>
                    <span class="link_name">Pengembalian Dana</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="{{route('cashback')}}">Pengembalian Dana</a></li>
                </ul>
            </li>
            <li>
                <a href="{{route('setting')}}">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Setting</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="{{route('setting')}}">Setting</a></li>
                </ul>
            </li>
            <li>
                <div class="profile-details">

                    <div class="name-job">
                        <i class='bx bx-log-in'></i>
                    </div>
                    <i class='bx bx-log-out'></i>
                </div>
            </li>
        </ul>
    </div>
    <section class="home-section">
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
                        <img src="{{'finance/imgs/customer01.jpg'}}" alt="">
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar">
            <div class="btn-nav">
                <button><a href="">Menunggu</a></button>
                <button><a href="">Sukses</a></button>
            </div>
            <span class="target"></span>
            <div class="search">
                <label>
                    <input type="text" placeholder="Search here">
                    <ion-icon name="search-outline"></ion-icon>
                </label>
            </div>
        </nav>

        <div class="details">
            <div class="recentOrders">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Select</td>
                            <td>ID Pesanan</td>
                            <td>Nomor Id</td>
                            <td>Nama Terapist</td>
                            <td>No Rekening</td>
                            <td>E-mail</td>
                            <td>No Telepon</td>
                            <td>Status</td>
                            <td>Detail</td>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                            <td>UD98770</td>
                            <td>UD98770</td>
                            <td>Siti Rohani</td>
                            <td>118291002818</td>
                            <td>Siti Rohani13@gmail.com</td>
                            <td>0882 7656 68459</td>
                            <td><span class="status inProgress">Menunggu</span></td>
                            <td><a href="{{route('detailterapis')}}">detail</a></td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                            <td>UD98770</td>
                            <td>UD98770</td>
                            <td>Siti Rohani</td>
                            <td>118291002818</td>
                            <td>Siti Rohani13@gmail.com</td>
                            <td>0882 7656 68459</td>
                            <td><span class="status inProgress">Menunggu</span></td>
                            <td><a href="">detail</a></td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                            <td>UD98770</td>
                            <td>UD98770</td>
                            <td>Siti Rohani</td>
                            <td>118291002818</td>
                            <td>Siti Rohani13@gmail.com</td>
                            <td>0882 7656 68459</td>
                            <td><span class="status inProgress">Menunggu</span></td>
                            <td><a href="">detail</a></td>
                        </tr>

                        <tr>
                            <td>4</td>
                            <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                            <td>UD98770</td>
                            <td>UD98770</td>
                            <td>Siti Rohani</td>
                            <td>118291002818</td>
                            <td>Siti Rohani13@gmail.com</td>
                            <td>0882 7656 68459</td>
                            <td><span class="status inProgress">Menunggu</span></td>
                            <td><a href="">detail</a></td>
                        </tr>

                        <tr>
                            <td>5</td>
                            <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                            <td>UD98770</td>
                            <td>UD98770</td>
                            <td>Siti Rohani</td>
                            <td>118291002818</td>
                            <td>Siti Rohani13@gmail.com</td>
                            <td>0882 7656 68459</td>
                            <td><span class="status inProgress">Menunggu</span></td>
                            <td><a href="">detail</a></td>
                        </tr>

                        <tr>
                            <td>6</td>
                            <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                            <td>UD98770</td>
                            <td>UD98770</td>
                            <td>Siti Rohani</td>
                            <td>118291002818</td>
                            <td>Siti Rohani13@gmail.com</td>
                            <td>0882 7656 68459</td>
                            <td><span class="status inProgress">Menunggu</span></td>
                            <td><a href="">detail</a></td>
                        </tr>

                        <tr>
                            <td>7</td>
                            <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                            <td>UD98770</td>
                            <td>UD98770</td>
                            <td>Siti Rohani</td>
                            <td>118291002818</td>
                            <td>Siti Rohani13@gmail.com</td>
                            <td>0882 7656 68459</td>
                            <td><span class="status inProgress">Menunggu</span></td>
                            <td><a href="">detail</a></td>
                        </tr>

                        <tr>
                            <td>8</td>
                            <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                            <td>UD98770</td>
                            <td>UD98770</td>
                            <td>Siti Rohani</td>
                            <td>118291002818</td>
                            <td>Siti Rohani13@gmail.com</td>
                            <td>0882 7656 68459</td>
                            <td><span class="status inProgress">Menunggu</span></td>
                            <td><a href="">detail</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>
        <div class="footer">
            <div class="pagination">
                <ion-icon name="caret-back"></ion-icon>
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <ion-icon name="caret-forward"></ion-icon>
            </div>
            <div class="btn-simpan">
                <a href="{{route('customer')}}"><button class="btn btn-primary">Simpan</button></a>
            </div>
        </div>
    </section>
    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>
</body>

</html>