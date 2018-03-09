<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropCinemaScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('cinema_schedule');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('cinema_schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cinema_id')->unsigned();
            $table->integer('movie_id')->unsigned();
            $table->integer('schedule_id')->unsigned();
            $table->timestamps();
        });
    }
}
