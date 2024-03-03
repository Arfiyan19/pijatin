<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SuperAdmin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Alamat;

class super_adminsSeeder extends Seeder
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
                'email' => 'superadmin@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => 'superadmin'
            ]);
            //table SuperAdmin
            SuperAdmin::create([
                'nama' => 'Super Admin',
                'jenis_kelamin' => 'Laki-laki',
                'no_hp' => '081234567890',
                'foto' => 'foto.jpg',
                'nik' => '1234567890',
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
        // //table User



    }
}
