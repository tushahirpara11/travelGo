<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomplacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customplaces', function (Blueprint $table) {
            $table->bigIncrements('place_id');
            $table->unsignedBigInteger('city_id');
            $table->string('place_name');
            $table->string('place_timing_details');
            $table->string('place_Image1');
            $table->string('place_Image2');
            $table->double('place_price');
            $table->foreign('city_id')->references('city_id')->on('cities');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customplaces');
    }
}
