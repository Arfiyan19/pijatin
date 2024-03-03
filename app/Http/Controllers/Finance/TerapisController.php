<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Terapis;
use App\Models\BankAccount;
use App\Models\Pemesanan;
use App\Models\Withdrawal;
use App\Models\Deposit;
use App\Models\User;
use app\Models\Saldo;
use App\Exports\Finance\TransaksiTerapis\ExportTerapis;
use App\Exports\Finance\TransaksiTerapis\ExportMemberTerapis;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class TerapisController extends Controller
{

    public function index()
    {
        $pemesanan1 = Pemesanan::with('terapis')->get();
        $pemesanan2 = Pemesanan::with('terapis2')->get();
        $pemesanan3 = Pemesanan::with('terapis3')->get();
        $withdrawal = Withdrawal::with('terapis')->get();
        $deposit    = Deposit::with('terapis')->get();

        $mergedCollection = $pemesanan1->mergeRecursive($pemesanan2)->mergeRecursive($pemesanan3)->mergeRecursive($withdrawal)->mergeRecursive($deposit);
        $sortedCollection = $mergedCollection->sortByDesc('created_at');

        $perPage = 10;
        $currentPage = Paginator::resolveCurrentPage('page');
    
        $paginatedItems = $sortedCollection->slice(($currentPage - 1) * $perPage, $perPage)->all();
    
        $paginatedCollection = new LengthAwarePaginator($paginatedItems, $sortedCollection->count(), $perPage, $currentPage, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);        
    
        // return response()->json($paginatedCollection);
        return view('keuangan.terapis.index', ['data' => $paginatedCollection]);
    }

    public function member()
    {
        $data = Terapis::with('alamat')
        ->get();
        return view('keuangan.terapis.nama', compact('data'));
    }

    public function detailMember($id)
    {   
        $data = Terapis::with('user.alamat')
            ->where('id', $id)
            ->get();

        $layanan = Pemesanan::with(
            'customers',
            'pemesanan_detail.layanan', 
            'pemesanan_detail.layananExtra1',
            'pemesanan_detail.layananExtra2',
            'pemesanan_detail.layananExtra3'
            )
            ->where(function ($query) use ($id) {
                $query->where('terapis_id_1', $id)
                    ->orWhere('terapis_id_2', $id)
                    ->orWhere('terapis_id_3', $id);
            })
            ->get();

            $totalLayanan = count($layanan);
            $totalLayananDibatalkan = count($layanan->filter(function ($item) {
                return trim(strtolower($item->status_pemesanan)) === 'batal';
            }));            
        return view('keuangan.terapis.detail', compact('data','layanan', 'totalLayanan', 'totalLayananDibatalkan'));
    }

    function transaksiTerapis(){
        return Excel::download(new ExportTerapis, "TransaksiTerapis.xlsx");
    }
    function memberTerapis(){
        return Excel::download(new ExportMemberTerapis, "MemberTerapis.xlsx");
    }
    
    public function search(Request $request)
    {
        $viewName = $request->input('view_name');
        $keyword = $request->input('query');
        // var_dump($keyword);
        // var_dump($viewName);

        switch ($viewName) {
            case "transaksi":
                $pemesanan1 = Pemesanan::with('terapis')->whereHas('terapis', function ($query) use ($keyword) {
                    $query->where('nama', 'like', "%{$keyword}%");
                })->get();
    
                $pemesanan2 = Pemesanan::with('terapis2')->whereHas('terapis2', function ($query) use ($keyword) {
                    $query->where('nama', 'like', "%{$keyword}%");
                })->get();
    
                $pemesanan3 = Pemesanan::with('terapis3')->whereHas('terapis3', function ($query) use ($keyword) {
                    $query->where('nama', 'like', "%{$keyword}%");
                })->get();
    
                $withdrawal = Withdrawal::with('terapis')->whereHas('terapis', function ($query) use ($keyword) {
                    $query->where('nama', 'like', "%{$keyword}%");
                })->get();
    
                $deposit = Deposit::with('terapis')->whereHas('terapis', function ($query) use ($keyword) {
                    $query->where('nama', 'like', "%{$keyword}%");
                })->get();
    
                $mergedCollection = $withdrawal->mergeRecursive($deposit)->mergeRecursive($pemesanan1)->mergeRecursive($pemesanan2)->mergeRecursive($pemesanan3);
                $sortedCollection = $mergedCollection->sortByDesc('created_at');

                $perPage = 10;
                $currentPage = Paginator::resolveCurrentPage('page');
            
                $paginatedItems = $sortedCollection->slice(($currentPage - 1) * $perPage, $perPage)->all();
            
                $paginatedCollection = new LengthAwarePaginator($paginatedItems, $sortedCollection->count(), $perPage, $currentPage, [
                    'path' => Paginator::resolveCurrentPath(),
                    'pageName' => 'page',
                ]);        
                break;

            case "member":
                $data = Terapis::with('bankAccount')
                ->where('nama', 'LIKE', "%$query%") 
                ->get();
                break;  
            default:
        }

        if ($viewName === 'transaksi') {
            return view('keuangan.terapis.index', ['data' => $paginatedCollection, 'keyword' => $keyword, 'viewName' => $viewName]);
            // return response()->json($paginatedCollection);

        } elseif ($viewName === 'member') {
            return view('keuangan.terapis.nama', compact('data'));
        }
    }
  
    public function depositDetail($id)
    {
        $data =Deposit::with('terapis')
            ->where('id', $id)
            ->get();
        return response()->json($data);
    }


}
