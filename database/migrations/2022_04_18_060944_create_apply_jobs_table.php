<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_jobs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('createjob_id');
            $table->foreign('createjob_id')->references('id')->on('createjobs');

            $table->string('full_name');
            $table->string('number');
            $table->string('current_company');
            $table->string('current_designation');
            $table->string('current_location');
            $table->string('current_salary');
            $table->string('industry');
            $table->string('functional_area');
            $table->string('experience_year');
            $table->string('experience_month');
            $table->string('skill');
            $table->string('reason');

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
        Schema::dropIfExists('apply_jobs');
    }
}
