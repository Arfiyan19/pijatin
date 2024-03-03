<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTablePemesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            // Rename the column 'terapis_id' to 'terapis_id_1' and make it not null
            $table->renameColumn('terapis_id', 'terapis_id_1');

            // Add new columns 'terapis_id_2' and 'terapis_id_3' as nullable
            $table->unsignedBigInteger('terapis_id_2')->nullable()->after('terapis_id');
            $table->unsignedBigInteger('terapis_id_3')->nullable()->after('terapis_id_2');

            // Add new columns 'nama_pemesan_1', 'nama_pemesan_2', and 'nama_pemesan_3' as nullable
            $table->string('nama_pemesan_1')->nullable(false)->after('terapis_id_3');
            $table->string('nama_pemesan_2')->nullable()->after('nama_pemesan_1');
            $table->string('nama_pemesan_3')->nullable()->after('nama_pemesan_2');

            // Definisi foreign key untuk terapis_id 2 dan terapis_id 3
            $table->foreign('terapis_id_2')->references('id')->on('terapis')->onDelete('cascade');
            $table->foreign('terapis_id_3')->references('id')->on('terapis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            // Drop the foreign key constraints for terapis_id_2 and terapis_id_3
            $table->dropForeign(['terapis_id_2']);
            $table->dropForeign(['terapis_id_3']);

            // Remove the added columns 'terapis_id_2' and 'terapis_id_3'
            $table->dropColumn('terapis_id_2');
            $table->dropColumn('terapis_id_3');

            // Remove the added columns 'nama_pemesan_1', 'nama_pemesan_2', and 'nama_pemesan_3'
            $table->dropColumn('nama_pemesan_1');
            $table->dropColumn('nama_pemesan_2');
            $table->dropColumn('nama_pemesan_3');

            // Rename the column 'terapis_id_1' back to 'terapis_id' and make it nullable
            $table->renameColumn('terapis_id_1', 'terapis_id');
        });
    }

}
