<?php

namespace App\Http\Controllers\Terapis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = auth()->user()->terapis;
        return view('terapis.beranda-final', compact('data'));
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
        return view('terapis.riwayat-dijadwalkan');
    }
}
