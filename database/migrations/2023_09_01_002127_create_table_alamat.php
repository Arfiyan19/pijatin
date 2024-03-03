<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAlamat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_alamat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('kecamatan');
            $table->string('kode_pos');
            $table->string('alamat_lengkap');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->timestamps();
            //foreign key
        });
        Schema::table('table_alamat', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_alamat');
    }
}
