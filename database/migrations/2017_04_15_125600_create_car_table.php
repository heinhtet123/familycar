<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brand_id');
            $table->integer('user_id');
            $table->integer('model_id');
            $table->integer('type_id');
            $table->boolean('status');
            $table->date('end_bidding_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('car');
    }
}
