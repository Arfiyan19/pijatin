<?php

namespace App\Exports\Finance\TransaksiCustomer;

use App\Models\Pemesanan;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportCustomer implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data = Pemesanan::with('customers', 'pemesanan_detail.layanan')
            ->where(function ($query) {
                $query->where('status_pembayaran', 'Dalam Proses')
                    ->orWhere('status_pembayaran', 'Pembayaran Sukses');
            })
            ->get();
        return view('keuangan.customer.tableCustomer', ['data' => $data]);
    }

}
