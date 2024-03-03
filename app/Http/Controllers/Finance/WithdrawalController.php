<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Withdrawal;
use App\Models\Saldo;
use App\Exports\ExportWithdrawal;
use Maatwebsite\Excel\Facades\Excel;


class WithdrawalController extends Controller
{
    public function index()
    {
        $data = Withdrawal::with('terapis.Alamat')
            // ->where('status', 'pending')
            ->get();
        // return response()->json($data);
        return view('keuangan.withdrawal.index', compact('data'));
    }

    public function withdrawalDetail($id)
    {
        $data = Withdrawal::with('terapis.saldo')
            ->where('id', $id)
            ->get();
        return response()->json($data);
    }

    public function withdrawalKonfirmasi($id)
    {
        $withdrawals = Withdrawal::where('id', $id)->get();

        foreach ($withdrawals as $withdrawal) {
            $saldo = Saldo::where('terapis_id', $withdrawal->terapis_id)->first();

            if (!$saldo) {
                return response()->json(['error' => 'Saldo not found'], 404);
            }

            if ($saldo->saldo - $withdrawal->jumlah < 0) {
                return redirect('/finance/withdrawal')->with('error', 'Insufficient balance');
            }

            $saldo->saldo -= $withdrawal->jumlah;
            $withdrawal->status = 'success';
            $withdrawal->save();
            $saldo->save();
        }

        return redirect('/finance/withdrawal')->with('success', 'Refund status updated successfully');
    }

    function export_withdrawal_excel(){
        return Excel::download(new ExportWithdrawal, "penarikanSaldo.xlsx");
    }
}
