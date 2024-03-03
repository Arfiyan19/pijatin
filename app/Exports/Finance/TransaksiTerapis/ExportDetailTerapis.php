<?php

namespace App\Exports\Finance\TransaksiTerapis;

use App\Models\Pemesanan;
use App\Models\Terapis;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportDetailTerapis implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data = Terapis::with('user.alamat')
            ->where('id', $id)
            ->get();
            // return response()->json($data);

        $layanan = Pemesanan::with('customers','pemesanan_detail.layanan', 'pemesanan_detail.layananExtra')
            ->where(function ($query) use ($id) {
                $query->where('terapis_id_1', $id)
                    ->orWhere('terapis_id_2', $id)
                    ->orWhere('terapis_id_3', $id);
            })
            ->get();
            // return response()->json($layanan);

            $totalLayanan = count($layanan);
            $totalLayananDibatalkan = count($layanan->filter(function ($item) {
                return trim(strtolower($item->status_pemesanan)) === 'batal';
            }));     
        return view('keuangan.terapis.table', ['data' => $data]);
    }

}
