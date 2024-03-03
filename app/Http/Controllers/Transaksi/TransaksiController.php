<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Layanan;

class TransaksiController extends Controller
{
    public function index()
    {
        $layanan_utama = Layanan::where('jenis_layanan', 'layanan_utama')->get();
        $layanan_tambahan = Layanan::where('jenis_layanan', 'layanan_tambahan')->get();

        return view('layout_test.transaksi.index', compact('layanan_utama', 'layanan_tambahan'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

}
