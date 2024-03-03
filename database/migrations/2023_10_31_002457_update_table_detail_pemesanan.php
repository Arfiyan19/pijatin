<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableDetailPemesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pemesanan_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('layanan_tambahan')->nullable()->after('layanan_id');

            // Definisi foreign key untuk layanan_tambahan
            $table->foreign('layanan_tambahan')->references('id')->on('layanan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pemesanan_detail', function (Blueprint $table) {
            $table->dropForeign(['layanan_tambahan']);
            $table->dropColumn('layanan_tambahan');
        });
    }
}
