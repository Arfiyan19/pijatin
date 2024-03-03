<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Layanan;

class LayananController extends Controller
{
    public function index()
    {
        $layanan_utama = Layanan::where('jenis_layanan', 'layanan_utama')->get();
        return view('customer.layanan.index');
    }
}
