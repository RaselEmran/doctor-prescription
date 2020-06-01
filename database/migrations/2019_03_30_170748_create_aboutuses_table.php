<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aboutuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('doc_id');
            $table->string('Full_Name');
            $table->string('special');
            $table->string('degree');
            $table->string('experience');
            $table->text('about');
            $table->string('image');



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
        Schema::dropIfExists('aboutuses');
    }
}
