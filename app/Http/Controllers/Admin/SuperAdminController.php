<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuperAdmin;
use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\SuperAdmin  $superAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(SuperAdmin $superAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuperAdmin  $superAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(SuperAdmin $superAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SuperAdmin  $superAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuperAdmin $superAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuperAdmin  $superAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuperAdmin $superAdmin)
    {
        //
    }
    // profile
    public function profile($id)
    {

        $data = User::where('id', $id)->with('superadmin')->first();
        return view('backend.profile', compact('data'));
    }
    //update
    public function updateProfil(Request $request, $id)
    {
        dd($request->all());
        $user = User::find($id);
        $user->email = $request->email;
        // dd($request->all());
        $user->save();



        $profil = SuperAdmin::where('user_id', $id)->first();
        //nama
        $profil->nama = $request->name;
        $profil->jenis_kelamin = $request->jenis_kelamin;
        $profil->no_hp = $request->no_hp;
        // nik
        $profil->nik = $request->nik;
        $profil->status = $request->status;
        $profil->alamat = $request->alamat;
        $profil->tempat_lahir = $request->tempat_lahir;
        $profil->tanggal_lahir = $request->tanggal_lahir;
        if ($request->hasFile('foto')) {
            $request->file('foto')->move(storage_path('app/public/foto'), $request->file('foto')->getClientOriginalName());
            $profil->foto = $request->file('foto')->getClientOriginalName();
        }
        //foto_ktp
        if ($request->hasFile('foto_ktp')) {
            $request->file('foto_ktp')->move(storage_path('app/public/foto_ktp'), $request->file('foto_ktp')->getClientOriginalName());
            $profil->foto_ktp = $request->file('foto_ktp')->getClientOriginalName();
        }
        $profil->save();
        return redirect()->back()->with('success', 'Profil berhasil diupdate');
    }

    // public function updateProfile(Request $request, $id)
    // {
    //     $data = User::where('id', $id)->first();
    //     $data->name = $request->name;
    //     $data->email = $request->email;
    //     if ($request->password != null) {
    //         $data->password = bcrypt($request->password);
    //     }
    //     $data->save();
    //     return redirect()->back()->with('success', 'Berhasil mengubah data');
    // }
}
