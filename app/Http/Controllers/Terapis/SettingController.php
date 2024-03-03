<?php

namespace App\Http\Controllers\Terapis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Terapis;
use App\Models\Booking;
use App\Models\Layanan;
use Illuminate\Support\Facades\Auth;
use App\Models\Saldo;


class SettingController extends Controller
{
    public function index($id)
    {
        $data = User::where('id', $id)->with('terapis')->with('terapis.detail_layanan')->
            // with layanan.id = detail_layanan.id_layanan
            with('terapis.detail_layanan.layanan')->first();
        // dd($data);
        // forach detail_layanan as $detail_layanan
        $array = [];
        foreach ($data->terapis->detail_layanan as $detail_layanan) {
            array_push($array, $detail_layanan->layanan->nama_layanan);
        }
        return view('terapis.profile-pengaturan', compact('data', 'array'));
    }
    //pin e-wallet
    public function pinEwallet($id)
    {
        // dd($id);
        $saldo = Saldo::where('terapis_id', auth()->user()->terapis->id)->first();
        //open pin
        return view('terapis.pin-eWallet', compact('id', 'saldo'));
    }
    // postPinEwallet 
    public function postPinEwallet(Request $request, $id)
    {
        $request->validate([
            'pin' => 'required|min:6|max:6',
        ]);

        $user = User::where('id', $id)->first();
        $saldo = Saldo::where('terapis_id', $user->terapis->id)->first();
        // pin save hash 
        $saldo->pin = bcrypt($request->pin);
        $saldo->save();
        return response()->json([
            'success' => 'Pin Berhasil DiBuat',
        ]);
        //cocok an saldo->pin bycrypt($request->pin);
        // if (password_verify($request->pin, $saldo->pin)) {
        //     return response()->json([
        //         'success' => 'Pin Benar',
        //     ]);
        // } else {
        //     return response()->json([
        //         'error' => 'Pin Salah, Ulangi Lagi',
        //     ]);
        // }
        // dd($saldo);
    }


    //logout 

}
