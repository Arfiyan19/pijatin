<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use App\Models\Alamat;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
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
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin'
            ]);
            //table SuperAdmin
            Admin::create([
                'nama' => 'Admin',
                'jenis_kelamin' => 'Laki-laki',
                'no_hp' => '081234567890',
                'foto' => 'foto.jpg',
                'nik' => '12345670',
                'foto_ktp' => 'foto_ktp.jpg',
                'user_id' => $user->id,
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2000-01-01',
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
