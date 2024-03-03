<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $layanan_utama = Layanan::where('jenis_layanan', 'layanan_utama')->get();
        $layanan_tambahan = Layanan::where('jenis_layanan', 'layanan_tambahan')->get();
        return view('backend.layanan.index', compact('layanan_utama', 'layanan_tambahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('backend.layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ambil semua data dari form
        $data = $request->all();
        // validasi data
        $request->validate([
            'nama_layanan' => 'required',
            'harga' => 'required',
            'durasi' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
        ]);
        // upload gambar
        $data['gambar'] = $request->file('gambar')->store(
            'assets/gallery',
            'public'
        );
        // simpan data ke database
        Layanan::create($data);

        if (auth()->user()->role === 'admin') {
            $routeName = 'admin-layanan.index';
        } elseif (auth()->user()->role === 'superadmin') {
            $routeName = 'superadmin-layanan.index';
        }

        return redirect()->route($routeName)->with('success', 'Layanan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function show(Layanan $layanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $layanan = Layanan::find($id);
        // dd($layanan);
        return view('backend.layanan.edit', compact('layanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Mencari data
        $layanan = Layanan::find($id);
        
        // Validasi gambar
       if ($request->hasFile('gambar')) {
            // Get the uploaded file
            $file = $request->file('gambar');
            
            // Generate a unique filename
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Store the file in the public disk under the 'profile_images' directory
            $file->storeAs('public/assets/gallery', $filename);

            // Update the user's profile image path in the database
            $gambar= 'assets/gallery/' . $filename;
        } else {
            $gambar = $layanan->gambar;
        }

        // update data admin
        $layanan->update([
            'nama_layanan' => $request->nama_layanan,
            'harga' => $request->harga,
            'durasi' => $request->durasi,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
        ]);

        if (auth()->user()->role === 'admin') {
            $routeName = 'admin-layanan.index';
        } elseif (auth()->user()->role === 'superadmin') {
            $routeName = 'superadmin-layanan.index';
        }

        return redirect()->route($routeName)->with('success', 'Layanan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $layanan = Layanan::find($id);

        $layanan->delete();

        if (auth()->user()->role === 'admin') {
            $routeName = 'admin-layanan.index';
        } elseif (auth()->user()->role === 'superadmin') {
            $routeName = 'superadmin-layanan.index';
        }

        return redirect()->route($routeName)->with('success', 'Layanan Berhasil Dihapus');
        
    }
}
