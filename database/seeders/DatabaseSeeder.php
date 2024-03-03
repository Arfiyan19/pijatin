<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Finance;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            super_adminsSeeder::class,
            AdminSeeder::class,
            CustomersSeeder::class,
            FinanceSeeder::class,
            LayananSeeder::class,
            TerapisSeeder::class,
            AlamatSeeder::class,
            DetailLayananSeeder::class,
            PemesananSeeder::class,
            BankAccountsSeeder::class,
            BanksTableSeeder::class,
            RefundSeeder::class,
            DepositSeeder::class,
            WithdrawalSeeder::class,
            SaldoSeeder::class,
        ]);
    }
    
}
