<?php

namespace App\Http\Controllers\Terapis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Saldo;
use Illuminate\Support\Facades\Validator;
use App\Models\BankFinance;
use App\Models\Deposit;

class PendapatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terapis = auth()->user()->terapis;
        $pendapatan = Saldo::where('terapis_id', $terapis->id)->get();
        return view('terapis.pendapatan', compact('pendapatan', 'terapis'));
    }
    public function topup()
    {
        $terapis = auth()->user()->terapis;
        $pendapatan = Saldo::where('terapis_id', $terapis->id)->get();
        return view('terapis.topup', compact('pendapatan', 'terapis'));
    }
    public function topupPost(Request $request)
    {
        //buatkan validasi
        $validator = Validator::make(
            $request->all(),
            [
                'metodeTopup' => 'required',
            ],
            [
                'metodeTopup.required' => 'Pilih salah satu metode topup',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        return redirect()->route('terapis.topup2', ['nama_bank' => $request->metodeTopup]);
    }
    public function topup2($nama_bank)
    {
        $terapis = auth()->user()->terapis;
        $pendapatan = Saldo::where('terapis_id', $terapis->id)->get();
        $bank_bca = BankFinance::where('bank', 'BCA')->first();
        $bank_bri = BankFinance::where('bank', 'BRI')->first();
        $bank_bni = BankFinance::where('bank', 'BNI')->first();
        $bank_mandiri = BankFinance::where('bank', 'MANDIRI')->first();
        $bank = [
            'BCA' => $bank_bca,
            'BRI' => $bank_bri,
            'BNI' => $bank_bni,
            'MANDIRI' => $bank_mandiri,
        ];
        return view('terapis.topup2', compact('pendapatan', 'terapis', 'nama_bank', 'bank'));
    }
    public function topup3($nama_bank)
    {
        return view('terapis.topup3', compact('nama_bank'));
    }
    public function upload_bukti_tf(Request $request, $nama_bank)
    {
        // has image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/bukti_tf', $filename);
            $terapis = auth()->user()->terapis;
            $deposit = Deposit::create([
                'terapis_id' => $terapis->id,
                'jumlah' => '200000',
                'bank' => $nama_bank,
                'bukti_transfer' => $filename,
                'tanggal' => date('Y-m-d H:i:s'),
                'status' => 'pending',
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Berhasil upload bukti transfer',
                'data' => $deposit,
            ], 200);
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
