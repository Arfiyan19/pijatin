<?php

namespace App\Http\Controllers\Terapis;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $data = auth()->user()->terapis;
        $pemesanan = Pemesanan::where('terapis_id_1', $data->id)->where('status_pemesanan', 'Sukses')->get();
        //count $pemesanan->total_bayar
        $total = 0;
        foreach ($pemesanan as $key => $value) {
            $total += $value->total_bayar;
        }
        // dd($total);
        return view('terapis.beranda-final', compact('data', 'total'));
    }
    public function loginIndex()
    {
        return view('customer.auth.login');
    }
    // updateStatus
    public function updateStatus(Request $request)
    {
        $data = auth()->user()->terapis;
        $data->status = $request->status;
        $data->save();
        return response()->json([
            'success' => 'Status berhasil diubah',
            'data' => $data
        ]);
    }

    public function riwayat()
    {
        return view('terapis.riwayat');
    }
    //riwayat dijadwalkan
    public function riwayatDijadwalkan()
    {
        return view('terapis.riwayat-dijadwalkan');
    }
}
