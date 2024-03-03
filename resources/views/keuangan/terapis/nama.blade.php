@extends('keuangan.layouts.master')
@section('content')
    <div class="topbar">

        <div class="toggle">
            <i class='bx bx-menu'></i>
            <div class="col">
                <p>Daftar nama member terapis</p>
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

    <nav class="navbar-tf">
        <div class="search">
            <label>
                <form action="" method="POST">
                @csrf
                    <input type="hidden" name="view_name" value="member">
                    <input type="text" name="query" placeholder="Search here">
                    <!-- <i class='bx bx-search'></i> -->
                </form>
            </label>
        </div>
    </nav>

    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            @include('keuangan.terapis.table')
        </div>


    </div>
    <div class="footer">
        <div class="btn-unduh">
            <a href="{{ route('export.member.terapis') }}"><i class='bx bx-download'></i>
                <p>Unduh File</p>
            </a>
        </div>
        <div class="pagination-tf">
            <i class='bx bxs-left-arrow'></i>
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <i class='bx bxs-right-arrow'></i>
        </div>
    </div>
@endsection
