<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('no_hp');
            $table->string('foto');
            //nik
            $table->string('nik');
            $table->string('foto_ktp');
            $table->string('status')->nullable();
            // Tempat Lahir-
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();
            //user id
            $table->string('alamat');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
        Schema::table('admins', function (Blueprint $table) {
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
        Schema::dropIfExists('admins');
    }
}