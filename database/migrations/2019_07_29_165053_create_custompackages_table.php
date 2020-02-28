<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustompackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custompackages', function (Blueprint $table) {
            $table->bigIncrements('tour_id');
            $table->string('place_visit');
            $table->string('tour_name');
            $table->string('hotels');
            $table->date('departure_date');
            $table->date('arrival_date');
            $table->integer('adults');
            $table->integer('child');
            $table->integer('days');
            $table->integer('nights');
            $table->string('description');
            $table->string('mode_transport');
            $table->double('tour_price');
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
        Schema::dropIfExists('custompackages');
    }
}
