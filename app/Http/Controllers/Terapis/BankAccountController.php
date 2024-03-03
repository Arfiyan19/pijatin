<?php

namespace App\Http\Controllers\Terapis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BankAccount;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layout_test.bank-account.index');
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
        // Validasi input
        $request->validate([
            'terapis_id' => 'required',
            'nomor_rekening' => 'required',
            'nama_bank' => 'required',
            'nama_pemilik' => 'required',
        ]);
    
        $bankAccount = BankAccount::create([
            'terapis_id' => $request->terapis_id, // Ganti dengan id terapis yang sedang login
            'nomor_rekening' => $request->nomor_rekening,
            'nama_bank' => $request->nama_bank,
            'nama_pemilik' => $request->nama_pemilik,
        ]);
    
        session()->flash('success', 'Bank Account berhasil ditambahkan.');
        return redirect()->back();
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
        $bankAccount = BankAccount::findOrFail($id);
        return view('layout_test.bank-account.edit', compact('bankAccount'));

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
         // Validasi input
        $request->validate([
            'terapis_id' => 'required',
            'nomor_rekening' => 'required',
            'nama_bank' => 'required',
            'nama_pemilik' => 'required',
        ]);

        dd($request->all());

        // Update data di database
        BankAccount::where('id', $id)->update([
            'terapis_id' => $request->terapis_id, // Ganti dengan id terapis yang sedang login
            'nomor_rekening' => $request->nomor_rekening,
            'nama_bank' => $request->nama_bank,
            'nama_pemilik' => $request->nama_pemilik,
        ]);

        // Tambahkan pesan sesi
        session()->flash('success', 'Bank Account berhasil diperbarui.');

        // Redirect ke halaman sebelumnya
        return redirect()->route('bank-accounts.edit', $id);
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
