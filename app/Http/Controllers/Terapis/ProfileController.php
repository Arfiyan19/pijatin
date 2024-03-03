<?php

namespace App\Http\Controllers\Terapis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Terapis;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use App\Models\Alamat;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //terapis model
        $data = Terapis::where('user_id', auth()->user()->id)->with('user')->first();
        $layanan = DB::table('table_detail_layanan')
            ->join('terapis', 'terapis.id', '=', 'table_detail_layanan.id_terapis')
            ->join('layanan', 'layanan.id', '=', 'table_detail_layanan.id_layanan')
            ->select('layanan.*')
            ->where('table_detail_layanan.id_terapis', $data->id)
            ->get();
        $data->layanan = $layanan;
        return view('terapis.profile-therapist', compact('data'));
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
        $data = Terapis::where('user_id', $id)->with('user')->first();
        return view('terapis.edit-profile', compact('data'));
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
        // dd /jenis kelamin 
        $request->validate([
            'nama' => 'required|min:2',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
        ]);
        // dd($request->jenis_kelamin);
        $terapis = Terapis::where('user_id', $id)->with('user')->first()->update([
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);
        // dd($terapis);
        return redirect()->route('terapis-profile.index')->with('success', 'Data berhasil diubah');
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
    public function skck($id)
    {
        $data = Terapis::where('user_id', $id)->with('user')->first();
        return view('terapis.ktp-therapist', compact('data'));
    }
    // alamat
    public function alamat($id)
    {
        $data = User::where('id', $id)->with('alamat')->first();
        // dd($data);
        return view('customer.alamat', compact('data'));
    }
    // tambahAlamat
    public function tambahAlamat($id)
    {
        $data = User::where('id', $id)->with('alamat')->first();
        // dd($data);
        return view('terapis.profile-alamatbaru', compact('data'));
    }
    // cariLokasi
    public function cariLokasi($id)
    {
        $data = User::where('id', $id)->with('alamat')->first();
        // dd($data);
        return view('terapis.profile-carilokasi', compact('data'));
    }
    // getProvinsi
    public function provinsi($id)
    {
        try {
            $response = Http::withHeaders([])->get('http://bayupras141.github.io/api-wilayah-indonesia/api/provinces.json');
            $status = $response->status();
            $data = $response->json();
            if ($status === 200) {
                // Sukses, lakukan sesuatu dengan data provinsi di sini
                return response()->json([
                    'id' => $id,
                    'success' => true,
                    'data' => $data
                ]);
            } else {
                // Tangani kesalahan lain jika diperlukan
                return response()->json(['error' => 'Terjadi kesalahan saat mengambil data provinsi'], $status);
            }
        } catch (\Exception $e) {
            // Tangani kesalahan dalam pengecualian
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    // getKota
    public function city($id, Request $request)
    {
        try {
            $response = Http::withHeaders([])->get("http://bayupras141.github.io/api-wilayah-indonesia/api/regencies/{$request->id}.json");
            $status = $response->status();
            $data = $response->json();
            if ($status === 200) {
                // Sukses, lakukan sesuatu dengan data provinsi di sini
                return response()->json([
                    'id' => $id,
                    'success' => true,
                    'data' => $data
                ]);
            } else {
                // Tangani kesalahan lain jika diperlukan
                return response()->json(['error' => 'Terjadi kesalahan saat mengambil data kota'], $status);
            }
        } catch (\Exception $e) {
            // Tangani kesalahan dalam pengecualian
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    // district
    public function district($id, Request $request)
    {
        try {
            $response = Http::withHeaders([])->get("http://bayupras141.github.io/api-wilayah-indonesia/api/districts/{$request->id}.json");
            $status = $response->status();
            $data = $response->json();
            if ($status === 200) {
                // Sukses, lakukan sesuatu dengan data provinsi di sini
                return response()->json([
                    'id' => $id,
                    'success' => true,
                    'data' => $data
                ]);
            } else {
                // Tangani kesalahan lain jika diperlukan
                return response()->json(['error' => 'Terjadi kesalahan saat mengambil data districts'], $status);
            }
        } catch (\Exception $e) {
            // Tangani kesalahan dalam pengecualian
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function village($id, Request $request)
    {
        try {
            $response = Http::withHeaders([])->get("http://bayupras141.github.io/api-wilayah-indonesia/api/villages/{$request->id}.json");
            $status = $response->status();
            $data = $response->json();
            if ($status === 200) {
                // Sukses, lakukan sesuatu dengan data provinsi di sini
                return response()->json([
                    'id' => $id,
                    'success' => true,
                    'data' => $data
                ]);
            } else {
                // Tangani kesalahan lain jika diperlukan
                return response()->json(['error' => 'Terjadi kesalahan saat mengambil data districts'], $status);
            }
        } catch (\Exception $e) {
            // Tangani kesalahan dalam pengecualian
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    // postCariLokasi
    public function postCariLokasi(Request $request, $id)
    {
        $alamat = Alamat::create([
            'user_id' => $id,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'kode_pos' => $request->kode_pos,
            'latitude' => '-',
            'longitude' => '-',
            'alamat_lengkap' => '-',
        ]);
        return response()->json([
            'id' => $id,
            'success' => true,
            'data' => $alamat
        ]);

        // return redirect()->route('terapis-profile.index')->with('success', 'Data berhasil diubah');
    }
    // hapus alamat 
    public function hapusAlamat($id, Request $request)
    {

        $alamat = Alamat::where('id', $request->id)->delete();
        return response()->json([
            'id' => $id,
            'success' => true,
            'data' => $alamat
        ]);
    }
    // editAlamat
    public function editAlamat($id, $id_alamat)
    {
        $data = User::where('id', $id)->
            // with alamat = alamat::where('id', $id_alamat)->first();
            with(['alamat' => function ($query) use ($id_alamat) {
                $query->where('id', $id_alamat);
            }])->first();
        return view('terapis.profile-edit-lokasi', compact('data', 'id', 'id_alamat'));
    }
    // updateAlamat
    public function updateAlamat($id, $id_alamat, Request $request)
    {
        $alamat = Alamat::where('id', $id_alamat)->update([
            'latitude' => '-',
            'longitude' => '-',
            'alamat_lengkap' => $request->alamat,
        ]);
        return redirect()->route('terapis.alamat', $id)->with('success', 'Data berhasil diubah');
    }
    //edit CarilokasiDropdown provinsi dll
    public function editCariLokasi($id, $id_alamat)
    {
        $data = User::where('id', $id)->
            // with alamat = alamat::where('id', $id_alamat)->first();
            with(['alamat' => function ($query) use ($id_alamat) {
                $query->where('id', $id_alamat);
            }])->first();
        return view('terapis.profile-edit-cari-lokasi', compact('data', 'id', 'id_alamat'));
    }
    //update editCariLokasi
    public function resetCariLokasi(Request $request)
    {
        $alamat = Alamat::where('id', $request->idAlamat)->update([
            'provinsi' => '',
            'kota' => '',
            'kecamatan' => '',
            'kelurahan' => '',
            'kode_pos' => '',
            'alamat_lengkap' => '-',
        ]);
        return response()->json([
            'id' => $request->id,
            'success' => true,
            'data' => $alamat
        ]);
    }
    //update foto
    public function updateFoto(Request $request, $id)
    {
        //simpan foto
        // foto 
        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $foto = $request->file('foto');
            $namaFoto = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(storage_path('app/public/foto'), $namaFoto);
            $foto = $namaFoto;
        } else {
            $foto = 'default.png';
        }
        $terapis = Terapis::where('user_id', $id)->with('user')->first()->update([
            'foto' => $foto,
        ]);
        return response()->json([
            'id' => $id,
            'success' => true,
            'data' => $terapis
        ]);
    }
    // updateCariLokasi
    public function updateCariLokasi($id, $idAlamat, Request $request)
    {
        $alamat = Alamat::where('id', $idAlamat)->update([
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'kode_pos' => $request->kode_pos,
        ]);
        return response()->json([
            'id' => $id,
            'idAlamat' => $idAlamat,
            'success' => true,
            'data' => $alamat
        ]);
    }
}
