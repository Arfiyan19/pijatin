<?php

namespace Database\Seeders;

use App\Models\Terapis;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Alamat;

class TerapisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        $daerah = ['sleman', 'bantul', 'kulon progo', 'gunung kidul', 'kota yogyakarta', 'sleman', 'bantul', 'kulon progo', 'gunung kidul', 'kota yogyakarta'];
        // daerah x2
        $I = 0;
        for ($i = 0; $i < 10; $i++) {
            $I++;

            $user = User::create([
                // 'name' => 'customer' . $I,
                'email' => 'terapis' . $I . '@gmail.com',
                'password' => bcrypt('terapis' . $I),
                'role' => 'terapis',
                'email_verified_at' => now(),
            ]);
            Terapis::create([
                'nama' => 'terapis' . $I,
                'jenis_kelamin' => 'Laki-Laki',
                'no_hp' => '081234567' . $I,
                'foto' => 'foto.jpg',
                'nik' => '123456789' . $I,
                'foto_ktp' => 'foto_ktp.jpg',
                'foto_skck' => 'foto_skck.jpg',
                'status' => 'active',
                'tanggal_lahir' => '1999-01-01',
                'tempat_lahir' => 'tempat_lahir' . $I,
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
                //layanan_id
            ]);
            DB::commit();
        }
    }
}
