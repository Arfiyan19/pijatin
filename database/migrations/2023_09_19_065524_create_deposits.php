<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeposits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('terapis_id');
            $table->integer('jumlah');
            $table->string('bukti_transfer')->nullable();
            $table->datetime('tanggal');
            $table->enum('status', ['pending', 'success', 'failed'])->default('pending');
            $table->foreign('terapis_id')->references('id')->on('terapis')->onDelete('cascade');
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
        Schema::dropIfExists('deposits');
    }
}
