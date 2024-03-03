<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetailLayanan;

class DetailLayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id_terapis' => 1,
                'id_layanan' => 1,
            ],
            [
                'id_terapis' => 1,
                'id_layanan' => 2,
            ],
            [
                'id_terapis' => 1,
                'id_layanan' => 3,
            ],
            [
                'id_terapis' => 2,
                'id_layanan' => 2,
            ],
            [
                'id_terapis' => 2,
                'id_layanan' => 3,
            ],
            [
                'id_terapis' => 3,
                'id_layanan' => 3,
            ],
            [
                'id_terapis' => 3,
                'id_layanan' => 4,
            ],
            [
                'id_terapis' => 4,
                'id_layanan' => 4,
            ],
            [
                'id_terapis' => 4,
                'id_layanan' => 5,
            ],
        ];

        foreach ($data as $key => $value) {
            DetailLayanan::create($value);
        }
    }
}
