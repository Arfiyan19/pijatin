<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BankFinance;

class FinanceBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BankFinance::get();
        return view('backend.bankFinance.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return json_encode($request->all());
        $validator = $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming 'logo' is an image
            'no_rek' => 'required|numeric',
            'bank' => 'required',
            'nama_pemilik' => 'required',
        ]);

        $bankFinance = new BankFinance();
        $bankFinance->no_rek = $request->no_rek;
        $bankFinance->bank = $request->bank;
        $bankFinance->nama_pemilik = $request->nama_pemilik;
        // imge 
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/foto'), $imageName);
            $bankFinance->logo = $imageName;
        }
        $bankFinance->save();
        return json_encode($bankFinance);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = BankFinance::where('id', $id)->first();
        return json_encode($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = BankFinance::where('id', $id)->first();
        return json_encode($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = BankFinance::where('id', $request->id)->first();
        $data->no_rek = $request->no_rek_edit;
        $data->bank = $request->bank_edit;
        $data->nama_pemilik = $request->nama_pemilik_edit;
        if ($request->hasFile('image-logo')) {
            $image = $request->file('image-logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/foto'), $imageName);
            $data->logo = $imageName;
        }
        $data->update();
        return response()->json(['success' => 'Data Bank Perusahaan Berhasil Diupdate.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bankFinance = BankFinance::where('id', $id)->first();
        $bankFinance->delete();
        return redirect()->back()->with('success', 'Bank Perusahaan berhasil dihapus');
    }
}
