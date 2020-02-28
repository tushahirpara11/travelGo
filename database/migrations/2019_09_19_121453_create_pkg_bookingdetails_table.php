<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePkgBookingdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pkg_bookingdetails', function (Blueprint $table) {
            $table->bigIncrements('BkgId');
            $table->string('Name');
            $table->string('User_name');
            $table->unsignedBigInteger('package_id');
            $table->string('TourName');
            $table->string('TourCode');
            $table->date('Traveldate');
            $table->integer('Adult');
            $table->integer('Child');
            $table->float('Price');
            $table->string('Currency');
            $table->string('Status');            
            $table->foreign('package_id')->references('package_id')->on('addpackages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pkg_bookingdetails');
    }
}
