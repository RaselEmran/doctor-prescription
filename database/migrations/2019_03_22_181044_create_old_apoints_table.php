<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOldApointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('old_apoints', function (Blueprint $table) {
            $table->increments('id');
             $table->string('pa_id');
            $table->string('pat_f_name');
            $table->string('doctor_id');
            $table->string('doc_fee');
            $table->string('ap_email')->nullable();
            $table->string('ap_mobile');
            $table->string('ap_date');
            $table->string('ap_address')->nullable();
            $table->string('ap_type')->nullable();
            $table->string('serial_no');
            $table->string('appointed_by')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('ap_status')->nullable();
            $table->string('problem')->nullable();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
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
        Schema::dropIfExists('old_apoints');
    }
}
