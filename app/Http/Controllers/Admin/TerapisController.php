<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Terapis;
use Illuminate\Support\Facades\DB;
use App\Models\Layanan;

class TerapisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == 'superadmin') {

             $data = DB::table('users')
                ->join('terapis', 'users.id', '=', 'terapis.user_id')
                ->join('table_alamat', 'users.id', '=', 'table_alamat.user_id')
                ->select(
                    'users.id',
                    'users.created_at',
                    'terapis.nama',
                    'terapis.jenis_kelamin',
                    'terapis.no_hp',
                    DB::raw("SUBSTRING(table_alamat.kota, LOCATE(' ', table_alamat.kota) + 1) as kota")
                )
                ->paginate(5);

            $kota = DB::table('users')
                ->join('terapis', 'users.id', '=', 'terapis.user_id')
                ->join('table_alamat', 'users.id', '=', 'table_alamat.user_id')
                ->select('kota', DB::raw('count(*) as total'))
                ->groupBy('kota')
                ->get();
            return view('backend.terapis.index', compact('data', 'kota'));

        } else if(auth()->user()->role == 'admin'){

            // mencari alamat admin
            $alamat = DB::table('table_alamat')->where('user_id', auth()->user()->id)->first();

            $data = DB::table('users')
                ->join('terapis', 'users.id', '=', 'terapis.user_id')
                ->join('table_alamat', 'users.id', '=', 'table_alamat.user_id')
                ->where('table_alamat.kota', 'LIKE', '%' . $alamat->kota . '%')
                ->select(
                    'users.id',
                    'users.created_at',
                    'terapis.nama',
                    'terapis.jenis_kelamin',
                    'terapis.no_hp',
                    DB::raw("SUBSTRING(table_alamat.kota, LOCATE(' ', table_alamat.kota) + 1) as kota")
                )
                ->paginate(5);
           return view('backend.terapis.index', compact('data'));

        }
    }

    public function index_verifikasi()
    {
        $kotaUser = DB::table('table_alamat')->where('user_id', auth()->user()->id)->first();
        $data = DB::table('users')
            ->join('terapis', 'users.id', '=', 'terapis.user_id')
            ->join('table_alamat', 'users.id', '=', 'table_alamat.user_id')
            ->where('kota', 'LIKE', '%' . $kotaUser->kota . '%')
            // ->where('terapiss.status', 'inactive')
            ->select(
                'users.id',
                'users.email',
                'terapis.tanggal_lahir',
                'terapis.nama',
                'terapis.jenis_kelamin',
                DB::raw("SUBSTRING(table_alamat.kota, LOCATE(' ', table_alamat.kota) + 1) as kota")
            )
            ->distinct('users.id')
            ->paginate(5);
        return view('backend.terapis.index-verif', compact('data'));
    }

    public function verifikasi($id)
    {
        $data = DB::table('users')
        ->join('terapis', 'users.id', '=', 'terapis.user_id')
        ->join('table_alamat', 'users.id', '=', 'table_alamat.user_id')
        ->select('users.*', 'terapis.*', 'table_alamat.*')
        ->where('users.id', $id)
        ->get();
        return view('backend.terapis.verifikasi', compact('data'));
    }

    public function searchTerapis(Request $request)
    {
        $query = $request->input('query');
        $Terapis = DB::table('users')
            ->join('terapis', 'users.id', '=', 'terapis.user_id')
            ->join('table_alamat', 'users.id', '=', 'table_alamat.user_id')
            ->select('users.*', 'terapis.*', 'table_alamat.*')
            ->where('table_alamat.kota', 'LIKE', "%$query%")
            ->get();

        $layanan = Layanan::all();

        $kota = DB::table('users')
            ->join('terapis', 'users.id', '=', 'terapis.user_id')
            ->join('table_alamat', 'users.id', '=', 'table_alamat.user_id')
            ->select('table_alamat.kota', DB::raw('count(*) as total'))
            ->groupBy('kota')
            ->where("kota", "LIKE", "%$query%")
            ->get();

        return view('backend.terapis.index', compact('Terapis', 'kota'));
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
        $data = DB::table('users')
        ->join('terapis', 'users.id', '=', 'terapis.user_id')
        ->join('table_alamat', 'users.id', '=', 'table_alamat.user_id')
        ->select('users.*', 'terapis.*', 'table_alamat.*')
        ->where('users.id', $id)
        ->get();

        return view('backend.terapis.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data = Terapis::with('layanan', 'user')->where('user_id', $id)->first();
        $data = Terapis::with('user')->where('user_id', $id)->first();

        // cari layanan berdasarkan detail_layanan_id
        $layanan = DB::table('table_detail_layanan')
            ->join('terapis', 'terapis.id', '=', 'table_detail_layanan.id_terapis')
            ->join('layanan', 'layanan.id', '=', 'table_detail_layanan.id_layanan')
            ->select('layanan.nama_layanan', 'layanan.harga', 'layanan.durasi')
            ->where('table_detail_layanan.id_terapis', $data->id)
            ->get();
        $data->layanan = $layanan;

        // cari data alamat berdasarkan user_id
        $alamat = DB::table('table_alamat')
            ->join('users', 'users.id', '=', 'table_alamat.user_id')
            ->where('table_alamat.user_id', $id)
            ->first();
        $data->alamat = $alamat;

        return json_encode($data);
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
        // return json_encode($request->all());
        $terapis = Terapis::where('user_id', $id)->first();
        $terapis->nama = $request->name;
        $terapis->nik = $request->nik;
        $terapis->no_hp = $request->no_hp;
        // $terapis->alamat = $request->alamat;
        $terapis->jenis_kelamin = $request->jenis_kelamin;
        $terapis->tanggal_lahir = $request->tanggal_lahir;
        $terapis->tempat_lahir = $request->tempat_lahir;
        //foto
        if ($request->foto) {
            $terapis->foto = $request->foto;
        }
        //foto_ktp
        if ($request->foto_ktp) {
            $terapis->foto_ktp = $request->foto_ktp;
        }
        $terapis->update();
        $user = User::find($id);
        $user->email = $request->email;
        $user->update();

        //mengupdate password
        if ($request->password) {
            $user->password = bcrypt($request->password);
            $user->update();
        }
        return response()->json(['success' => 'Data Terapis Berhasil Diupdate.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $terapis = Terapis::where('user_id', $id)->first();
        $terapis->delete();
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'Data Terapis Berhasil Dihapus.');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/foto'), $imageName);
            return response()->json(['success' => true, 'image_url' => asset('storage/foto/' . $imageName), 'image_name' => $imageName]);
        }
        return response()->json(['success' => false]);
    }
    // uploadKtp
    public function uploadKtp(Request $request)
    {
        if ($request->hasFile('imageKtp')) {
            $image = $request->file('imageKtp');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/foto_ktp'), $imageName);
            return response()->json(['success' => true, 'image_url' => asset('storage/foto_ktp/' . $imageName), 'image_name' => $imageName]);
        }
        return response()->json(['success' => false]);
    }
}
