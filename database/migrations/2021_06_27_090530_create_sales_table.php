<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            //  table definition
            $table->engine = 'innodb';
            $table->collation = 'utf8mb4_bin';

            // structure
            $table->id();
            $table->decimal('payment',8,2);
            $table->timestamps();


            // foreign keys
            $table->unsignedBigInteger('user_id');

            // constrains
            $table->foreign('user_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
