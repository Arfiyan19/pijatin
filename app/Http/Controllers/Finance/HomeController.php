<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\DetailPemesanan;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = User::with('finance')->where('id', auth()->user()->id)->first();
        // dd($data);
        return view('keuangan.index', compact('data'));
    }
    
    public function pieChart()
    {
        $dataFromDatabase = DetailPemesanan::with('layanan')
            ->select('layanan_id', \DB::raw('count(*) as count'))
            ->groupBy('layanan_id')
            ->get();

        $result = $dataFromDatabase->map(function ($item) {
            return [
                'layanan_id' => $item->layanan_id,
                'nama_layanan' => $item->layanan->nama_layanan,
                'count' => $item->count,
            ];
        });

        $labels = $result->pluck('nama_layanan')->toArray();
        $values = $result->pluck('count')->toArray();

        $data = [
            'labels' => $labels,
            'data' => $values,
        ];

        return response()->json($data);
    }

    public function lineChart()
    {
        // Initialize arrays for counts in each month
        $pesananSelesai = array_fill(1, 12, 0);
        $pesananDibatalkan = array_fill(1, 12, 0);

        // Get counts for completed orders
        $completedOrders = Pemesanan::where('status_pemesanan', 'Sukses')
            ->selectRaw('COUNT(*) as count, MONTH(updated_at) as month')
            ->groupBy(DB::raw('MONTH(updated_at)'))
            ->pluck('count', 'month')
            ->toArray();

        // Update counts for completed orders
        foreach ($completedOrders as $month => $count) {
            $pesananSelesai[$month] = $count;
        }

        // Get counts for canceled orders
        $canceledOrders = Pemesanan::where('status_pemesanan', 'Batal')
            ->selectRaw('COUNT(*) as count, MONTH(updated_at) as month')
            ->groupBy(DB::raw('MONTH(updated_at)'))
            ->pluck('count', 'month')
            ->toArray();

        // Update counts for canceled orders
        foreach ($canceledOrders as $month => $count) {
            $pesananDibatalkan[$month] = $count;
        }

        return response()->json([
            'pesanan_selesai' => array_values($pesananSelesai),
            'pesanan_dibatalkan' => array_values($pesananDibatalkan),
        ]);
    }

    public function mixedChart()
    {
        $jumlahBooking = array_fill(1, 12, 0);
        $pemasukan = array_fill(1, 12, 0);
        $pengeluaran = array_fill(1, 12, 0);

        $ordersCount = Pemesanan::whereIn('status_pemesanan', ['Sukses', 'Masuk', 'Batal'])
        ->selectRaw('COUNT(*) as count, MONTH(updated_at) as month')
        ->groupBy(DB::raw('MONTH(updated_at)'))
        ->pluck('count', 'month')
        ->toArray();

        foreach ($ordersCount as $month => $count) {
        $jumlahbooking[$month] = $count;
        }

        return response()->json([
            'jumlah_booking' => array_values($jumlahbooking)
        ]);

    }
}
