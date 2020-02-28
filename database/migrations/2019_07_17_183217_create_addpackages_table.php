<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddpackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addpackages', function (Blueprint $table) {
            $table->bigIncrements('package_id');
            $table->unsignedBigInteger('city_id');
            $table->string('curency');
            $table->integer('displayamount');
            $table->string('tourcode');
            $table->date('validfrom');
            $table->date('validto');
            $table->string('packagetitle');
            $table->string('activitytype');
            $table->string('pkgimg1');
            $table->string('pkgimg2');
            $table->string('pkgimg3');
            $table->string('pkgimg4');
            $table->string('pkgimg5');
            $table->text('highlight');
            $table->text('itinerary');
            $table->text('inclusion');
            $table->text('exclusion');
            $table->text('cancellationplicy')->nullable();
            // $table->text('remark');            
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
        Schema::dropIfExists('addpackages');
    }
}
