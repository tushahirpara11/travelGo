<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_logins', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('mobileno');            
            $table->string('email');
            $table->string('cityname');            
            $table->string('username');
            $table->string('password');
            $table->boolean('isactive');            
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_logins');
    }
}
