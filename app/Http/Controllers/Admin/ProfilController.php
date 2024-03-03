<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($profil)
    {
        $data = User::with('profile')->where('id', Auth::user()->id)->first();
        return view('backend.profile', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //update 
    public function updateProfil(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'phone_number' => 'required',
        // ]);

        // // $user = User::find(Auth::user()->id);
        // // $user->name = $request->name;
        // // $user->phone_number = $request->phone_number;
        // // $user->save();


        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();



        $profil = Profil::find($id);
        $profil->user_id = $user->id;
        // $profil->ktp = $request->ktp;
        $profil->jenis_kelamin = $request->jenis_kelamin;
        $profil->no_hp = $request->no_hp;
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
            $profil->ktp = $request->file('foto_ktp')->getClientOriginalName();
        }
        $profil->save();
        return redirect()->back()->with('success', 'Profil berhasil diupdate');
    }

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
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(Profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit(Profil $profil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profil $profil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil $profil)
    {
        //
    }
}
