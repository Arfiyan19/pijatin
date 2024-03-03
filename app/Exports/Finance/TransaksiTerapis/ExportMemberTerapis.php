<?php

namespace App\Exports\Finance\TransaksiTerapis;

use App\Models\Pemesanan;
use App\Models\Terapis;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportMemberTerapis implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data = Terapis::with('alamat')
        ->get();
        return view('keuangan.terapis.table', ['data' => $data]);
    }

}
