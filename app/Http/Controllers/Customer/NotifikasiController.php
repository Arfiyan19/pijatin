<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Layanan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;
use App\Models\Terapis;
use App\Models\DetailPemesanan;
use App\Models\Customers;

class NotifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $user = User::with(['customers.pemesanan' => function ($query) {
            $query->whereIn('status_pemesanan', ['Masuk', 'Proses']);
        }, 'customers.pemesanan.pemesanan_detail'])
            ->where('id', $id)
            ->first();
        $pemesanan_id = [];
        foreach ($user->customers->pemesanan as $pemesanan) {
            $pemesanan_id[] = $pemesanan->id;
        }
        //get detail pemesanan
        $detail_pemesanan = [];
        foreach ($pemesanan_id as $id) {
            $detail_pemesanan[] = DetailPemesanan::where('pemesanan_id', $id)->get();
        }
        //foreach detail_pemesanan join table layanan on layanan.layanan_id
        $layanan = [];
        foreach ($detail_pemesanan as $detail) {
            foreach ($detail as $d) {
                $layanan[] = Layanan::where('id', $d->layanan_id)->first();
            }
        }
        // dd($layanan);

        // get terapis_id 
        $terapis_id = [];
        foreach ($user->customers->pemesanan as $pemesanan) {
            $terapis_id[] = $pemesanan->terapis_id_1;
        }
        //panggil terapis
        $terapis = [];
        foreach ($terapis_id as $id) {
            $terapis[] = Terapis::where('id', $id)->first();
        }
        return view('customer.notif', compact('user', 'terapis', 'layanan'));
    }

    // /notifikasi/id 
    public function detail($id)
    {
        $user = User::with(['customers.pemesanan' => function ($query) use ($id) {
            $query->where('id', $id);
        }, 'customers.pemesanan.pemesanan_detail'])
            ->where('id', auth()->user()->id)
            ->first();
        // get detail pemesanan
        // dd($user);
        $detail_pemesanan = [];
        foreach ($user->customers->pemesanan as $pemesanan) {
            $detail_pemesanan[] = DetailPemesanan::where('pemesanan_id', $pemesanan->id)->get();
        }
        // dd($detail_pemesanan);
        //foreach detail_pemesanan join table layanan on layanan.layanan_id
        $layanan = [];
        foreach ($detail_pemesanan as $detail) {
            foreach ($detail as $d) {
                $layanan[] = Layanan::where('id', $d->layanan_id)->first();
            }
        }
        // dd($layanan);
        // get customer_id 
        $customers_id = [];
        foreach ($user->customers->pemesanan as $pemesanan) {
            $customers_id[] = $pemesanan->customer_id;
        }
        // dd($customers_id);
        //terapis
        $terapis_id = [];
        foreach ($user->customers->pemesanan as $pemesanan) {
            $terapis_id[] = $pemesanan->terapis_id_1;
        }

        $terapis = Terapis::where('id', $terapis_id[0])->first();
        $customer = Customers::where('id', $customers_id[0])->first();
        $detail_pemesanan = $detail_pemesanan[0][0];
        $layanan = $layanan[0];
        $pemesanan = Pemesanan::where('id', $id)->first();
        $alamat = DB::table('table_alamat')->where('user_id', $terapis->user_id)->first();
        $layanan_tambahan_total = 4;
        $layanan_tambahan = [];
        for ($i = 1; $i <= $layanan_tambahan_total; $i++) {
            $layanan_tambahan[] = Layanan::where('id', $detail_pemesanan->{'layanan_tambahan_' . $i})->first();
        }
        return view('customer.cashback', compact('user', 'terapis', 'customer', 'detail_pemesanan', 'layanan', 'pemesanan', 'alamat', 'layanan_tambahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
