<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlamatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // buat seeder alamat untuk 12 customer 
        DB::beginTransaction();
        $I = 0;
        $kota = ['KABUPATEN BANTUL', 'KABUPATEN SLEMAN', 'KABUPATEN KULON PROGO', 'KABUPATEN GUNUNG KIDUL', 'KOTA YOGYAKARTA'];
        $kecamatan = ['TEMON', 'SRANDAKAN', 'RONGKOP', 'MINGGIR', 'CANGKRINGAN'];
        $kelurahan = ['SUMBERRAHAYU', 'SUMBERSARI', 'SUMBER AGUNG', 'SUMBERARUM', 'CONDONG CATUR', 'MAGUWOHARJO'];
        for ($i = 0; $i < 23; $i++) {
            $I++;
            DB::table('table_alamat')->insert([
                'user_id' => $I,
                'provinsi' => 'DI YOGYAKARTA',
                'kota' => $kota[rand(0, 4)],
                'kecamatan' => $kecamatan[rand(0, 4)],
                'kelurahan' => $kelurahan[rand(0, 4)],
                'kode_pos' => '12345',
                'alamat_lengkap' => 'Jalan Raya Solooooo' . $I,
                'latitude' => '-7.8949',
                'longitude' => '110.3268',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        DB::commit();
    }
}
