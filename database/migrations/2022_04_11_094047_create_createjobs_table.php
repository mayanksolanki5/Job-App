<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreatejobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('createjobs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('job_title');
            $table->string('job_description');
            $table->string('location');

            $table->unsignedBigInteger('functional_id');
            $table->foreign('functional_id')->references('id')->on('functionals');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

            $table->string('job_time');
            $table->string('work_from_home');
            $table->string('vacancies');
            $table->string('gender');
            $table->string('minimum_age');
            $table->string('maximum_age');
            $table->string('qualification');
            $table->string('experience');
            $table->string('benefits');
            $table->string('currency');
            $table->string('minimum_salary');
            $table->string('maximum_salary');
            $table->string('organization_name');
            $table->string('about_organization');
            $table->string('contact');
            $table->string('skill');
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
        Schema::dropIfExists('createjobs');
    }
}
