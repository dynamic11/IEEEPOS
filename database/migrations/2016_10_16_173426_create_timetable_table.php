<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimetableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timetable', function (Blueprint $table) {
            $table->increments('id');
            $table->string('day');
            $table->string('shift_time');
            $table->integer('volunteerID1')->unsigned()->nullable();
            $table->integer('volunteerID2')->unsigned()->nullable();
            $table->integer('volunteerID3')->unsigned()->nullable();
        });

        Schema::table('timetable', function($table) {
          $table->foreign('volunteerID1')->references('id')->on('volunteers');
          $table->foreign('volunteerID2')->references('id')->on('volunteers');
          $table->foreign('volunteerID3')->references('id')->on('volunteers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule');
    }
}
