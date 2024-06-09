<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Alamat;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $data = DB::table('customers')->where('user_id', '=', $user->id)->first();
        $alamat = Alamat::where('user_id', '=', $user->id)->get();
        $id = $this->formatCustomerID($user->created_at, $user->id);
        $data->alamat = $alamat;
        // dd($data);
        return view('customer.profile', compact('data', 'id'));
    }
    public function formatCustomerID($created_at, $id)
    {
        $createdDate = new \DateTime($created_at);
        $year = substr($createdDate->format('Y'), -2);
        $month = str_pad($createdDate->format('m'), 2, '0', STR_PAD_LEFT);
        $day = str_pad($createdDate->format('d'), 2, '0', STR_PAD_LEFT);
        $formattedDate = $year . $month . $day;

        $paddedID = str_pad($id, 3, '0', STR_PAD_LEFT);

        return $formattedDate . '-' . $paddedID;
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
    public function formProfile($id)
    {


        return view('customer.form', compact('data'));
    }
    public function detailKtp($id)
    {
        $data = User::with('customers')->where('id', $id)->first();
        // dd($data);
        // $data = User::with('customers', 'alamat')->where('id', $id)->first();
        return view('customer.detailktp', compact('data'));
    }
    // postDetailKtp
    public function postDetailKtp($id, Request $request)
    {
        $customer = DB::table('customers')->where('user_id', $id)->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'no_hp' => $request->no_hp,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);
        return response()->json([
            'id' => $id,
            'success' => true,
            'data' => $customer
        ]);
    }

    // alamat
    public function alamat($id)
    {
        $data = User::with('customers', 'alamat')->where('id', $id)->first();
        // dd($data);
        return view('customer.alamat', compact('data'));
    }
    // tambahAlamat
    public function tambahAlamat($id)
    {
        $data = User::with('customers', 'alamat')->where('id', $id)->first();
        // dd($data);
        return view('customer.form-alamat', compact('data'));
    }
    public function cariLokasi($id)
    {
        $data = User::with('customers', 'alamat')->where('id', $id)->first();
        // dd($data);
        return view('customer.profile-carilokasi', compact('data'));
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

    public function postCariLokasi(Request $request, $id)
    {
        //validator

        $alamat = Alamat::create([
            'user_id' => $id,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'kode_pos' => $request->kode_pos,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'alamat_lengkap' => '-',
        ]);
        return response()->json([
            'id' => $id,
            'success' => true,
            'data' => $alamat
        ]);
    }

    // editAlamat
    public function editAlamat($id, $id_alamat)
    {
        $data = User::where('id', $id)->with(['alamat' => function ($query) use ($id_alamat) {
            $query->where('id', $id_alamat);
        }])->first();
        return view('customer.profile-edit-lokasi', compact('data', 'id', 'id_alamat'));
    }
    // updateAlamat
    public function updateAlamat($id, $id_alamat, Request $request)
    {
        // dd($request->all());
        $alamat = Alamat::where('id', $id_alamat)->update([
            'alamat_lengkap' => $request->alamat,
        ]);
        return redirect()->route('customers.alamat', $id)->with('success', 'Data berhasil diubah');
    }
    public function hapusAlamat(Request $request, $id)
    {
        $alamat = Alamat::where('id', $request->id)->delete();
        return response()->json([
            'id' => $id,
            'success' => true,
            'data' => $alamat
        ]);
    }
    // resetCariLokasi
    public function resetCariLokasi(Request $request, $id, $id_alamat)
    {
        $alamat = Alamat::where('id', $id_alamat)->update([
            'provinsi' => '-',
            'kota' => '-',
            'kecamatan' => '-',
            'kelurahan' => '-',
            'kode_pos' => '-',
            'latitude' => '-',
            'longitude' => '-',
            'alamat_lengkap' => '-',
        ]);
        return response()->json([
            'id' => $id,
            'success' => true,
            'data' => $alamat
        ]);
    }
    //editcarilokasi
    public function editCariLokasi($id, $id_alamat)
    {
        $data = User::where('id', $id)->with(['alamat' => function ($query) use ($id_alamat) {
            $query->where('id', $id_alamat);
        }])->first();
        return view('customer.profile-edit-cari-lokasi', compact('data', 'id', 'id_alamat'));
    }
    // updateeditCariLokasi
    public function updateCariLokasi($id, $idAlamat, Request $request)
    {
        $alamat = Alamat::where('id', $idAlamat)->update([
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'kode_pos' => $request->kode_pos,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);
        return response()->json([
            'id' => $id,
            'idAlamat' => $idAlamat,
            'success' => true,
            'data' => $alamat
        ]);
    }
}
