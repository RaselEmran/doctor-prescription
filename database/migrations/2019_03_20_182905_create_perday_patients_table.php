<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerdayPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perday_patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('doc_id');
            $table->string('place');
            $table->string('address');
            $table->string('strat_time');
            $table->string('end_time');
            


            $table->string('total');
            $table->string('date');
            $table->string('day');
            $table->string('cancel');
            $table->string('status');
            

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
        Schema::dropIfExists('perday_patients');
    }
}
