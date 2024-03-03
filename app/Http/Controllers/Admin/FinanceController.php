<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Finance;
use App\Models\Alamat;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('users')
            ->join('finances', 'users.id', '=', 'finances.user_id')
            ->join('table_alamat', 'users.id', '=', 'table_alamat.user_id')
            ->select(
                'users.id',
                'users.created_at',
                'finances.nama',
                'finances.jenis_kelamin',
                'finances.no_hp',
                DB::raw("SUBSTRING(table_alamat.kota, LOCATE(' ', table_alamat.kota) + 1) as kota")
            )
            ->paginate(5);

        return view('backend.finance.index', compact('data'));
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
        // return json_encode($request->all());
        $validator = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'nik' => 'required|numeric|unique:finances,nik',
            'no_hp' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'status' => 'required',
            'password' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $user = new User();
            $user->role = 'finance';
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            $finance = new Finance();
            $finance->nama = $request->nama;
            $finance->nik = $request->nik;
            $finance->no_hp = $request->no_hp;
            $finance->jenis_kelamin = $request->jenis_kelamin;
            $finance->tanggal_lahir = $request->tanggal_lahir;
            $finance->tempat_lahir = $request->tempat_lahir;
            $finance->status = $request->status;
            $finance->user_id = $user->id;
            // $finance->foto = 'default.jpg';
            // imge 
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('storage/foto'), $imageName);
                $finance->foto = $imageName;
            }
            //upload imagektp
            if ($request->hasFile('imageKtp')) {
                $image = $request->file('imageKtp');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('storage/foto_ktp'), $imageName);
                $finance->foto_ktp = $imageName;
            }
            $finance->save();

            $alamat = new Alamat();
            $alamat->user_id = $user->id;
            $alamat->provinsi = $request->provinceNameInput;
            $alamat->kota = $request->cityNameInput;
            $alamat->kecamatan = $request->districtNameDisplay;
            $alamat->kode_pos = $request->kodepos;
            $alamat->kelurahan = $request->villageNameDisplay;
            $alamat->alamat_lengkap = $request->alamat_lengkap;
            $alamat->save();

            DB::commit();
            return response()->json([
                'status' => 'sukses',
                'message' => 'Akun berhasil Dibuat' .
                    "\n\nSilahkan gunakan email dan password berikut untuk login" .
                    "\nEmail: " . $request->email .
                    "\nPassword: " . $request->password,

            ], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'status' => 'error',
                'message' => 'Finance gagal ditambahkan'
            ]);
        }
        // return json_encode($validator);
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
                ->join('finances', 'users.id', '=', 'finances.user_id')
                ->join('table_alamat', 'users.id', '=', 'table_alamat.user_id')
                ->select('users.*', 'finances.*', 'table_alamat.*')
                ->where('users.id', $id)
                ->get();

                // dd($data);
         return view('backend.finance.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $finance = User::with('finance', 'alamat')->where('id', $id)->first();
        return json_encode($finance);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // return json_encode($request->all());

        $finance = Finance::where('user_id', $request->idFinance)->first();
        $finance->nama = $request->namaFinance;
        $finance->nik = $request->nikKtp;
        $finance->no_hp = $request->noHp;
        $finance->jenis_kelamin = $request->jk;
        $finance->tanggal_lahir = $request->tanggal_lahirFinance;
        $finance->tempat_lahir = $request->tempat_lahirFinance;
        $finance->status = $request->statusFinance;
        if ($request->hasFile('image-profil')) {
            $image = $request->file('image-profil');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/foto'), $imageName);
            $finance->foto = $imageName;
        }
        // image_Ktp
        if ($request->hasFile('image_foto_ktp')) {
            $image = $request->file('image_foto_ktp');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/foto_ktp'), $imageName);
            $finance->foto_ktp = $imageName;
        }
        $finance->update();

        $user = User::find($request->idFinance);
        $user->email = $request->emailFinance;
        if ($request->passwordFinance) {
            $user->password = bcrypt($request->passwordFinance);
        }
        $user->update();
        return response()->json(['success' => 'Data Finance Berhasil Diupdate.']);
        //foto
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idFinance)
    {
        $finance = Finance::where('user_id', $idFinance)->first();
        $finance->delete();
        $user = User::where('id', $finance->user_id)->first();
        $user->delete();
        return redirect()->back()->with('success', 'Finance berhasil dihapus');
    }
}
