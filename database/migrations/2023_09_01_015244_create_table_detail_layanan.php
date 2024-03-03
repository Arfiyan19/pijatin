<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDetailLayanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_detail_layanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_terapis');
            $table->unsignedBigInteger('id_layanan');
            $table->timestamps();
            // foreign key
            $table->foreign('id_terapis')->references('id')->on('terapis')->onDelete('cascade');
            $table->foreign('id_layanan')->references('id')->on('layanan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_detail_layanan');
    }
}
