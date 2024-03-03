<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTolakPemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan_tolak', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pemesanan_id');
            $table->unsignedBigInteger('terapis_id');
            $table->text('alasan');
            $table->date('tanggal_penolakan');
            $table->timestamps();

            $table->foreign('terapis_id')->references('id')->on('terapis')->onDelete('cascade');
            $table->foreign('pemesanan_id')->references('id')->on('pemesanan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanan_tolak');
    }
}
