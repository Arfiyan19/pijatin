<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuperAdmin;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SuperadminProfileController extends Controller
{
    public function index($id)
    {
        $user = User::where('id', $id)->with("superadmin")->first();
        $alamat = DB::table('table_alamat')->where('user_id', $id)->first();
        // dd($alamat);
        return view('backend.superadmin.profile.index', compact('user', 'alamat'));
    }

    // edit profile
    public function edit($id)
    {
        $user = User::where('id', $id)->with("admins")->first();
        $alamat = DB::table('table_alamat')->where('user_id', $id)->first();

        return view('backend.superadmin.profile.edit', compact('user', 'alamat'));
    }

    // update profile
    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->with("admins")->first();
        $superadmin = SuperAdmin::where('user_id', $id)->first();
        // update data user
        $user->update([
            'email' => $request->email,
        ]);
        if ($request->hasFile('foto')) {
            // Get the uploaded file
            $file = $request->file('foto');

            // Generate a unique filename
            $filename = time() . '_' . $file->getClientOriginalName();

            // Store the file in the public disk under the 'profile_images' directory
            $file->storeAs('public/profile_images', $filename);

            // Update the user's profile image path in the database
            $foto = 'profile_images/' . $filename;
        } else {
            $foto = $superadmin->foto;
        }
        //ktp
        if ($request->hasFile('ktp')) {
            // Get the uploaded file
            $file = $request->file('ktp');
            // Generate a unique filename
            $filename = time() . '_' . $file->getClientOriginalName();
            // Store the file in the public disk under the 'profile_images' directory
            $file->storeAs('public/foto_ktp', $filename);
            // Update the user's profile image path in the database
            $ktp =  $filename;
        } else {
            // old_ktp
            $ktp = $request->old_ktp;
        }

        // update data superadmin
        $superadmin->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'alamat' => $request->alamat,
            'foto' => $foto,
            'foto_ktp' => $ktp
        ]);

        if ($request->provinsi != null) {
            // cari data provinsi berdasarkan ID
            $response_provinsi = Http::get("http://bayupras141.github.io/api-wilayah-indonesia/api/province/{$request->provinsi}.json");
            $data_provinsi = $response_provinsi->json();

            $provinsi = $data_provinsi['name'];

            // cari data kota berdasarkan ID
            $response_kota = Http::get("http://bayupras141.github.io/api-wilayah-indonesia/api/regency/{$request->kota}.json");
            $data_kota = $response_kota->json();

            $kota = $data_kota['name'];

            // cari data kecamtan berdasarkan ID
            $response_kecamatan = Http::get("http://bayupras141.github.io/api-wilayah-indonesia/api/district/{$request->kecamatan}.json");
            $data_kecamatan = $response_kecamatan->json();

            $kecamatan = $data_kecamatan['name'];

            // cari data kelurahan berdasarkan ID
            $response_kelurahan = Http::get("http://bayupras141.github.io/api-wilayah-indonesia/api/village/{$request->kelurahan}.json");
            $data_kelurahan = $response_kelurahan->json();

            $kelurahan = $data_kelurahan['name'];

            $alamat = DB::table('table_alamat');
            $alamat->updateOrInsert(
                ['user_id' => $id],
                [
                    'provinsi' => $provinsi,
                    'kota' => $kota,
                    'kecamatan' => $kecamatan,
                    'kode_pos' => $request->kode_pos,
                    'alamat_lengkap' => $request->alamat_lengkap,
                    'kelurahan' => $kelurahan
                ]
            );
        } else if ($request->provinsi == null) {
            $alamat = DB::table('table_alamat');
            $alamat->updateOrInsert(
                ['user_id' => $id],
                [
                    'kode_pos' => $request->kode_pos,
                    'alamat_lengkap' => $request->alamat_lengkap
                ]
            );
        }

        // redirect ke halaman superadmin profile 
        return redirect()->route('superadmin.profile', $id)->with('success', 'Profile Berhasil Diupdate');
    }
}
