<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefundTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refund', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pemesanan_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('bank_accounts_id');
            $table->integer('jumlah');
            $table->enum('status_refund', ['Menunggu','Selesai'])->default('Menunggu');
            $table->timestamps();
            
            // Definisi foreign key untuk customer_id , pemesanan_id dan bank_accounts_id
            $table->foreign('pemesanan_id')->references('id')->on('pemesanan')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('bank_accounts_id')->references('id')->on('bank_accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refund');
    }
}
