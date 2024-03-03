<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\BankAccount;
use App\Models\Withdrawal;
use App\Models\Deposit;
use App\Models\Saldo;
use App\Models\Refund;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $deposit = Deposit::where('status', 'success')->get();
        $refund = Refund::where('status_refund', 'Selesai')->get();
        $pesanan = Pemesanan::where('status_pembayaran', 'Pembayaran Sukses')->get();
        $withdrawal = Withdrawal::where('status', 'success')->get();

        // menggabungkan menjadi 1 data dari beberapa models
        $data = $deposit->concat($refund)->concat($pesanan);

        // Sort data dengan tanggal
        $sortedData = $data->sortByDesc(function ($item) {
            return isset($item->tanggal_pemesanan) ? $item->tanggal_pemesanan : $item->tanggal;
        });

        // return response()->json($sortedData);
        return view('keuangan.transaksi.index' ,compact('sortedData'));
    }

    public function depositDetail($id)
    {
        $data =Deposit::with('terapis')
            ->where('id', $id)
            ->get();
        return response()->json($data);
    }
}
