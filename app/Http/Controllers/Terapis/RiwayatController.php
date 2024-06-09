<?php

namespace App\Http\Controllers\Terapis;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Terapis;
use App\Models\DetailPemesanan;
use App\Models\Layanan;
use App\Models\Pemesanan;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('terapis.riwayat');
    }
    public function riwayatDijadwalkan()
    {
        $id = auth()->user()->id;
        // $user = User::with('terapis.pemesanan1.pemesanan_detail')->where('id', $id)->first();
        $user = User::with(['terapis.pemesanan1' => function ($query) {
            $query->where('status_pemesanan', 'Proses')->with('pemesanan_detail');
        }])->where('id', $id)->first();

        $pemesanan_id = [];
        foreach ($user->terapis->pemesanan1 as $pemesanan) {
            $pemesanan_id[] = $pemesanan->id;
        }
        // // //get detail pemesanan
        $detail_pemesanan = [];
        foreach ($pemesanan_id as $id) {
            $detail_pemesanan[] = DetailPemesanan::where('pemesanan_id', $id)->get();
        }
        // dd($detail_pemesanan);
        // // //foreach detail_pemesanan join table layanan on layanan.layanan_id
        $layanan = [];
        foreach ($detail_pemesanan as $detail) {
            foreach ($detail as $d) {
                $layanan[] = Layanan::where('id', $d->layanan_id)->first();
            }
        }
        // dd($layanan);
        // // // get customer_id 
        $customer_id = [];
        foreach ($user->terapis->pemesanan1 as $pemesanan) {
            $customer_id[] = $pemesanan->customer_id;
        }
        // // //panggil terapis
        $customers = [];
        foreach ($customer_id as $id) {
            $customers[] = Customers::where('id', $id)->first();
        }
        // dd($user);
        return view('terapis.riwayat-dijadwalkan', compact('user', 'detail_pemesanan', 'layanan', 'customers'));
    }
    //riwayatSelesai
    public function riwayatSelesai()
    {
        $id = auth()->user()->id;
        // $user = User::with('terapis.pemesanan1.pemesanan_detail')->where('id', $id)->first();
        $user = User::with(['terapis.pemesanan1' => function ($query) {
            $query->where('status_pemesanan', 'Sukses')->with('pemesanan_detail');
        }])->where('id', $id)->first();

        $pemesanan_id = [];
        foreach ($user->terapis->pemesanan1 as $pemesanan) {
            $pemesanan_id[] = $pemesanan->id;
        }
        // // //get detail pemesanan
        $detail_pemesanan = [];
        foreach ($pemesanan_id as $id) {
            $detail_pemesanan[] = DetailPemesanan::where('pemesanan_id', $id)->get();
        }
        // dd($detail_pemesanan);
        // // //foreach detail_pemesanan join table layanan on layanan.layanan_id
        $layanan = [];
        foreach ($detail_pemesanan as $detail) {
            foreach ($detail as $d) {
                $layanan[] = Layanan::where('id', $d->layanan_id)->first();
            }
        }
        // dd($layanan);
        // // // get customer_id 
        $customer_id = [];
        foreach ($user->terapis->pemesanan1 as $pemesanan) {
            $customer_id[] = $pemesanan->customer_id;
        }
        // // //panggil terapis
        $customers = [];
        foreach ($customer_id as $id) {
            $customers[] = Customers::where('id', $id)->first();
        }
        return view('terapis.riwayat-selesai', compact('user', 'detail_pemesanan', 'layanan', 'customers'));
    }
    // riwayatDitolak
    public function riwayatDitolak()
    {
        $id = auth()->user()->id;
        // $user = User::with('terapis.pemesanan1.pemesanan_detail')->where('id', $id)->first();
        $user = User::with(['terapis.pemesanan1' => function ($query) {
            $query->where('status_pemesanan', 'Batal')->with('pemesanan_detail');
        }])->where('id', $id)->first();

        $pemesanan_id = [];
        foreach ($user->terapis->pemesanan1 as $pemesanan) {
            $pemesanan_id[] = $pemesanan->id;
        }
        // // //get detail pemesanan
        $detail_pemesanan = [];
        foreach ($pemesanan_id as $id) {
            $detail_pemesanan[] = DetailPemesanan::where('pemesanan_id', $id)->get();
        }
        // dd($detail_pemesanan);
        // // //foreach detail_pemesanan join table layanan on layanan.layanan_id
        $layanan = [];
        foreach ($detail_pemesanan as $detail) {
            foreach ($detail as $d) {
                $layanan[] = Layanan::where('id', $d->layanan_id)->first();
            }
        }
        // dd($layanan);
        // // // get customer_id 
        $customer_id = [];
        foreach ($user->terapis->pemesanan1 as $pemesanan) {
            $customer_id[] = $pemesanan->customer_id;
        }
        // // //panggil terapis
        $customers = [];
        foreach ($customer_id as $id) {
            $customers[] = Customers::where('id', $id)->first();
        }
        // dd($user, $detail_pemesanan, $layanan, $customers);
        return view('terapis.riwayat-ditolak', compact('user', 'detail_pemesanan', 'layanan', 'customers'));
    }

    //detail riwayatDijadwalkan
    public function detailRiwayatDijadwalkan($id)
    {
        $user = User::with(['terapis.pemesanan1' => function ($query) use ($id) {
            $query->where('id', $id);
        }, 'terapis.pemesanan1.pemesanan_detail'])
            ->where('id', auth()->user()->id)
            ->first();
        //get detail pemesanan
        // dd($user);
        $detail_pemesanan = [];
        foreach ($user->terapis->pemesanan1 as $pemesanan) {
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
        // get customer_id 
        $customers_id = [];
        foreach ($user->terapis->pemesanan1 as $pemesanan) {
            $customers_id[] = $pemesanan->customer_id;
        }
        //terapis
        $terapis_id = [];
        foreach ($user->terapis->pemesanan1 as $pemesanan) {
            $terapis_id[] = $pemesanan->terapis_id_1;
        }

        $terapis = Terapis::where('id', $terapis_id[0])->first();
        $customer = Customers::where('id', $customers_id[0])->first();
        $detail_pemesanan = $detail_pemesanan[0][0];
        $layanan = $layanan[0];
        $pemesanan = Pemesanan::where('id', $id)->first();
        $alamat = DB::table('table_alamat')->where('user_id', $customer->user_id)->first();

        $layanan_tambahan_total = 4;
        $layanan_tambahan = [];
        for ($i = 1; $i <= $layanan_tambahan_total; $i++) {
            $layanan_tambahan[] = Layanan::where('id', $detail_pemesanan->{'layanan_tambahan_' . $i})->first();
        }
        $latitude_terapis = DB::table('table_alamat')->where('user_id', $terapis->user_id)->first()->latitude;
        $longitude_terapis = DB::table('table_alamat')->where('user_id', $terapis->user_id)->first()->longitude;
        return view('terapis.riwayat-detail-order-diterima', compact('pemesanan', 'detail_pemesanan', 'layanan', 'customer', 'terapis', 'layanan_tambahan', 'alamat', 'latitude_terapis', 'longitude_terapis'));
    }
    // postRiwayatDijadwalkan
    public function postDetailRiwayatDijadwalkan(Request $request)
    {
        $id = $request->id;
        $pemesanan = Pemesanan::where('id', $id)->first();
        $pemesanan->status_pemesanan = 'Sukses';
        $pemesanan->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Pemesanan Selesai'
        ]);
    }

    //detail riwayatSelesai
    public function detailRiwayatSelesai($id)
    {
        $user = User::with(['terapis.pemesanan1' => function ($query) use ($id) {
            $query->where('id', $id);
        }, 'terapis.pemesanan1.pemesanan_detail'])
            ->where('id', auth()->user()->id)
            ->first();
        //get detail pemesanan
        // dd($user);
        $detail_pemesanan = [];
        foreach ($user->terapis->pemesanan1 as $pemesanan) {
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
        // get customer_id 
        $customers_id = [];
        foreach ($user->terapis->pemesanan1 as $pemesanan) {
            $customers_id[] = $pemesanan->customer_id;
        }
        //terapis
        $terapis_id = [];
        foreach ($user->terapis->pemesanan1 as $pemesanan) {
            $terapis_id[] = $pemesanan->terapis_id_1;
        }

        $terapis = Terapis::where('id', $terapis_id[0])->first();
        $customer = Customers::where('id', $customers_id[0])->first();
        $detail_pemesanan = $detail_pemesanan[0][0];
        $layanan = $layanan[0];
        $pemesanan = Pemesanan::where('id', $id)->first();
        $alamat = DB::table('table_alamat')->where('user_id', $customer->user_id)->first();

        $layanan_tambahan_total = 4;
        $layanan_tambahan = [];
        for ($i = 1; $i <= $layanan_tambahan_total; $i++) {
            $layanan_tambahan[] = Layanan::where('id', $detail_pemesanan->{'layanan_tambahan_' . $i})->first();
        }
        $latitude_terapis = DB::table('table_alamat')->where('user_id', $terapis->user_id)->first()->latitude;
        $longitude_terapis = DB::table('table_alamat')->where('user_id', $terapis->user_id)->first()->longitude;
        return view('terapis.riwayat-detail-order-selesai2', compact('pemesanan', 'detail_pemesanan', 'layanan', 'customer', 'terapis', 'layanan_tambahan', 'alamat', 'latitude_terapis', 'longitude_terapis'));
    }

    //detail riwayatDitolak
    public function detailRiwayatDitolak($id)
    {
        $user = User::with(['terapis.pemesanan1' => function ($query) use ($id) {
            $query->where('id', $id);
        }, 'terapis.pemesanan1.pemesanan_detail'])
            ->where('id', auth()->user()->id)
            ->first();
        //get detail pemesanan
        // dd($user);
        $detail_pemesanan = [];
        foreach ($user->terapis->pemesanan1 as $pemesanan) {
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
        // get customer_id 
        $customers_id = [];
        foreach ($user->terapis->pemesanan1 as $pemesanan) {
            $customers_id[] = $pemesanan->customer_id;
        }
        //terapis
        $terapis_id = [];
        foreach ($user->terapis->pemesanan1 as $pemesanan) {
            $terapis_id[] = $pemesanan->terapis_id_1;
        }

        $terapis = Terapis::where('id', $terapis_id[0])->first();
        $customer = Customers::where('id', $customers_id[0])->first();
        $detail_pemesanan = $detail_pemesanan[0][0];
        $layanan = $layanan[0];
        $pemesanan = Pemesanan::where('id', $id)->first();
        $alamat = DB::table('table_alamat')->where('user_id', $customer->user_id)->first();

        $layanan_tambahan_total = 4;
        $layanan_tambahan = [];
        for ($i = 1; $i <= $layanan_tambahan_total; $i++) {
            $layanan_tambahan[] = Layanan::where('id', $detail_pemesanan->{'layanan_tambahan_' . $i})->first();
        }
        $detail_layanan_ditolak = DB::table('pemesanan_tolak')->where('pemesanan_id', $id)->first();
        $latitude_terapis = DB::table('table_alamat')->where('user_id', $terapis->user_id)->first()->latitude;
        $longitude_terapis = DB::table('table_alamat')->where('user_id', $terapis->user_id)->first()->longitude;

        return view('terapis.riwayat-detail-order-ditolak2', compact('detail_layanan_ditolak', 'pemesanan', 'detail_pemesanan', 'layanan', 'customer', 'terapis', 'layanan_tambahan', 'alamat', 'latitude_terapis', 'longitude_terapis'));
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
