<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('terapis_id');
            $table->date('tanggal_pemesanan');
            $table->datetime('tanggal_pembayaran');
            $table->integer('total_bayar');
            $table->enum('metode_pembayaran', ['Transfer Bank', 'Cash'])->default('Transfer Bank');
            $table->enum('status_pembayaran', ['Pembayaran Sukses', 'Pembayaran Gagal', 'Dalam Proses', 'Uang Kembali'])->default('Dalam Proses');
            $table->enum('status_pemesanan', ['Masuk', 'Batal', 'Sukses'])->default('Masuk');
            $table->string('catatan')->nullable();
            $table->timestamps();

            // Definisi foreign key untuk customer_id dan terapis_id
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('terapis_id')->references('id')->on('terapis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
}
