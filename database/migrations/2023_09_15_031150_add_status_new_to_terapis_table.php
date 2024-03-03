<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusNewToTerapisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('terapis', function (Blueprint $table) {
            $table->enum('status', ['active', 'inactive', 'pending', 'registered', 'interview', 'rejected', 'suspended'])->default('active')->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('terapis', function (Blueprint $table) {
            //
        });
    }
}
