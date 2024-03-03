<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUpdateTerapisSaldoTriggerForWithdrawls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER update_saldo_on_withdrawal_success
            AFTER UPDATE ON withdrawals
            FOR EACH ROW
            BEGIN
                DECLARE available_balance INT;

                -- Cek saldo tersedia dalam tabel saldo
                SELECT saldo INTO available_balance
                FROM saldo
                WHERE terapis_id = NEW.terapis_id;

                IF NEW.status = "success" AND OLD.status != "success" THEN
                    -- Ambil jumlah withdrawal yang diupdate
                    SET @withdrawal_amount = NEW.jumlah;
                    SET @terapis_id = NEW.terapis_id;

                    -- Jika saldo tidak mencukupi, batalkan penarikan
                    IF available_balance IS NULL OR available_balance < @withdrawal_amount THEN
                        SIGNAL SQLSTATE "45000"
                        SET MESSAGE_TEXT = "Saldo tidak mencukupi untuk penarikan";
                    ELSE
                        -- Update saldo terapis dengan mengurangkan jumlah withdrawal
                        UPDATE saldo
                        SET saldo = saldo - @withdrawal_amount
                        WHERE terapis_id = @terapis_id;
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
        DB::unprepared('DROP TRIGGER IF EXISTS update_saldo_on_withdrawal_success');
    }
}
