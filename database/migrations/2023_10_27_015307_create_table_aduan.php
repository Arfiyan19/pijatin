<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAduan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_aduan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelapor_id');
            $table->unsignedBigInteger('terlapor_id');
            $table->enum('tipe_pengguna', ['Terpais', 'Customer']);
            $table->string('alasan');
            $table->string('keterangan');
            $table->foreign('pelapor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('terlapor_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('table_aduan');
    }
}
