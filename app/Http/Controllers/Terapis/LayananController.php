<?php

namespace App\Http\Controllers\Terapis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Terapis;
//layanan


class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //view terapis.layanan
        $data = User::where('id', $id)->with('alamat')->first();
        // get terapis->id get 'terapis '
        $terapis = Terapis::where('user_id', $id)->first(); //get id terapis aja 
        $layanan = DB::table('table_detail_layanan')
            ->join('layanan', 'table_detail_layanan.id_layanan', '=', 'layanan.id')
            ->select('layanan.*')
            ->where('table_detail_layanan.id_terapis', $terapis->id)
            ->get();
        //
        // dd($layanan);
        return view('terapis.layanan', compact('data', 'layanan'));
        // return view('terapis.layanan', compact('data'));
    }
    ////tambah layanan
    public function tambahLayanan($id)
    {
        $data = User::where('id', $id)->with('alamat')->first();
        $layanan = DB::table('layanan')->get();
        return view('terapis.tambah-layanan', compact('data', 'layanan'));
    }
    public function getLayanan($id)
    {
        $terapis = Terapis::where('user_id', $id)->first();
        $layanan = DB::table('layanan')
            ->whereNotIn('id', function ($query) use ($terapis) {
                $query->select('id_layanan')
                    ->from('table_detail_layanan')
                    ->where('id_terapis', $terapis->id);
            })
            ->where('jenis_layanan', 'layanan_utama')
            ->get();

        return response()->json($layanan);
    }
    public function getLayananID($id, $id_layanan)
    {
        $terapis = Terapis::where('user_id', $id)->first();
        $layanan = DB::table('layanan')
            ->where('id', $id_layanan)
            ->first();
        return response()->json($layanan);
    }
    // tambahLayananPost
    public function tambahLayananPost(Request $request)
    {
        $terapis = Terapis::where('user_id', $request->id)->first();

        // id 	id_terapis 	id_layanan 	created_at 	updated_at 	
        DB::table('table_detail_layanan')->insert([
            'id_terapis' => $terapis->id,
            'id_layanan' => $request->layanan,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return  response()->json(['message' => 'Layanan berhasil ditambahkan']);
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
