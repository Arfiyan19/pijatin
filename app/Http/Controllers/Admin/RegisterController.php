<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use App\Models\Terapis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == "superadmin") {
            $data = User::whereNotIn('role', ['superadmin', 'admin', 'finance', 'customer'])->get();
            $terapis = DB::table('terapis')
                ->join('users', 'users.id', '=', 'terapis.user_id')
                ->join('table_alamat', 'table_alamat.user_id', '=', 'terapis.user_id')
                ->select('terapis.*', 'table_alamat.*', 'users.email')
                ->where('status', '=', 'registered')
                ->get();
            $data->terapis = $terapis;
            // return dd($data->terapis);
            return view('backend.registered.index', compact('terapis'));
        } elseif (auth()->user()->role == "admin") {
            $alamat = DB::table('table_alamat')->where('user_id', auth()->user()->id)->first();
            $data = User::whereNotIn('role', ['superadmin', 'admin', 'finance', 'customer'])->get();
            $terapis = DB::table('terapis')
                ->join('users', 'users.id', '=', 'terapis.user_id')
                ->join('table_alamat', 'table_alamat.user_id', '=', 'terapis.user_id')
                ->select('terapis.*', 'table_alamat.*', 'users.email')
                ->where('status', '=', 'registered')
                ->where('table_alamat.kota', 'LIKE', '%' . $alamat->kota . '%')
                ->get();
            //gabung
            $data->terapis = $terapis;
            // return dd($terapis);
            return view('backend.registered.index', compact('terapis'));
        }
    }
    // funtion interview
    public function interview()
    {
        if (auth()->user()->role == "superadmin") {
            //datausers
            $data = User::whereNotIn('role', ['superadmin', 'admin', 'finance', 'customer'])->get();
            // data terapis
            $terapis = DB::table('terapis')
                ->join('users', 'users.id', '=', 'terapis.user_id')
                ->join('table_alamat', 'table_alamat.user_id', '=', 'terapis.user_id')
                ->select('terapis.*', 'table_alamat.*', 'users.email')
                ->where('status', '=', 'interview')
                ->get();

            $data->terapis = $terapis;
            //return json data
            return json_encode($data->terapis);
        } elseif (auth()->user()->role == "admin") {
            //datausers
            $alamat = DB::table('table_alamat')->where('user_id', auth()->user()->id)->first();
            $data = User::whereNotIn('role', ['superadmin', 'admin', 'finance', 'customer'])->get();
            $terapis = DB::table('terapis')
                ->join('users', 'users.id', '=', 'terapis.user_id')
                ->join('table_alamat', 'table_alamat.user_id', '=', 'terapis.user_id')
                ->select('terapis.*', 'table_alamat.*', 'users.email')
                ->where('status', '=', 'interview')
                ->where('table_alamat.kota', '=', $alamat->kota)
                ->get();
            //gabung
            $data->terapis = $terapis;
            return json_encode($data->terapis);
        }
    }
    //function pendaftsr
    public function pendaftaran()
    {
        if (auth()->user()->role == "superadmin") {
            //datausers
            $data = User::whereNotIn('role', ['superadmin', 'admin', 'finance', 'customer'])->get();
            // data terapis
            $terapis = DB::table('terapis')
                ->join('users', 'users.id', '=', 'terapis.user_id')
                ->join('table_alamat', 'table_alamat.user_id', '=', 'terapis.user_id')
                ->select('terapis.*', 'table_alamat.*', 'users.email')
                ->where('status', '=', 'registered')
                ->get();

            $data->terapis = $terapis;
            //return json data
            return json_encode($data->terapis);
        } elseif (auth()->user()->role == "admin") {
            $alamat = DB::table('table_alamat')->where('user_id', auth()->user()->id)->first();
            $data = User::whereNotIn('role', ['superadmin', 'admin', 'finance', 'customer'])->get();
            $terapis = DB::table('terapis')
                ->join('users', 'users.id', '=', 'terapis.user_id')
                ->join('table_alamat', 'table_alamat.user_id', '=', 'terapis.user_id')
                ->select('terapis.*', 'table_alamat.*', 'users.email')
                ->where('status', '=', 'registered')
                ->where('table_alamat.kota', '=', $alamat->kota)
                ->get();
            //gabung
            $data->terapis = $terapis;
            return json_encode($data->terapis);
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
}
