<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BankAccount;
use App\Models\BankFinance;
use Illuminate\Support\Facades\DB;

class BankAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //nama bank
        $namaBank = [
            'BCA',
            'BNI',
            'BTN',
            'BRI',
            'MANDIRI',
            'OCBC',
            'Danamon',
            'BSI',
            'CIMB NIAGA',
            'PANIN',
        ];
        $randomBankIndex = array_rand($namaBank);
        $randomBank = $namaBank[$randomBankIndex];

        DB::beginTransaction();
        $I = 0;
        for ($i = 3; $i < 13; $i++) {
            $I++;
            //nomor rekening
            $nomor_rekening = str_pad($i, 15, '0', STR_PAD_LEFT);
            
            //bank account terapis
            BankAccount::create([
                'user_id' => $i,
                'nomor_rekening' => $nomor_rekening,
                'nama_bank' => $randomBank,
                'nama_pemilik' => 'customer' . $I,
            ]);
        }
        $I = 0;
        for ($i = 14; $i < 24; $i++) {
            $I++;

            //nomor rekening
            $nomor_rekening = str_pad($i, 15, '0', STR_PAD_LEFT);

            $randomBankIndex = array_rand($namaBank);
            $randomBank = $namaBank[$randomBankIndex];
            
            //bank account customer
            BankAccount::create([
                'user_id' => $i,
                'nomor_rekening' => $nomor_rekening,
                'nama_bank' => $randomBank,
                'nama_pemilik' => 'terapis' . $I,
            ]);
        }

        for ($i = 0; $i < 3; $i++) {

            //nomor rekening
            $nomor_rekening = str_pad($i, 15, '0', STR_PAD_LEFT);

            $randomBankIndex = array_rand($namaBank);
            $randomBank = $namaBank[$randomBankIndex];
            
            //bank account customer
            BankFinance::create([
                'logo' => $randomBank . '.png',
                'no_rek' => $nomor_rekening,
                'bank' => $randomBank,
                'nama_pemilik' => 'Finance',
            ]);
        }

        DB::commit();
    }
}
