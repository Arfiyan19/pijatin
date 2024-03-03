<?php

namespace App\Http\Controllers\Terapis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Alamat;
use Illuminate\Support\Facades\Validator;
use App\Models\BankAccount;

class RekeningController extends Controller
{
    public function index($id)
    {
        $user_id = $id;
        $data = User::where('id', $user_id)->with('terapis')->with('terapis.bankAccount')->first();
        return view('terapis.profile-rekening', compact('data', 'user_id'));
    }
    // tambah
    public function tambah($id)
    {
        $user_id = $id;
        $data = User::where('id', $user_id)->with('terapis')->with('terapis.bankAccount')->first();
        return view('terapis.tambah-rekening', compact('data', 'user_id'));
    }
    //tambah_post
    public function tambah_post(Request $request, $user_id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama_pemilik' => 'required',
                'no_rek' => 'required',
                'nama_bank' => 'required',
            ],
            [
                'nama_pemilik.required' => 'Nama pemilik rekening harus diisi',
                'no_rek.required' => 'Nomor rekening harus diisi',
                'nama_bank.required' => 'Nama bank harus diisi',
            ]
        );
        if ($validator->fails()) {
            return redirect()->route('terapis.rekening.tambah', $user_id)->withErrors($validator)->withInput();
        }
        $bank = BankAccount::Create([
            'nama_pemilik' => $request->nama_pemilik,
            'nomor_rekening' => $request->no_rek,
            'nama_bank' => $request->nama_bank,
            'user_id' => $user_id,
        ]);
        return redirect()->route('terapis.rekening', $user_id)->with('success', 'Rekening berhasil ditambahkan');
    }
    //edit
    public function editRekening($id, $id_rekening)
    {
        $bank = BankAccount::where('id', $id_rekening)->first();
        return view('terapis.edit-rekening', compact('id', 'id_rekening', 'bank'));
    }
    // deleteRekening
    public function deleteRekening($id, $id_rekening)
    {
        $bank = BankAccount::where('id', $id_rekening)->delete();
        return redirect()->route('terapis.rekening', $id)->with('success', 'Rekening berhasil dihapus');
    }
    // updateRekening
    public function updateRekening(Request $request, $id, $id_rekening)
    {
        $bank = BankAccount::where('id', $id_rekening)->update([
            'nama_pemilik' => $request->nama_pemilik,
            'nomor_rekening' => $request->no_rek,
            'nama_bank' => $request->nama_bank,
        ]);
        return redirect()->route('terapis.rekening', $id)->with('success', 'Rekening berhasil diupdate');
    }
}
