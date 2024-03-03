<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Terapis;
use App\Models\BankAccount;
use App\Models\Saldo;
use App\Models\Deposit;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SaldoSeeder extends Seeder
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
            Saldo::create([
                'terapis_id' => $item->id,
                'saldo' => 100000 * $item->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            for ($i = 0; $i < 2; $i++) {
                $depositDate = ($i === 1) ? now()->addDay() : now();
                Deposit::create([
                    'terapis_id' => $item->id,
                    'jumlah' => 50000,
                    'bukti_transfer' => "bukti.png",
                    'tanggal' => $depositDate,
                    'status' => 'success',
                ]);

                $withdrawalDate = ($i === 1) ? now()->addDay() : now();
                $bank = BankAccount::where('user_id', $item->user_id)->first();
                Withdrawal::create([
                    'terapis_id' => $item->id,
                    'jumlah' => 50000,
                    'tanggal' => $withdrawalDate,
                    'status' => 'success',
                    'created_at' => now(),
                    'updated_at' => now(),
                    'bank_accounts_id' => $bank->id
                ]);
            }
        }
        DB::commit();
    }

}
