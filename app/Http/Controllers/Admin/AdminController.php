<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Alamat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $data = DB::table('users')
                ->join('admins', 'users.id', '=', 'admins.user_id')
                ->join('table_alamat', 'users.id', '=', 'table_alamat.user_id')
                ->select(
                    'users.id',
                    'users.created_at',
                    'admins.nama',
                    'admins.jenis_kelamin',
                    'admins.no_hp',
                    DB::raw("SUBSTRING(table_alamat.kota, LOCATE(' ', table_alamat.kota) + 1) as kota")
                )
                ->paginate(5);

            // dd($data);
        $kota = DB::table('users')
            ->join('admins', 'users.id', '=', 'admins.user_id')
            ->join('table_alamat', 'users.id', '=', 'table_alamat.user_id')
            ->select('kota', DB::raw('count(*) as total'))
            ->groupBy('kota')
            ->get();

        return view('backend.admin.index', compact('data', 'kota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.create');
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
            $user->role = 'admin';
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            $admin = new Admin();
            $admin->nama = $request->nama;
            $admin->nik = $request->nik;
            $admin->no_hp = $request->no_hp;
            $admin->jenis_kelamin = $request->jenis_kelamin;
            $admin->tanggal_lahir = $request->tanggal_lahir;
            $admin->tempat_lahir = $request->tempat_lahir;
            $admin->status = $request->status;
            $admin->user_id = $user->id;
        
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/profile_images', $filename);
                $foto = 'profile_images/' . $filename;
                $admin->foto = $foto;
            }
            
            if ($request->hasFile('imageKtp')) {
                $image = $request->file('imageKtp');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('storage/foto_ktp'), $imageName);
                $admin->foto_ktp = $imageName;
            }
            $admin->save();
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
                // beri message berupa Data telah berhasil ditambahkan dan berikan informasi email dan katasandi
                'message' => 'Akun berhasil Dibuat' .
                    "\n\nSilahkan gunakan email dan password berikut untuk login" .
                    "\nEmail: " . $request->email .
                    "\nPassword: " . $request->password,

            ], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'status' => 'error',
                'message' => 'Admin gagal ditambahkan'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = DB::table('users')
                ->join('admins', 'users.id', '=', 'admins.user_id')
                ->join('table_alamat', 'users.id', '=', 'table_alamat.user_id')
                ->select('users.*', 'admins.*', 'table_alamat.*')
                ->where('users.id', $id)
                ->get();

                // dd($data);
         return view('backend.admin.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::with('admins', 'alamat')->where('id', $id)->first();
        return json_encode($admin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $admin = Admin::where('user_id', $request->idFinance)->first();
        $admin->nama = $request->namaFinance;
        $admin->nik = $request->nikKtp;
        $admin->no_hp = $request->noHp;
        $admin->jenis_kelamin = $request->jk;
        $admin->tanggal_lahir = $request->tanggal_lahirFinance;
        $admin->tempat_lahir = $request->tempat_lahirFinance;
        $admin->status = $request->statusFinance;
        if ($request->hasFile('image-profil')) {
            $image = $request->file('image-profil');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/foto'), $imageName);
            $admin->foto = $imageName;
        }
        // image_Ktp
        if ($request->hasFile('image_foto_ktp')) {
            $image = $request->file('image_foto_ktp');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/foto_ktp'), $imageName);
            $admin->foto_ktp = $imageName;
        }
        $admin->update();

        $user = User::find($request->idFinance);
        $user->email = $request->emailFinance;
        if ($request->passwordFinance) {
            $user->password = bcrypt($request->passwordFinance);
        }
        $user->update();
        return response()->json(['success' => 'Data Admin Berhasil Diupdate.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */

    public function destroy($idAdmin)
    {
        $admin = Admin::where('user_id', $idAdmin)->first();
        $admin->delete();
        $user = User::where('id', $admin->user_id)->first();
        $user->delete();
        return redirect()->back()->with('success', 'Data Admin berhasil dihapus');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $data = DB
            ::table('users')
            ->join('admins', 'users.id', '=', 'admins.user_id')
            //join_table_alamat
            ->join('table_alamat', 'users.id', '=', 'table_alamat.user_id')
            ->select('users.*', 'admins.*', 'table_alamat.*')
            ->where('table_alamat.kota', 'LIKE', "%$query%")
            ->get();

        $kota = DB::table('users')
            ->join('admins', 'users.id', '=', 'admins.user_id')
            ->join('table_alamat', 'users.id', '=', 'table_alamat.user_id')
            ->select('table_alamat.kota', DB::raw('count(*) as total'))
            ->groupBy('kota')
            ->where("kota", "LIKE", "%$query%")
            ->get();

        // dd($kota);

        return view('backend.admin.index', compact('data', 'kota'));
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
