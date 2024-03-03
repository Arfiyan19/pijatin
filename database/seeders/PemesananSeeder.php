<?php

namespace Database\Seeders;

use App\Models\Pemesanan;
use App\Models\DetailPemesanan;
use App\Models\BankAccount;
use App\Models\Jadwal;
use App\Models\Layanan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemesananSeeder extends Seeder
{

    public function run()
    {
        DB::beginTransaction();
        $I = 0;
        for ($i = 0; $i < 10; $i++) {
            $I++;

            
            //random Number
            $randomPemesanan = rand(1, 3);
            $randomMetode = rand(0, 1);
            $randomJadwal = rand(2, 5);
            $randomCustomer = rand(1, 10);

            //layanan id
            $layanan_id = rand(1,5);               
            if($randomPemesanan == 3){
                $randomTerapis1 = rand(1, 10);
                $randomTerapis2 = rand(1, 10);
                $randomTerapis3 = rand(1, 10);

                $namaPemesan1 = 'customer ' . $randomCustomer;
                $namaPemesan2 = 'ayah customer' . $randomCustomer;
                $namaPemesan3 = 'ibu customer' . $randomCustomer;
            }else if($randomPemesanan == 2){
                $randomTerapis1 = rand(1, 10);
                $randomTerapis2 = rand(1, 10);
                $randomTerapis3 = null;
                
                $namaPemesan1 = 'customer ' . $randomCustomer;
                $namaPemesan2 = 'ayah customer' . $randomCustomer;
                $namaPemesan3 = null;
            }else if($randomPemesanan == 1){
                $randomTerapis1 = rand(1, 10);
                $randomTerapis2 = null;
                $randomTerapis3 = null;

                $namaPemesan1 = 'customer ' . $randomCustomer;
                $namaPemesan2 = null;
                $namaPemesan3 = null;
            }

            // Set $metode_pembayaran berdasarkan random numberMetode
            $metode_pembayaran = $randomMetode == 0 ? 'Cash' : 'Transfer Bank';

            // Set random status_pembayaran
            $status_pembayaran = [
                'Dalam Proses',
                'Pembayaran Sukses',
                'Pembayaran Gagal',
                'Uang Kembali',
            ];
                $randomStatusPembayaranIndex = array_rand($status_pembayaran);
                $randomStatusPembayaran = $status_pembayaran[$randomStatusPembayaranIndex];

            //Set status pemesanan Berdasarkan status pembayaran
            if( $randomStatusPembayaran == 'Pembayaran Gagal' || $randomStatusPembayaran == 'Uang Kembali'){
                $status_pemesanan = 'Batal';
            }else if( $randomStatusPembayaran == 'Dalam Proses'){
                $status_pemesanan = 'Masuk';
            }else{
                $status_pemesanan = 'Sukses';
            }

            // Set waktu_mulai selalu kelipatan menit 30
            $startTime = strtotime('07:00:00');
            $endTime = strtotime('17:00:00');
            $interval = 30 * 60; // 30 minutes in seconds
            $randomIntervals = rand(0, ($endTime - $startTime) / $interval);
            $randomTimestamp = $startTime + ($randomIntervals * $interval);

            // Konvert timestamp to a formatted time
            $waktu_mulai = date('H:i:s', $randomTimestamp);

            // konvert ke DateTime object
            $waktu_mulai = \Carbon\Carbon::createFromTimestamp($randomTimestamp);

            //  waktu_selesai = waktu mulai + berdasarkan jenis layanan
            switch ($layanan_id) {
                case "2":
                    $waktu_selesai = $waktu_mulai->copy()->addHours(1)->addMinutes(30);
                    break;
                case "3":
                    $waktu_selesai = $waktu_mulai->copy()->addHours(2);
                    break;
                case "4":
                    $waktu_selesai = $waktu_mulai->copy()->addHours(2)->addMinutes(30);
                    break;
                case "5":
                    $waktu_selesai = $waktu_mulai->copy()->addHours(3);
                    break;
                default:
                    $waktu_selesai = $waktu_mulai->copy()->addHours(1);
            }

            for ($j = 1; $j <= 3; $j++) {
                $randomTambahan = rand(0, 1);
                ${"layanan_tambahan_" . $j} = ($j <= $randomPemesanan) ? (($randomTambahan == 1) ? rand(7, 10) : null) : null;
            }
            
            // Ambil harga layanan_tambahan
            $harga_layanan_tambahan_1 = ($layanan_tambahan_1 !== null) ? Layanan::where('id', $layanan_tambahan_1)->value('harga') : 0;
            $harga_layanan_tambahan_2 = ($layanan_tambahan_2 !== null) ? Layanan::where('id', $layanan_tambahan_2)->value('harga') : 0;
            $harga_layanan_tambahan_3 = ($layanan_tambahan_3 !== null) ? Layanan::where('id', $layanan_tambahan_3)->value('harga') : 0;
            
            

            //total pembayaran pemesanan
            if ($layanan_id == 2) {
                if ($randomTambahan == 0) {
                    $total_bayar = 150000 * $randomPemesanan;
                } else {
                    $total_bayar = 150000 * $randomPemesanan + $harga_layanan_tambahan_1 + $harga_layanan_tambahan_2 + $harga_layanan_tambahan_3 ;
                }
            } elseif ($layanan_id == 3) {
                if ($randomTambahan == 0) {
                    $total_bayar = 200000 * $randomPemesanan;
                } else {
                    $total_bayar = 200000 * $randomPemesanan + $harga_layanan_tambahan_1 + $harga_layanan_tambahan_2 + $harga_layanan_tambahan_3;
                }
            } elseif ($layanan_id == 4) {
                if ($randomTambahan == 0) {
                    $total_bayar = 250000 * $randomPemesanan;
                } else {
                    $total_bayar = 250000 * $randomPemesanan + $harga_layanan_tambahan_1 + $harga_layanan_tambahan_2 + $harga_layanan_tambahan_3;
                }
            } elseif ($layanan_id == 5) {
                if ($randomTambahan == 0) {
                    $total_bayar = 300000 * $randomPemesanan;
                } else {
                    $total_bayar = 300000 * $randomPemesanan + $harga_layanan_tambahan_1 + $harga_layanan_tambahan_2 + $harga_layanan_tambahan_3;
                }
            } elseif ($layanan_id == 6) {
                if ($randomTambahan == 0) {
                    $total_bayar = 200000 * $randomPemesanan;
                } else {
                    $total_bayar = 200000 * $randomPemesanan + $harga_layanan_tambahan_1 + $harga_layanan_tambahan_2 + $harga_layanan_tambahan_3;
                }
            } else {
                if ($randomTambahan == 0) {
                    $total_bayar = 100000 * $randomPemesanan;
                } else {
                    $total_bayar = 100000 * $randomPemesanan + $harga_layanan_tambahan_1 + $harga_layanan_tambahan_2 + $harga_layanan_tambahan_3;
                }
            }
            

            $pemesanan = Pemesanan::create([
                'customer_id' => $randomCustomer,
                'terapis_id_1' => $randomTerapis1,
                'terapis_id_2' => $randomTerapis2,
                'terapis_id_3' => $randomTerapis3,
                'nama_pemesan_1' => $namaPemesan1,
                'nama_pemesan_2' => $namaPemesan2,
                'nama_pemesan_3' => $namaPemesan3,
                'tanggal_pemesanan' => now(),
                'tanggal_pembayaran' => now()->addDay(),
                'total_bayar' => $total_bayar,
                'metode_pembayaran' => $metode_pembayaran,
                'status_pembayaran' => $randomStatusPembayaran,
                'status_pemesanan' => $status_pemesanan,
                'catatan' => 'catatan' . $I,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DetailPemesanan::create([
                'pemesanan_id' => $pemesanan->id,
                'layanan_id' => $layanan_id,
                'layanan_tambahan_1' => $layanan_tambahan_1,
                'layanan_tambahan_2' => $layanan_tambahan_2,
                'layanan_tambahan_3' => $layanan_tambahan_3,
                'jumlah' => $randomPemesanan,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Jadwal::create([
                'pemesanan_id' => $pemesanan->id,
                'tanggal' => now()->addDay($randomJadwal),
                'waktu_mulai' => $waktu_mulai->format('H:i:s'),
                'waktu_selesai' => $waktu_selesai->format('H:i:s'),
            ]);
        }
        DB::commit();
    }
}