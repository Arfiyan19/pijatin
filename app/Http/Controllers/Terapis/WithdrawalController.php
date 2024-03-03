<?php

namespace App\Http\Controllers\Terapis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Saldo;
use App\Models\Withdrawal;

class WithdrawalController extends Controller
{
        public function index()
    {
        $saldo = Saldo::where('id', 1)->first();
        return view('layout_test.withdrawel', compact('saldo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nominal' => 'required|numeric|min:10000',
        ]);

        // beri kondisi jika saldo kurang dari maka tidak bisa melakukan penarikan
        $saldo = Saldo::where('id', 1)->first();
        if ($saldo->saldo < $request->nominal) {
            return redirect()->route('wede')->with('error', 'Saldo anda tidak cukup');
        }

        $deposit = Withdrawal::create([
            'terapis_id' => 1,
            'jumlah' => $request->nominal,
            'tanggal' => now(),
            'bank_accounts_id' => 1,
        ]);

        return redirect()->route('wede')->with('success', 'Penarikan berhasil');
    }
}
