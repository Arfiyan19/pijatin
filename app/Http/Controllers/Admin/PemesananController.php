<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    public function indexAdmin()
    {
        // cari kota admin saat ini
        $kotaUser = DB::table('table_alamat')->where('user_id', auth()->user()->id)->first();

        $data = DB::table('pemesanan')
                ->select('pemesanan.*', 'layanan.*', 'customers.*', 'table_alamat.*')
                ->join('pemesanan_detail', 'pemesanan.id', '=', 'pemesanan_detail.pemesanan_id')
                ->join('layanan', 'pemesanan_detail.layanan_id', '=', 'layanan.id')
                ->join('customers', 'pemesanan.customer_id', '=', 'customers.id')
                ->join('users', 'customers.user_id', '=', 'users.id')
                ->leftJoin('table_alamat', 'users.id', '=', 'table_alamat.user_id')
                ->where('layanan.jenis_layanan', 'layanan_utama')
                ->where('table_alamat.kota', 'LIKE', '%' . $kotaUser->kota . '%') // Menambahkan filter berdasarkan kotaUser
                ->get();

         return view('backend.orders.index', compact('data'));
    }

    public function indexSuperAdmin()
    {
        $data = DB::table('pemesanan')
                ->select('pemesanan.*', 'layanan.*', 'customers.*', 'table_alamat.*')
                ->join('pemesanan_detail', 'pemesanan.id', '=', 'pemesanan_detail.pemesanan_id')
                ->join('layanan', 'pemesanan_detail.layanan_id', '=', 'layanan.id')
                ->join('customers', 'pemesanan.customer_id', '=', 'customers.id')
                ->join('users', 'customers.user_id', '=', 'users.id')
                ->leftJoin('table_alamat', 'users.id', '=', 'table_alamat.user_id')
                ->where('layanan.jenis_layanan', 'layanan_utama')
                ->get();
                
         return view('backend.orders.index', compact('data'));
    }
}
