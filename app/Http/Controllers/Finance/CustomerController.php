<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\User;
use App\Exports\Finance\TransaksiCustomer\ExportCustomer;
use App\Exports\Finance\TransaksiCustomer\ExportCustomerCash;
use App\Exports\Finance\TransaksiCustomer\ExportCustomerTransfer;
use App\Exports\Finance\TransaksiCustomer\ExportCustomerCancel;
use Maatwebsite\Excel\Facades\Excel;



class CustomerController extends Controller
{
    public function indexTransfer()
    {
        $data = Pemesanan::with('customers', 'pemesanan_detail.layanan')
        ->where(function ($query) {
            $query->where('status_pembayaran', 'Dalam Proses')
            ->orWhere('status_pembayaran', 'Pembayaran Sukses');
        })
        ->where('metode_pembayaran', 'Transfer Bank')
            // ->get();
            ->Paginate(12);
            // return response()->json($data);
        return view('keuangan.customer.transfer', compact('data'));
    }

    public function indexCash()
    {
        $data = Pemesanan::with('customers', 'pemesanan_detail.layanan')
        ->where(function ($query) {
            $query->where('status_pembayaran', 'Dalam Proses')
            ->orWhere('status_pembayaran', 'Pembayaran Sukses');
        })
        ->where('metode_pembayaran', 'Cash')
            // ->get();
            ->Paginate(12);
            // return response()->json($data);
        return view('keuangan.customer.cash', compact('data'));
    }

    public function cancel()
    {
        $data = Pemesanan::with('customers', 'pemesanan_detail.layanan')
            ->where('status_pemesanan', 'Batal')
            // ->get();
            ->Paginate(12);
        return view('keuangan.customer.cancel', compact('data'));
    }

    public function detail($id)
    {
        $data = Pemesanan::with(
            'jadwal', 
            'customers', 
            'terapis', 
            'terapis2', 
            'terapis3', 
            'pemesanan_detail.layanan', 
            'pemesanan_detail.layananExtra1',
            'pemesanan_detail.layananExtra2',
            'pemesanan_detail.layananExtra3'
            )
            ->where('id', $id)
            ->get();
        return response()->json($data);
        // return view('keuangan.customer.detail', compact('data'));
    }
    
    public function updateDetail(Request $request)
    {
        $data = Pemesanan::where('id', $request->id)->first();
        // return json_encode($data);
        if (!$data) {
            return response()->json(['message' => 'Pemesanan not found'], 404);
        }
        $data->status_pembayaran = $request->status;
        $data->save();
        return response()->json([
            'data' => $data,
            'message' => 'Status updated successfully'
        ], 200);
    }

    function transaksiCustomer(){
        return Excel::download(new ExportCustomer, "TransaksiCustomer.xlsx");
    }
    function transaksiCustomerCash(){
        return Excel::download(new ExportCustomerCash, "TransaksiCustomerCash.xlsx");
    }
    function transaksiCustomerTransfer(){
        return Excel::download(new ExportCustomerTransfer, "TransaksiCustomerTransfer.xlsx");
    }
    function transaksiCustomerCancel(){
        return Excel::download(new ExportCustomerCancel, "TransaksiCustomerDibatalkan.xlsx");
    }
    
    
    public function search(Request $request)
    {
        $viewName = $request->input('view_name');
        $keyword = $request->input('query');

        // var_dump($keyword);
        // var_dump($viewName);

        switch ($viewName) {
            case "transfer":
                $data = Pemesanan::with('customers', 'pemesanan_detail.layanan')
                ->where(function ($query) {
                    $query->where('status_pembayaran', 'Dalam Proses')
                    ->orWhere('status_pembayaran', 'Pembayaran Sukses');
                })
                ->where('metode_pembayaran', 'Transfer Bank')
                ->where(function ($innerQuery) use ($keyword) {
                    $innerQuery->where('id', 'LIKE', "%$keyword%")
                        ->orWhere('nama_pemesan_1', 'LIKE', "%$keyword%")
                        ->orWhere('nama_pemesan_2', 'LIKE', "%$keyword%")
                        ->orWhere('nama_pemesan_3', 'LIKE', "%$keyword%");
                })
                ->orderBy('id', 'asc')
                ->Paginate(12);
                break;
            case "cash":
                $data = Pemesanan::with('customers', 'pemesanan_detail.layanan')
                ->where(function ($query) {
                    $query->where('status_pembayaran', 'Dalam Proses')
                    ->orWhere('status_pembayaran', 'Pembayaran Sukses');
                })
                ->where('metode_pembayaran', 'Cash')
                ->where(function ($innerQuery) use ($keyword) {
                    $innerQuery->where('id', 'LIKE', "%$keyword%")
                        ->orWhere('nama_pemesan_1', 'LIKE', "%$keyword%")
                        ->orWhere('nama_pemesan_2', 'LIKE', "%$keyword%")
                        ->orWhere('nama_pemesan_3', 'LIKE', "%$keyword%");
                })
                ->orderBy('id', 'asc')
                ->Paginate(12);
                break;
            case "cancel":
                $data = Pemesanan::with('customers', 'pemesanan_detail.layanan')
                    ->where('status_pemesanan', 'Batal')
                    ->where(function ($innerQuery) use ($keyword) {
                        $innerQuery->where('id', 'LIKE', "%$keyword%")
                            ->orWhere('nama_pemesan_1', 'LIKE', "%$keyword%")
                            ->orWhere('nama_pemesan_2', 'LIKE', "%$keyword%")
                            ->orWhere('nama_pemesan_3', 'LIKE', "%$keyword%");
                    })
                    ->orderBy('id', 'asc')
                    ->Paginate(12);
                break;
            default:
        }

        if ($viewName === 'transfer') {
            return view('keuangan.customer.transfer', compact('data', 'keyword', 'viewName'));
        } elseif ($viewName === 'cash') {
            return view('keuangan.customer.cash', compact('data', 'keyword', 'viewName'));
            // return json_encode($viewName);
        } elseif ($viewName === 'cancel') {
            return view('keuangan.customer.cancel', compact('data', 'keyword', 'viewName'));
        }

    }
}
