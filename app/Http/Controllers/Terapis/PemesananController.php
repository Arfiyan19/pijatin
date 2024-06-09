<?php

namespace App\Http\Controllers\Terapis;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
//terapis
use App\Models\Terapis;
use App\Models\User;
use App\Models\Layanan;
use App\Models\DetailLayanan;
use App\Models\BankAccount;
use App\Models\Alamat;
use App\Models\PemesananDetail;
//db
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // terapis-pemesanan
        $terapis = Terapis::with('pemesanan1')->where('user_id', auth()->user()->id)->first();
        //sort by terapis-pemesanan1->tanggal_pemesanan
        $terapis->pemesanan1 = $terapis->pemesanan1->sortByDesc('tanggal_pemesanan');
        return view('terapis.notifikasi', compact('terapis'));
    }
    //terima_pesanan
    public function konfirmasi($id)
    {
        $pemesanan = Pemesanan::with('customers', 'pemesanan_detail')->where('id', $id)->first();
        $alamat = Alamat::where('user_id', $pemesanan->customers->user_id)->first();
        //layanan -> pemesanan->pemesanan_detail->layanan_id
        foreach ($pemesanan->pemesanan_detail as $key => $value) {
            $layanan = Layanan::where('id', $value->layanan_id)->first();
            $value->layanan = $layanan;
        }
        //layanan_tambahan = $pemesanan->pemesanan_detail->layanan_tambahan_ = 1,2,3,4
        $layanan_tambahan_id = [];
        $layanan_tambahan_data = [];
        $total_layanan_tambahan = 4;

        for ($i = 1; $i <= $total_layanan_tambahan; $i++) {
            foreach ($pemesanan->pemesanan_detail as $key => $value) {
                // Misalnya, Anda ingin menyimpan nilai dari property "layanan_tambahan_{$i}" dari setiap pemesanan detail
                $layanan_tambahan_id[] = Layanan::where('id', $value->{"layanan_tambahan_{$i}"})->first();
                if ($layanan_tambahan_id[$i - 1] != null) {
                    $layanan_tambahan_data[] = $layanan_tambahan_id[$i - 1];
                }
            }
        }
        //count layanan->durasi + layanan_tambahan_data->durasi
        $total_durasi = 0;
        foreach ($pemesanan->pemesanan_detail as $key => $value) {
            $total_durasi += $value->layanan->durasi;
        }
        foreach ($layanan_tambahan_data as $key => $value) {
            $total_durasi += $value->durasi;
        }
        $harga_layanan = 0;
        foreach ($pemesanan->pemesanan_detail as $key => $value) {
            $harga_layanan += $value->layanan->harga;
        }
        foreach ($layanan_tambahan_data as $key => $value) {
            $harga_layanan += $value->harga;
        }
        $ongkir = 0;
        // pemesanan->total_bayar - $harga_layanan
        $ongkir = $pemesanan->total_bayar - $harga_layanan;
        $total = 0;
        $total = $harga_layanan + $ongkir;
        $terapis =  DB::table('terapis')->where('user_id', auth()->user()->id)->first();
        $latitude_terapis = DB::table('table_alamat')->where('user_id', $terapis->user_id)->first()->latitude;
        $longitude_terapis = DB::table('table_alamat')->where('user_id', $terapis->user_id)->first()->longitude;
        // dd($harga_layanan);
        return view('terapis.notifikasi-order', compact('pemesanan', 'alamat', 'layanan', 'layanan_tambahan_data', 'total_durasi', 'harga_layanan', 'ongkir', 'total', 'latitude_terapis', 'longitude_terapis'));
    }

    // konfirmasiPost
    public function konfirmasiPost(Request $request, $id)
    {
        if ($request->reason == null) {
            $alasan = $request->other_reason;
        } else {
            $alasan = $request->reason;
        }
        if ($alasan != null) {
            //eksekusi tolak pemesanan
            $terapis = Terapis::where('user_id', Terapis::where('user_id', auth()->user()->id)->first()->user_id)->first();
            $terapis_id = $terapis->id;
            $tanggal_penolakan = date('Y-m-d H:i:s');
            $pemesanan = Pemesanan::find($id);
            $pemesanan_tolak =  DB::table('pemesanan_tolak')->insert([
                'pemesanan_id' => $id,
                'terapis_id' => $terapis_id,
                'alasan' => $alasan,
                'tanggal_penolakan' => $tanggal_penolakan,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            //update pemesanan->status_pemesanan
            Pemesanan::where('id', $id)->update([
                'status_pemesanan' => 'Batal',
                'updated_at' => date('Y-m-d H:i:s'),
                'read' => 1
            ]);
            //get
            $pemesanan_tolak =  DB::table('pemesanan_tolak')->where('pemesanan_id', $id)->first();
            return response()->json(
                [
                    'message' => 'Pemesanan berhasil ditolak',
                    'status' => 'success',
                    'ditolak' => 1,
                    'response' => $pemesanan_tolak
                ]
            );
        } else {
            //Proses status_pemesanan
            Pemesanan::where('id', $id)->update([
                'status_pemesanan' => 'Proses',
                'updated_at' => date('Y-m-d H:i:s'),
                'read' => 1
            ]);
            return response()->json(
                [
                    'message' => 'Pemesanan berhasil diterima',
                    'status' => 'success',
                    'ditolak' => 0,
                    'response' => DB::table('pemesanan')->leftJoin('pemesanan_detail', 'pemesanan.id', '=', 'pemesanan_detail.pemesanan_id')->first()
                ]
            );
        }
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
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemesanan $pemesanan)
    {
        //
    }
}
