<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('phone');
            $table->string('address');
            $table->string('profession');
            $table->string('volunteerArea');
            $table->string('whyVolunteer');
            $table->string('goal');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('twitter');
            $table->string('heard');
            $table->string('enjoyedMost');
            $table->string('enjoyedLeast');
            $table->string('language');
            $table->string('channel');
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('volunteers');
    }
}
