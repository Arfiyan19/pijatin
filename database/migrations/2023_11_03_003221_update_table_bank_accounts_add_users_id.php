<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableBankAccountsAddUsersId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bank_accounts', function (Blueprint $table) {
            //hapus fk customer_id & terapis_id
            $table->dropForeign(['customer_id']);
            $table->dropColumn('customer_id');
            $table->dropForeign(['terapis_id']);
            $table->dropColumn('terapis_id');

            //tambah atribute user_id
            $table->unsignedBigInteger('user_id')->nullable()->after('id');

            // Definisi foreign key untuk users_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bank_accounts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            $table->unsignedBigInteger('customer_id')->nullable()->after('id');
            $table->unsignedBigInteger('terapis_id')->nullable()->after('customer_id');

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('terapis_id')->references('id')->on('terapis')->onDelete('cascade');        
        });
    }
}
