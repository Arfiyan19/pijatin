<?php

namespace App\Exports\Finance\TransaksiCustomer;

use App\Models\Pemesanan;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportCustomerCancel implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data = Pemesanan::with('customers', 'pemesanan_detail.layanan')
            ->where('status_pemesanan', 'Batal')
            ->get();
        return view('keuangan.customer.tableCustomer', ['data' => $data]);
    }

}
