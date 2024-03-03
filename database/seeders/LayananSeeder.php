<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Layanan;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$data layanan 
        $data_layanan = [
            'Full Body Massage',
            'Hot Stone Massage',
            'Thai Massage',
            'Deep tissue Massaage',
            'Swedish Massage',
            'Tradisional Massage',
        ];
        
        //layanan tambahan
        $data_layanan_tambahan = [
            'Kerokan',
            'Lulur',
            'Totok Wajah',
            'Refleksi',
        ];
        $data_harga = [
            100000,
            150000,
            200000,
            250000,
            300000,
            200000,
        ];

        $data_durasi = [
            60,
            90,
            120,
            150,
            180,
            150,
        ];

        $data_deskripsi = [
            'Rasakan harmoni menyeluruh dalam tubuh Anda dengan layanan Full Body Massage kami. Terapis berlisensi kami akan memberikan pijatan lembut namun mendalam dari ujung kepala hingga ujung kaki, membantu mengurangi ketegangan otot dan meningkatkan sirkulasi darah.',
            'Nikmati sensasi hangat yang menyelubungi tubuh Anda dengan Hot Stone Massage. Batu-batu pijat yang dipanaskan secara hati-hati ditempatkan pada titik-titik vital, membantu meredakan ketegangan otot dan memberikan relaksasi mendalam yang tak tertandingi.',
            'Bawa diri Anda ke tanah eksotis Thailand melalui Thai Massage kami. Gabungan dari pijatan, tekanan jari, dan gerakan perenggangan yoga, layanan ini membantu mengalirkan energi dalam tubuh Anda, meningkatkan fleksibilitas, dan menciptakan perasaan kedamaian.',
            'Untuk Anda yang mencari pemijatan yang lebih intens, layanan Deep Tissue kami adalah pilihan yang sempurna. Teknik yang kuat ini fokus pada lapisan otot dalam, membantu mengurangi nyeri kronis, memulihkan fleksibilitas, dan mengembalikan vitalitas tubuh.',
            'Swedish Massage kami menawarkan kombinasi yang sempurna antara pijatan lembut dan teknik meremas yang lebih dalam. Ini adalah pilihan populer untuk relaksasi umum, membantu mengurangi stres, meningkatkan sirkulasi, dan meremajakan pikiran Anda.',
            'Layanan Tradisional Massage kami menghormati warisan budaya pijat kuno, memberikan Anda pengalaman autentik yang membawa keseimbangan dan keselarasan. Teknik-teknik yang diwariskan secara turun-temurun akan membantu mengatasi ketegangan fisik dan mental.',
        ];

        for ($i = 0; $i < count($data_layanan); $i++) {
            Layanan::create([
                'nama_layanan' => $data_layanan[$i],
                'harga' => $data_harga[$i],
                'durasi' => $data_durasi[$i],
                'deskripsi' => $data_deskripsi[$i],
                'gambar' => 'default.jpg',
                'jenis_layanan' => 'layanan_utama'
            ]);
        }
        for ($i = 0; $i < count($data_layanan_tambahan); $i++) {
            Layanan::create([
                'nama_layanan' => $data_layanan_tambahan[$i],
                'harga' => 50000,
                'durasi' => 30,
                'deskripsi' => $data_layanan_tambahan[$i],
                'gambar' => 'default.jpg',
                'jenis_layanan' => 'layanan_tambahan'
            ]);
        }
    }
}
