<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labreports', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->string('patient_nic');
            $table->string('date');
            $table->string('test_id');
            $table->string('test_name');
            $table->string('test_result_id');
            $table->string('test_result_component');
            $table->string('test_result_diagnosis');
            $table->string('special_note');
            $table->string('signature_1');
            $table->string('signature_2');
            $table->string('signature_3');
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
        Schema::dropIfExists('labreports');
    }
}
