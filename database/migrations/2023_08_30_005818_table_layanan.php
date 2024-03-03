<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableLayanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_layanan');
            $table->integer('harga');
            $table->integer('durasi');
            $table->string('deskripsi');
            $table->string('gambar');
            $table->enum('jenis_layanan', ['layanan_utama', 'layanan_tambahan']);
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
        Schema::dropIfExists('layanan');
    }
}
