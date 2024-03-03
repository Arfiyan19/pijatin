<?php

namespace App\Exports\Finance\TransaksiTerapis;

use App\Models\Pemesanan;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportTerapis implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data = Pemesanan::with('pemesanan_detail', 'terapis.user.bankAccount')
            ->where(function ($query) {
                $query->where('status_pembayaran', 'Dalam Proses')
                ->orWhere('status_pembayaran', 'Pembayaran Sukses');
            })
        ->get();
        return view('keuangan.terapis.table', ['data' => $data]);
    }

}
