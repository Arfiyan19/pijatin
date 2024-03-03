<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelCabang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_cabang', function (Blueprint $table) {
            $table->id();
            $table->string('kota');
            $table->string('provinsi');
            $table->date('tanggal_berdiri');
            $table->enum('status', ['aktif', 'tidak aktif']);
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabel_cabang');
    }
}
