<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddhotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addhotels', function (Blueprint $table) {
            $table->bigIncrements('hotel_master_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('package_id');
            $table->string('hm_name');
            $table->string('hm_address');
            $table->integer('hm_starcategory');
            $table->integer('hm_noofnights');
            $table->string('hm_Image');
            $table->foreign('city_id')->references('city_id')->on('cities');
            $table->foreign('package_id')->references('package_id')->on('addpackages')->onDelete('cascade');
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
        Schema::dropIfExists('addhotels');
    }
}
