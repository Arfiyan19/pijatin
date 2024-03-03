<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $logo = [
            'bca.png',
            'bni.png',
            'bri.png',
            'mandiri.png',
            'bank_syariah.png',
        ];
        $noRek = [
            '1234567890',
            '0987654321',
            '1231231121',
            '12312312331',
            '12312312312',
            '12312312344'
        ];
        $namaBank = [
            'BCA',
            'BNI',
            'BRI',
            'MANDIRI',
            'BANK SYARIAH',
        ];
        $nama_pemilik = [
            'pijatin-bca',
            'pijatin-bni',
            'pijatin-bri',
            'pijatin-mandiri',
            'pijatin-bank-syariah',
        ];
        //panggil data allfinance
        //looping data allfinance ambil user_id setiap user 1 1 bank
        //db transaksi
        DB::beginTransaction();
        // 1 FINANCE 3 BANK
        $I = 0;
        for ($i = 1; $i <= 5; $i++) {
            DB::table('bank_finances')->insert([
                'logo' => $logo[$I],
                'no_rek' => $noRek[$I],
                'bank' => $namaBank[$I],
                'nama_pemilik' => $nama_pemilik[$I],
            ]);
            $I++;
        }
        DB::commit();
    }
}
