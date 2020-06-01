<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('doctor_id');
            $table->string('doctor_name');
            $table->string('patient_name');
            $table->string('pat_id');

            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->string('sex');
            $table->string('date_birth');
            $table->string('blood');
            $table->string('problem');

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
        Schema::dropIfExists('patients');
    }
}
