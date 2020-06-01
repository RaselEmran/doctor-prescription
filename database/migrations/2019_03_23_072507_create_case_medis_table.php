<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseMedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_medis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pa_id')->nullabe();
            $table->string('medicine_name')->nullabe();
            $table->string('medicine_type');
            $table->string('medicine_qty')->nullabe();
            $table->string('instruction')->nullabe();
            $table->string('meal')->nullabe();
            $table->string('days')->nullabe();
            $table->string('date')->nullabe();


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
        Schema::dropIfExists('case_medis');
    }
}
