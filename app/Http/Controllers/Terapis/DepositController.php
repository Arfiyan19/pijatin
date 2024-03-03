<?php

namespace App\Http\Controllers\Terapis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\Saldo;

class DepositController extends Controller
{
    public function index()
    {
        // where saldo id = 1
        $saldo = Saldo::where('id', 1)->first();
        return view('layout_test.deposit', compact('saldo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nominal' => 'required|numeric|min:10000',
        ]);

        $deposit = Deposit::create([
            'terapis_id' => 1,
            'jumlah' => $request->nominal,
            'tanggal' => now(),
        ]);

        return redirect()->route('depo')->with('success', 'Deposit berhasil ditambahkan');
    }

}
