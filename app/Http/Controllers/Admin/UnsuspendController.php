<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Customer;
use App\Models\Customers;
use App\Models\Terapis;

class UnsuspendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == 'superadmin') {
            $terapis = Terapis::with(['user', 'user.alamat'])
                ->where('status', 'suspended')->orWhere('status', 'active')
                ->get();
            $customers = Customers::with(['user', 'user.alamat'])
                ->where('status', 'suspended')->orWhere('status', 'active')
                ->get();
            $arrayGabungan = array_merge($terapis->toArray(), $customers->toArray());
            $araymap = array_map(function ($item) {
                $item['user'] = User::find($item['user_id']);
                return $item;
            }, $arrayGabungan);
            return view('backend.unsuspend.index', compact('arrayGabungan'));
        } else if (auth()->user()->role == 'admin') {
            $kotaUser = DB::table('table_alamat')->where('user_id', auth()->user()->id)->first();
            $terapis = DB::table('users')
                ->join('table_alamat', 'users.id', '=', 'table_alamat.user_id')
                ->join('terapis', 'users.id', '=', 'terapis.user_id')
                ->where('users.role', 'terapis')
                ->whereIn('terapis.status', ['active', 'suspended'])
                ->where('kota', 'LIKE', '%' . $kotaUser->kota . '%')
                ->select('table_alamat.kota', 'users.*', 'terapis.*')
                ->get();
            // dd($terapis);
            $customers = DB::table('users')
                ->join('table_alamat', 'users.id', '=', 'table_alamat.user_id')
                ->join('customers', 'users.id', '=', 'customers.user_id')
                ->where('users.role', 'customer')
                ->whereIn('customers.status', ['active', 'suspended'])
                ->where('kota', 'LIKE', '%' . $kotaUser->kota . '%')
                ->select('table_alamat.kota', 'users.*', 'customers.*')
                ->distinct('table_alamat.kota') // Menambahkan distinct pada kolom 'kota'
                ->get();
            $arrayGabungan = array_merge($terapis->toArray(), $customers->toArray());
            // dd($customers);
            return view('backend.unsuspend.index', compact('arrayGabungan'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id    = $request->id;
        $role = $request->role;
        if ($role == 'customer') {
            $data = User::with('customers')->where('id', $id)->first();
            $alamat = DB::table('table_alamat')->where('user_id', $id)->get();
            $data->alamat = $alamat;
        } elseif ($role == 'terapis') {
            $data = User::with('terapis')->where('id', $id)->first();
            $alamat = DB::table('table_alamat')->where('user_id', $id)->get();
            $data->alamat = $alamat;
        }
        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
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
    // updateStatus
    public function updateStatus(Request $request)
    {
        if (auth()->user()->role == 'superadmin') {
            $this->validate($request, [
                'id' => 'required',
                'status' => 'required',
            ]);
        } elseif (auth()->user()->role == 'admin') {
            $this->validate($request, [
                'id' => 'required',
                'status' => 'required',
            ]);
        }
        $id = $request->id;
        $user = User::find($id);
        if ($user->role == 'customer' && $request->status == 'active') {
            Customers::where('user_id', $id)->update(['status' => 'active']);
        } elseif ($user->role == 'customer' && $request->status == 'suspended') {
            Customers::where('user_id', $id)->update(['status' => 'suspended']);
        } elseif ($user->role == 'terapis' && $request->status == 'active') {
            Terapis::where('user_id', $id)->update(['status' => 'active']);
        } elseif ($user->role == 'terapis' && $request->status == 'suspended') {
            Terapis::where('user_id', $id)->update(['status' => 'suspended']);
        }
        return response()->json([
            'success' => true,
            'message' => 'Status berhasil diubah'
        ]);
    }
}
