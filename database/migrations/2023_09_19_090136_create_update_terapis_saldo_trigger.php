<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateUpdateTerapisSaldoTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER tr_deposit_after_insert
            AFTER UPDATE ON deposits FOR EACH ROW
            BEGIN
                DECLARE available_balance INT;

                -- Cek saldo tersedia dalam tabel saldo
                SELECT saldo INTO available_balance
                FROM saldo
                WHERE terapis_id = NEW.terapis_id;

                IF available_balance IS NULL THEN
                    -- Jika saldo tidak tersedia, insertkan data saldo baru hanya jika status adalah "success"
                    IF NEW.status = "success" THEN
                        INSERT INTO saldo (terapis_id, saldo)
                        VALUES (NEW.terapis_id, NEW.jumlah);
                    END IF;
                ELSE
                    -- Jika saldo tersedia, update saldo terapis hanya jika status adalah "success"
                    IF NEW.status = "success" THEN
                        UPDATE saldo
                        SET saldo = saldo + NEW.jumlah
                        WHERE terapis_id = NEW.terapis_id;
                    END IF;
                END IF;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_terapis_saldo');
    }
}
