<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenangguhanController extends Controller
{
    public function aduanPengguna()
    {
        // get data from table aduan pengguna
        $data = DB::table('table_aduan')
                ->join('users', 'table_aduan.pelapor_id', '=', 'users.id')
                ->leftJoin('customers', 'users.id', '=', 'customers.user_id')
                ->leftJoin('terapis', 'users.id', '=', 'terapis.user_id')
                ->select('table_aduan.*', 'customers.nama as nama_customer', 'customers.jenis_kelamin as customer_jk', 'terapis.nama as nama_terapis', 'terapis.jenis_kelamin as terapis_jk')
                ->paginate(10);

        // dd($data);
        return view('backend.penangguhan.aduanPengguna ', compact('data'));
    }

    public function detail($id)
    {
        // get data from table aduan pengguna
        $data = DB::table('table_aduan')
                ->join('users', 'table_aduan.pelapor_id', '=', 'users.id')
                ->leftJoin('customers', 'users.id', '=', 'customers.user_id')
                ->leftJoin('terapis', 'users.id', '=', 'terapis.user_id')
                ->select('table_aduan.*', 'customers.nama as nama_customer', 'customers.jenis_kelamin as customer_jk', 'terapis.nama as nama_terapis', 'terapis.jenis_kelamin as terapis_jk')
                ->where('table_aduan.id', $id)
                ->first();
        return view('backend.penangguhan.detail', compact('data'));
    }

    public function ditangguhkan()
    {
        return view('backend.penangguhan.ditangguhkan');
    }
}
