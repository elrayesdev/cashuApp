<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivilegeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privilege', function (Blueprint $table) {
            //  table definition
            $table->engine = 'innodb';
            $table->collation = 'utf8mb4_bin';

            // structure
            $table->id();
            $table->timestamps();

            // foreign keys
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('role_id');

            // constrains
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('role_id')->references('id')->on('role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privilege');
    }
}
