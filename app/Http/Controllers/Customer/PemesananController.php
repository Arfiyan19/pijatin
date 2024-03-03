<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use Illuminate\Http\Request;
use App\Models\Layanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Validator;
use App\Models\Terapis;
use App\Models\User;
use App\Models\DetailPemesanan;
use App\Models\DetailLayanan;

class PemesananController extends Controller
{
    public function layanan()
    {
        $layanan_utama = Layanan::where('jenis_layanan', 'layanan_utama')->get();
        $user = auth()->user();
        // alamat user 
        return view('customer.layanan', compact('user', 'layanan_utama'));
    }
    //detail layanan
    public function detailLayanan($id)
    {
        $layanan = Layanan::find($id);
        $user = auth()->user();
        // $user['alamat'] = $user->alamat;
        // dd($layanan);
        return view('customer.detaillayanan', compact('layanan', 'user'));
    }
    // postPemesanan
    public function postPemesanan(Request $request, $id)
    {
        // dd($request->all());
        $user = auth()->user();
        $pesanan = Pemesanan::create([
            'user_id' => auth()->user()->id,
            'layanan_id' => $id,
            'alamat' => $request->alamat,
        ]);

        $user->alamat = $request->alamat;
        return response()->json(
            [
                'success' => true,
                'message' => 'Data berhasil disimpan',
                'data' => $pesanan
            ]
        );
        // $user->save();
        // return redirect()->route('customer.pemesanan');
    }
    public function detailPemesan($id)
    {
        $layanan = Layanan::where('jenis_layanan', 'layanan_tambahan')->get();
        return view('customer.detailpemesanan', compact('id', 'layanan'));
    }
    public function simpanDetailPemesan(Request $request, $id)
    {
        // validasi 
        $validator = Validator::make(
            $request->all(),
            [
                'nama_pemesan' => 'required',
                //pilih jk
                'jk_pemesan' => 'required',
                'jk_terapis' => 'required',
            ],
            [
                'nama_pemesan.required' => 'Nama pemesan harus diisi',
                'jk_pemesan.required' => 'Jenis kelamin pemesan harus diisi',
                'jk_terapis.required' => 'Jenis kelamin terapis harus diisi',
            ]
        );
        //return validasi
        if ($validator->fails()) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Data gagal disimpan',
                    'data' => $validator->errors()
                ]
            );
        }
        //if request layanan tambahan get harga dari layanan tambahan


        //layanan
        $layanan = Layanan::find($id);
        // dd($layanan);
        // panggil user -> terapis 
        $alamat_customer = auth()->user()->alamat[0]->kota;
        $terapis = User::with('terapis', 'alamat')->whereNotIn('role', ['admin', 'superadmin', 'finance', 'customer'])->get();
        //searching pesan_terapis yang sama dengan alamat_customer pilih urutan pertama
        $filteredTerapis = $terapis->filter(function ($terapisUser) use ($alamat_customer) {
            return optional($terapisUser->alamat->first())->kota === $alamat_customer;
        });
        //pilih terapis urutan pertama
        $terapis = $filteredTerapis->first();
        // data customers
        $customers = User::with('customers')->where('id', auth()->user()->id)->first();
        //simpan ke table pemesanan\
        $pemesanan = new Pemesanan;
        $pemesanan->customer_id = $customers->customers->id;
        $pemesanan->terapis_id_1 = $terapis->terapis->id;
        $pemesanan->nama_pemesan_1 = $request->nama_pemesan;
        $pemesanan->tanggal_pemesanan = date('Y-m-d');
        $pemesanan->tanggal_pembayaran = date('Y-m-d H:i:s');
        // total_bayar
        $pemesanan->total_bayar = $layanan->harga;
        $pemesanan->save();
        // if ($request->layanan_tambahan) {
        //     $pemesanan->layanan_tambahan()->attach($request->layanan_tambahan);
        // }
        //simpan ke table detail pemesanan
        $detail_pemesanan = new DetailPemesanan;
        $detail_pemesanan->pemesanan_id = $pemesanan->id;
        $detail_pemesanan->layanan_id = $layanan->id;
        $harga = [];
        if ($request->layanan_tambahan) {
            $i = 1;
            foreach ($request->layanan_tambahan as $key => $value) {
                $detail_pemesanan['layanan_tambahan_' . $i] = $value;
                //get price
                $price = Layanan::find($value);
                $harga[] = $price->harga;
                $i++;
            }
        }
        $detail_pemesanan->jumlah = 1;
        $detail_pemesanan->save();
        //update pemesanan total bayar
        $pemesanan->total_bayar = $layanan->harga + array_sum($harga);
        $pemesanan->save();


        return response()->json(
            [
                'success' => true,
                'message' => 'Data berhasil disimpan',
                'data' => [
                    'pemesanan' => $pemesanan,
                    'detail_pemesanan' => $detail_pemesanan,
                ]
            ]
        );
    }

    public function index($id)
    {
        return view('customer.pemesanan.index');
    }
    // pencarianTerapis
    public function pencarianTerapis($id)
    {
        $layanan = DetailLayanan::with('layanan')->where('id_layanan', $id)->get();
        $terapis = [];
        foreach ($layanan as $key => $value) {
            // $terapis[] = Terapis::with('user')->where('id', $value->id_terapis)->get();
            $terapis[] = Terapis::with(['user', 'alamat'])->where('id', $value->id_terapis)->get();
        }
        $terapis = collect($terapis)->collapse();
        //get_user_id
        foreach ($terapis as $key => $value) {
            $user_id[] = $value->user_id;
        }
        //db_almat where user_id
        $alamat_terapis = Alamat::whereIn('user_id', $user_id)->get();
        //latitude dan longttiude alamat_terapis
        $latitude_longitude = [];

        foreach ($alamat_terapis as $alamat) {
            $latitude_longitude[] = [
                'latitude' => $alamat->latitude,
                'longitude' => $alamat->longitude
            ];
        }
        ///alamat customers dan ambil latitude_dan_longtitude
        $alamat_customer = auth()->user()->alamat[0];
        //latitude dan longtitude customers
        $latitude_longitude_customer = [
            'latitude' => $alamat_customer->latitude,
            'longitude' => $alamat_customer->longitude
        ];
        //rumus haversine formula untuk mencari jarak customers dengan beberapa terapis
        $lat1 = $latitude_longitude_customer['latitude'];
        $lon1 = $latitude_longitude_customer['longitude'];
        $distances = [];

        // Hitung jarak antara pelanggan dan setiap terapis
        foreach ($latitude_longitude as $latlong) {
            $lat2 = $latlong['latitude'];
            $lon2 = $latlong['longitude'];
            $distance = $this->calculateDistance($lat1, $lon1, $lat2, $lon2);
            $distance = round($distance, 2); // Menggunakan fungsi round()
            $distances[] = $distance;
        }
        $terapis = $terapis->toArray();
        //jarak
        $terapis = array_map(function ($terapis, $distance) {
            $terapis['distance'] = $distance;
            return $terapis;
        }, $terapis, $distances);
        //alamat
        foreach ($terapis as $key => $value) {
            $alamat = Alamat::where('user_id', $value['user_id'])->first();
            $terapis[$key]['alamat'] = $alamat;
        }
        $user_alamat = auth()->user()->alamat[0];
        return view('customer.pencarian-terapis', compact('terapis', 'layanan', 'id', 'distances', 'user_alamat'));

        // dd($nama_terapis);
    }
    //pencarian terapis json
    public function pencarianTerapisJson($id)
    {
        $layanan = DetailLayanan::with('layanan')->where('id_layanan', $id)->get();
        $terapis = [];
        foreach ($layanan as $key => $value) {
            // $terapis[] = Terapis::with('user')->where('id', $value->id_terapis)->get();
            $terapis[] = Terapis::with(['user', 'alamat'])->where('id', $value->id_terapis)->get();
        }
        $terapis = collect($terapis)->collapse();
        //get_user_id
        foreach ($terapis as $key => $value) {
            $user_id[] = $value->user_id;
        }
        //db_almat where user_id
        $alamat_terapis = Alamat::whereIn('user_id', $user_id)->get();
        //latitude dan longttiude alamat_terapis
        $latitude_longitude = [];

        foreach ($alamat_terapis as $alamat) {
            $latitude_longitude[] = [
                'latitude' => $alamat->latitude,
                'longitude' => $alamat->longitude
            ];
        }
        ///alamat customers dan ambil latitude_dan_longtitude
        $alamat_customer = auth()->user()->alamat[0];
        //latitude dan longtitude customers
        $latitude_longitude_customer = [
            'latitude' => $alamat_customer->latitude,
            'longitude' => $alamat_customer->longitude
        ];
        //rumus haversine formula untuk mencari jarak customers dengan beberapa terapis
        $lat1 = $latitude_longitude_customer['latitude'];
        $lon1 = $latitude_longitude_customer['longitude'];
        $distances = [];

        // Hitung jarak antara pelanggan dan setiap terapis
        foreach ($latitude_longitude as $latlong) {
            $lat2 = $latlong['latitude'];
            $lon2 = $latlong['longitude'];
            $distance = $this->calculateDistance($lat1, $lon1, $lat2, $lon2);
            $distance = round($distance, 2); // Menggunakan fungsi round()
            $distances[] = $distance;
        }
        $terapis = $terapis->toArray();
        //jarak
        $terapis = array_map(function ($terapis, $distance) {
            $terapis['distance'] = $distance;
            return $terapis;
        }, $terapis, $distances);
        //alamat
        foreach ($terapis as $key => $value) {
            $alamat = Alamat::where('user_id', $value['user_id'])->first();
            $terapis[$key]['alamat'] = $alamat;
        }
        $user_alamat = auth()->user()->alamat[0];

        return response()->json(
            [
                'success' => true,
                'message' => 'Data berhasil disimpan',
                'data' => [
                    'terapis' => $terapis,
                    'layanan' => $layanan,
                    'id' => $id,
                    'distances' => $distances,
                    'user_alamat' => $user_alamat
                ]
            ]
        );

        // dd($nama_terapis);
    }
    //detail terapis
    public function detailTerapis($id, $id_terapis)
    {
        $terapis = Terapis::with('user')->where('id', $id_terapis)->first();
        $alamat = Alamat::where('user_id', $terapis->user_id)->first();
        $terapis['alamat'] = $alamat;
        $user_alamat = auth()->user()->alamat[0];

        return response()->json(
            [
                'success' => true,
                'message' => 'Data berhasil disimpan',
                'data' => [
                    'terapis' => $terapis,
                    'user_alamat' => $user_alamat
                ]
            ]
        );
    }
    function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        // Convert degrees to radians
        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);

        // Haversine formula
        $dlat = $lat2 - $lat1;
        $dlon = $lon2 - $lon1;

        $a = sin($dlat / 2) ** 2 + cos($lat1) * cos($lat2) * sin($dlon / 2) ** 2;
        $c = 2 * asin(sqrt($a));
        $r = 6371; // Earth radius in kilometers

        return $c * $r; // Distance in kilometers
    }
}
