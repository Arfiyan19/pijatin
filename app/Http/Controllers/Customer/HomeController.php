<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\User;

class HomeController extends Controller
{
    //index
    public function index()
    {
        $layanan_utama = Layanan::where('jenis_layanan', 'layanan_utama')->get();
        $user = auth()->user();
        // dd($layanan_utama);
        return view('customer.newhome', compact('user', 'layanan_utama'));
    }
    // riwayat
    public function riwayat()
    {
        return view('customer.riwayat');
    }
    
    public function notifikasi()
    {
        return view('customer.notif');
    }
    public function profile()
    {
        return view('customer.profile');
    }
    public function cashback()
    {
        return view('customer.cashback');
    }


    public function formProfileAddFoto()
    {
        return view('customer.addfoto');
    }
    public function detaillayanan()
    {
        return view('customer.detaillayanan');
    }
}
