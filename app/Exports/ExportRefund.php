<?php

namespace App\Exports;

use App\Models\Refund;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportRefund implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data = Refund::with('customers')
            // ->where('status_refund', 'Menunggu')
            // ->where('status_refund', 'Selesai')
            ->get();
        return view('keuangan.refund.tableRefund', ['data' => $data]);
    }
}
