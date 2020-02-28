<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomhotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customhotels', function (Blueprint $table) {
            $table->bigIncrements('hotel_id');
            $table->unsignedBigInteger('city_id');
            $table->string('hotel_name');
            $table->string('hotel_address');
            $table->integer('hotel_starCategory');
            $table->string('hotel_Image1');            
            $table->string('hotel_Image2');
            $table->string('hotel_Image3');
            $table->double('hotel_price');
            //$table->timestamps();
            $table->foreign('city_id')->references('city_id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customhotels');
    }
}
