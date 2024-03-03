<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Finance;
use Illuminate\Support\Facades\DB;
use App\Models\Alamat;

class FinanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        try {
            //table User
            $user = User::create([
                // 'name' => 'Super Admin',
                'email' => 'finance@gmail.com',
                'password' => bcrypt('123123123'),
                'role' => 'finance',
            ]);
            //table SuperAdmin
            Finance::create([
                'nama' => 'Finance',
                'jenis_kelamin' => 'Laki-laki',
                'no_hp' => '081234567890',
                'foto' => 'default.jpg',
                'nik' => '1267890',
                'foto_ktp' => 'default.png',
                'user_id' => $user->id,
                'status' => 'active',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2000-01-01',
            ]);
            //table_alamat
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
