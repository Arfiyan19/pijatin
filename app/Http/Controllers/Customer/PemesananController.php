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
use Carbon\Carbon;

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
        return view('customer.detailPemesanan', compact('id', 'layanan'));
        // dd($layanan);
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
            ],
            [
                'nama_pemesan.required' => 'Nama pemesan harus diisi',
                'jk_pemesan.required' => 'Jenis kelamin pemesan harus diisi',
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
        // dd($detail_pemesanan);
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
    // detailPemesanID
    public function detailPemesanID($id, $id_pemesanan)
    {
        $layanan = Layanan::find($id);
        $pemesanan = Pemesanan::with('pemesanan_detail')->where('id', $id_pemesanan)->first();
        $layanan_tambahan = [];
        foreach ($pemesanan->pemesanan_detail as $key => $value) {
            $layanan_tambahan[] = Layanan::find($value->layanan_tambahan_1);
            $layanan_tambahan[] = Layanan::find($value->layanan_tambahan_2);
            $layanan_tambahan[] = Layanan::find($value->layanan_tambahan_3);
            $layanan_tambahan[] = Layanan::find($value->layanan_tambahan_4);
        }
        $user = auth()->user();
        // dd($layanan_tambahan);
        return view('customer.detail-layanan-pemesan', compact('id', 'id_pemesanan', 'pemesanan', 'layanan_tambahan', 'layanan', 'user'));
    }
    // detail-pemesan-pencarianTerapis
    public function detailPemesanPencarianTerapis($id, $id_pemesanan)
    {
        $layanan = DetailLayanan::with('layanan')->where('id_layanan', $id)->get();

        $pemesanan = Pemesanan::with('pemesanan_detail')->where('id', $id_pemesanan)->first();
        $layanan_tambahan = [];
        foreach ($pemesanan->pemesanan_detail as $key => $value) {
            $layanan_tambahan[] = Layanan::find($value->layanan_tambahan_1);
            $layanan_tambahan[] = Layanan::find($value->layanan_tambahan_2);
            $layanan_tambahan[] = Layanan::find($value->layanan_tambahan_3);
            $layanan_tambahan[] = Layanan::find($value->layanan_tambahan_4);
        }
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
        //sort dari terapis yang memiliki jarak terdekat
        usort($terapis, function ($a, $b) {
            return $a['distance'] <=> $b['distance'];
        });
        // dd($terapis);
        $tarif_per_km = 2000;
        //masukan ke terapis
        $terapis = array_map(function ($terapis) use ($tarif_per_km) {
            $terapis['tarif'] = $terapis['distance'] * $tarif_per_km;
            return $terapis;
        }, $terapis);
        // dd($terapis);

        $user_alamat = auth()->user()->alamat[0];
        // return view('customer.detail-layanan-pemesan-pencarian-terapis', compact('terapis', 'layanan', 'id', 'id_pemesanan', 'distances', 'user_alamat'));
        return view('customer.detail-layanan-pemesan-pencarian-terapis', compact('terapis', 'layanan', 'id', 'id_pemesanan', 'distances', 'user_alamat'));
    }
    // detailPemesanPencarianTerapis
    public function detailPemesanPencarianTerapisSimpan($id, $id_pemesanan, Request $request)
    {
        $pemesanan = Pemesanan::with('pemesanan_detail')->where('id', $id_pemesanan)->get();
        //UPDATE PEMESANAN PADA KOLOM TERAPIS_1
        $pemesanan = Pemesanan::find($id_pemesanan);
        $pemesanan->terapis_id_1 = $request->id_terapis;
        //update total_bayar tambah dengan request->tarif
        $pemesanan->total_bayar = $pemesanan->total_bayar + $request->tarif;
        $pemesanan->save();
        //response
        return response()->json(
            [
                'success' => true,
                'message' => 'Data berhasil disimpan',
                'data' => $pemesanan,
                'request' => $request->all()
            ]
        );
    }
    // detailPemesanPencarianTerapisID
    public function detailPemesanPencarianTerapisID($id, $id_pemesanan, $id_terapis, Request $request)
    {
        $layanan = Layanan::find($id);
        $pemesanan = Pemesanan::with('pemesanan_detail')->where('id', $id_pemesanan)->first();
        $layanan_tambahan = [];
        foreach ($pemesanan->pemesanan_detail as $key => $value) {
            $layanan_tambahan[] = Layanan::find($value->layanan_tambahan_1);
            $layanan_tambahan[] = Layanan::find($value->layanan_tambahan_2);
            $layanan_tambahan[] = Layanan::find($value->layanan_tambahan_3);
            $layanan_tambahan[] = Layanan::find($value->layanan_tambahan_4);
        }
        $user = auth()->user();
        $terapis = Terapis::with('user')->where('id', $id_terapis)->first();
        //jarak rumus haversine
        $alamat_terapis = Alamat::whereIn('user_id', [$terapis->user_id])->get();
        //latitude dan longttiude alamat_terapis
        $latitude_longitude = [];
        foreach ($alamat_terapis as $alamat) {
            $latitude_longitude[] = [
                'latitude' => $alamat->latitude,
                'longitude' => $alamat->longitude
            ];
        }

        // latitude_longitude_users
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
        $terapis['distance'] = $distances[0];
        $terapis['alamat'] = $alamat_terapis[0];

        // dd($layanan_tambahan);
        return view('customer.detail-layanan-pemesan-pencarian-terapis-after', compact('id', 'id_pemesanan', 'pemesanan', 'layanan_tambahan', 'layanan', 'user', 'terapis'));
    }
    // detailPemesanPencarianTerapisIDPost
    public function detailPemesanPencarianTerapisIDPost($id, $id_pemesanan, $id_terapis, Request $request)
    {
        $pemesanan = Pemesanan::with('pemesanan_detail')->where('id', $id_pemesanan)->get();
        // conver tanggal to yyyy-mm-dd
        $tanggal_pemesanan = carbon::parse($request->tanggal_pemesanan)->format('Y-m-d');
        // $jam = $request->jam; hasil 13:00 convert / tambahi agar 13:00:00
        $jam = carbon::parse($request->jam)->format('H:i:s');
        $tanggal_pemesanan_jam = $tanggal_pemesanan . ' ' . $jam;
        // dd($tanggal_pemesanan_jam);
        //update pemesanan ->create_at
        $pemesanan = Pemesanan::find($id_pemesanan);
        $pemesanan->created_at = $tanggal_pemesanan_jam;
        $pemesanan->save();
        return response()->json(
            [
                'success' => true,
                'message' => 'Data berhasil disimpan',
                'data' => $pemesanan,
                'request' => $request->all()
            ]
        );
        // dd($pemesanan);
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
        usort($terapis, function ($a, $b) {
            return $a['distance'] <=> $b['distance'];
        });
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
