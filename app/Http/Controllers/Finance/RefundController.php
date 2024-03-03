<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\BankAccount;
use App\Models\Withdrawal;
use App\Models\Refund;
use App\Exports\ExportRefund;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RefundController extends Controller
{
    public function index()
    {
        $data = Refund::with('customers')
            // ->where('status_refund', 'Menunggu')
            // ->where('status_refund', 'Selesai')
            ->get();
        // return response()->json($data);
        return view('keuangan.refund.index', compact('data'));
    }

    public function refundDetail($id)
    {
        $data = Refund::with(
            'customers.bankAccount', 
            'pemesanan.pemesanan_detail.layanan',
            'pemesanan.pemesanan_detail.layananExtra1',
            'pemesanan.pemesanan_detail.layananExtra2',
            'pemesanan.pemesanan_detail.layananExtra3',
            'pemesanan.terapis',
            'pemesanan.terapis2',
            'pemesanan.terapis3')
            ->where('id', $id)
            ->get();

        return response()->json($data);
    }

    public function refundKonfirmasi($id)
    {
        $refund = Refund::find($id);

        if ($refund) {
            $refund->status_refund = 'Selesai';
            $refund->save();
            return redirect('/finance/refund')->with('success', 'Refund status updated successfully');
        } else {
            // Handle the case where the refund record is not found
            return response()->json(['error' => 'Refund not found'], 404);
        }
    }


    function export_excel(){
        return Excel::download(new ExportRefund, "refund.xlsx");
    }

}
