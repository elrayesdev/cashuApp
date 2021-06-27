<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            //  table definition
            $table->engine = 'innodb';
            $table->collation = 'utf8mb4_bin';

            // structure
            $table->id();
            $table->string('name');
            $table->string('website')->unique();
            $table->timestamps();

            // foreign keys


            // constrains

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
