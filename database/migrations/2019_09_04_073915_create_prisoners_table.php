<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrisonersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prisoners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('case_number');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('soc_number');
            $table->string('arrest_number');
            $table->string('address');
            $table->string('state');
            $table->string('postal_code');
            $table->string('phone');
            $table->string('identification_number');
            $table->string('marital_status');
            $table->string('date_of_birth');
            $table->string('sex');
            $table->string('ethnicity');
            $table->string('height');
            $table->string('weight');
            $table->string('place_of_birth');
            $table->string('employer_name')->nullable();
            $table->string('employer_address')->nullable();
            $table->string('employer_state')->nullable();
            $table->string('employer_postalcode')->nullable();
            $table->string('job_title')->nullable();
            $table->string('appearance');
            $table->string('hair');
            $table->string('eye_color');
            $table->string('bvn');
            $table->string('description_of_complexion');
            $table->string('station');
            $table->string('outcome');
            $table->string('weapon');
            $table->string('personnel');
            $table->string('employer_state');
            $table->string('employer_postalcode');
            $table->string('finger_print')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('prisoners');
    }
}
