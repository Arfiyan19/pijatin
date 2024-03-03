<?php

namespace App\Exports;

use App\Models\Withdrawal;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportWithdrawal implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data = Withdrawal::with('terapis.Alamat')
            ->get();
        return view('keuangan.withdrawal.table', ['data' => $data]);
    }
}
