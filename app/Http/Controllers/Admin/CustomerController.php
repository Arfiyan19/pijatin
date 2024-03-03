<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
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
                    ->join('customers', 'users.id', '=', 'customers.user_id')
                    ->join('table_alamat', 'users.id', '=', 'table_alamat.user_id')
                    ->select(
                        'users.id',
                        'users.email',
                        'customers.tanggal_lahir',
                        'customers.nama',
                        'customers.jenis_kelamin',
                        DB::raw("SUBSTRING(table_alamat.kota, LOCATE(' ', table_alamat.kota) + 1) as kota")
                    )
            ->paginate(5);
            return view('backend.customers.index', compact('data'));
        } else if (auth()->user()->role == 'admin') {
            $kotaUser = DB::table('table_alamat')->where('user_id', auth()->user()->id)->first();
            $data = DB::table('users')
                ->join('customers', 'users.id', '=', 'customers.user_id')
                ->join('table_alamat', 'users.id', '=', 'table_alamat.user_id')
                ->where('kota', 'LIKE', '%' . $kotaUser->kota . '%')
                ->select(
                    'users.id',
                    'users.email',
                    'customers.tanggal_lahir',
                    'customers.nama',
                    'customers.jenis_kelamin',
                    DB::raw("SUBSTRING(table_alamat.kota, LOCATE(' ', table_alamat.kota) + 1) as kota")
                )
                ->distinct('users.id')
                ->paginate(5);
            return view('backend.customers.index', compact('data'));
        }
    }

    public function index_verifikasi()
    {
        $kotaUser = DB::table('table_alamat')->where('user_id', auth()->user()->id)->first();
        $data = DB::table('users')
            ->join('customers', 'users.id', '=', 'customers.user_id')
            ->join('table_alamat', 'users.id', '=', 'table_alamat.user_id')
            ->where('kota', 'LIKE', '%' . $kotaUser->kota . '%')
            ->where('customers.status', 'inactive')
            ->select(
                'users.id',
                'users.email',
                'customers.tanggal_lahir',
                'customers.nama',
                'customers.jenis_kelamin',
                DB::raw("SUBSTRING(table_alamat.kota, LOCATE(' ', table_alamat.kota) + 1) as kota")
            )
            ->distinct('users.id')
            ->paginate(5);
        return view('backend.customers.index-verif', compact('data'));
    }

    public function verifikasi($id)
    {
        $data = DB::table('users')
        ->join('customers', 'users.id', '=', 'customers.user_id')
        ->join('table_alamat', 'users.id', '=', 'table_alamat.user_id')
        ->select('users.*', 'customers.*', 'table_alamat.*')
        ->where('users.id', $id)
        ->get();
        return view('backend.customers.verifikasi', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.customers.create');
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
        ->join('customers', 'users.id', '=', 'customers.user_id')
        ->join('table_alamat', 'users.id', '=', 'table_alamat.user_id')
        ->select('users.*', 'customers.*', 'table_alamat.*')
        ->where('users.id', $id)
        ->get();

        return view('backend.customers.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $json_data = User::with('customers')->where('id', $id)->first();
        return json_encode(User::with('customers')->where('id', $id)->first());
        // return json_encode($json_data);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request  $request, $id)
    {
        // return json_encode($id);
        $customer = Customers::with('user')->where('user_id', $id)->first();
        $customer->nama = $request->name;
        $customer->nik = $request->nik;
        $customer->no_hp = $request->no_hp;
        $customer->jenis_kelamin = $request->jenis_kelamin;
        $customer->tempat_lahir = $request->tempat_lahir;
        $customer->tanggal_lahir = $request->tanggal_lahir;
        //foto
        if ($request->foto) {
            $customer->foto = $request->foto;
        }
        //foto_ktp
        if ($request->foto_ktp) {
            $customer->foto_ktp = $request->foto_ktp;
        }
        $customer->update();
        $user = User::find($id);
        $user->email = $request->email;
        $user->update();
        //mengupdate password
        if ($request->password) {
            $user->password = bcrypt($request->password);
            $user->update();
        }
        return response()->json(['success' => 'Data berhasil diupdate.'], 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customers $customers, $id)
    {
        $customers = Customers::where('user_id', $id)->first();
        $customers->delete();
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
    
    public function search(Request $request)
    {
        $query = $request->input('query');
        $data = DB
            ::table('users')
            ->join('customers', 'users.id', '=', 'customers.user_id')
            //join_table_alamat
            ->join('table_alamat', 'users.id', '=', 'table_alamat.user_id')
            ->select('users.*', 'customers.*', 'table_alamat.*')
            ->where('table_alamat.kota', 'LIKE', "%$query%")
            ->get();

        $kota = DB::table('users')
            ->join('customers', 'users.id', '=', 'customers.user_id')
            ->join('table_alamat', 'users.id', '=', 'table_alamat.user_id')
            ->select('table_alamat.kota', DB::raw('count(*) as total'))
            ->groupBy('kota')
            ->where("kota", "LIKE", "%$query%")
            ->get();

        return view('backend.customers.index', compact('data', 'kota'));
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
