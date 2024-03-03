<?php

namespace Database\Seeders;

use App\Models\Terapis;
use Illuminate\Database\Seeder;
use App\Models\Layanan;
use Illuminate\Support\Facades\DB;

class detail_layananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //detail_layanan
        $data_layanan = Layanan::all();
        $data_terapis = Terapis::all();
        //simpan ke detail_layanan
        $id_layanan = [];
        $id_terapis = [];
        foreach ($data_layanan as $layanan) {
            array_push($id_layanan, $layanan->id);
        }
        foreach ($data_terapis as $terapis) {
            array_push($id_terapis, $terapis->id);
        }
        //simpan ke detail_layanan
        for ($i = 0; $i < count($id_layanan); $i++) {
            for ($j = 0; $j < count($id_terapis); $j++) {
                DB::table('table_detail_layanan')->insert([
                    'id_layanan' => $id_layanan[$i],
                    'id_terapis' => $id_terapis[$j],
                ]);
            }
        }
    }
}
