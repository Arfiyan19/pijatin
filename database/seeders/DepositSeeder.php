<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Terapis;
use App\Models\Saldo;
use App\Models\Deposit;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DepositSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = Terapis::all();        

        DB::beginTransaction();
        foreach ($data as $item) {
                $depositAmount = 50000;

                // Withdrawal saldo terapis
                Deposit::create([
                    'terapis_id' => $item->id,
                    'jumlah' => $depositAmount,
                    'bukti_transfer' => "bukti.png",
                    'tanggal' => now(),
                    'status' => 'success',
                ]);
                // tambah saldo
                $existingSaldo = Saldo::where('terapis_id', $item->id)->value('saldo');
                $newSaldo = $existingSaldo + $depositAmount;

                // update saldo terapis
                Saldo::updateOrCreate(
                    ['terapis_id' => $item->id],
                    ['saldo' => $newSaldo, 'updated_at' => now()]
                );
        }
        DB::commit();
    }
}