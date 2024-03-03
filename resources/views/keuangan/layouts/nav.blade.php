    <div class="sidebar close">
        <div class="logo-details">
            <img src="{{ asset('frontend/assets/image/logo-70.png') }}" alt="">
            <span class="logo_name">Finance</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href=" {{ url('/finance/dashboard') }} ">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Dashboard</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="{{ route('transfer') }}">
                        <i class='bx bx-transfer'></i>
                        <span class="link_name">Transaksi Customer</span>
                    </a>
                    <i class=' bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a href="{{ route('transfer') }}">Daftar pembayaran transfer</a></li>
                    <li><a href="{{ route('cash') }}">Daftar pembayaran cash</a></li>
                    <li><a href="{{ route('cancel') }}">Daftar pembayaran dibatalkan</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="{{ route('nama') }}">
                        <i class='bx bx-money'></i>
                        <span class="link_name">Transaksi Terapist</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a href="{{ route('nama') }}">Daftar member terapis</a></li>
                    <li><a href="{{ route('terapis') }}">Daftar transaksi Terapist</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('transaksi') }}">
                    <i class='bx bx-dollar'></i>
                    <span class="link_name">Keseluruhan Transaksi</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="{{ route('transaksi') }}">Keseluruhan Transaksi</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('refund') }}">
                    <i class='bx bx-line-chart'></i>
                    <span class="link_name">Pengembalian Dana</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="{{ route('refund') }}">Pengembalian Dana</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('withdrawal') }}">
                    <i class='bx bx-wallet'></i>
                    <span class="link_name">Penarikan Saldo</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="{{ route('withdrawal') }}">Penarikan Saldo</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('setting') }}">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Setting</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="{{ route('setting') }}">Setting</a></li>
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
