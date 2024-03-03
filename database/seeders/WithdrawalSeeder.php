<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Terapis;
use App\Models\BankAccount;
use App\Models\Saldo;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WithdrawalSeeder extends Seeder
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
                $withdrawalAmount = 50000;

                $bank = BankAccount::where('user_id', $item->user_id)->first();
                Withdrawal::create([
                    'terapis_id' => $item->id,
                    'jumlah' => $withdrawalAmount,
                    'tanggal' => now(),
                    'status' => 'success',
                    'created_at' => now(),
                    'updated_at' => now(),
                    'bank_accounts_id' => $bank->id
                ]);
                
                // kurangi saldo
                $existingSaldo = Saldo::where('terapis_id', $item->id)->value('saldo');
                $newSaldo = $existingSaldo - $withdrawalAmount;

                // update saldo terapis
                Saldo::updateOrCreate(
                    ['terapis_id' => $item->id],
                    ['saldo' => $newSaldo, 'updated_at' => now()]
                );
        }
        DB::commit();
    }
}