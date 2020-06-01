<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('roll_id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('type')->nullable();
            $table->string('company')->nullable();
            $table->string('contact')->nullable();
            $table->string('fee')->nullable();
            $table->string('servicing')->nullable();
            $table->string('old_fee')->nullable();
            


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
