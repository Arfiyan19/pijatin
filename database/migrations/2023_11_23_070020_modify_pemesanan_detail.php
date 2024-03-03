<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyPemesananDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pemesanan_detail', function (Blueprint $table) {
            // Rename existing column
            $table->renameColumn('layanan_tambahan', 'layanan_tambahan_1');

            // Add new columns
            $table->unsignedBigInteger('layanan_tambahan_2')->nullable()->after('layanan_tambahan');
            $table->unsignedBigInteger('layanan_tambahan_3')->nullable()->after('layanan_tambahan_2');

            $table->foreign('layanan_tambahan_2')->references('id')->on('layanan')->onDelete('cascade');
            $table->foreign('layanan_tambahan_3')->references('id')->on('layanan')->onDelete('cascade');
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

            $table->dropForeign(['layanan_tambahan_2']);
            $table->dropForeign(['layanan_tambahan_3']);

            $table->renameColumn('layanan_tambahan_1', 'layanan_tambahan');
            $table->dropColumn('layanan_tambahan_2');
            $table->dropColumn('layanan_tambahan_3');
        });
    }
}
