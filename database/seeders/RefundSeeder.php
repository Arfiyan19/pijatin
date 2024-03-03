<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pemesanan;
use App\Models\Refund;
use Illuminate\Support\Facades\DB;

class RefundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = Pemesanan::with('customers.bankAccount')
        ->where('pemesanan.status_pemesanan', 'Batal')
        ->get();

        DB::beginTransaction();
        foreach ($data as $item) {
            if( $item->status_pembayaran == 'Uang Kembali'){
                $status_refund = 'Selesai';
            }else{
                $status_refund = 'Menunggu';
            }
            foreach ($item->customers->bankAccount as $bankAccount) {
                Refund::create([
                    'pemesanan_id' => $item->id,
                    'customer_id' => $item->customer_id,
                    'bank_accounts_id' => $bankAccount->id,
                    'jumlah' => $item->total_bayar,
                    'status_refund' => $status_refund,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        DB::commit();
        }
}
