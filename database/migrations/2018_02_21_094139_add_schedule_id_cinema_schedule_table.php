<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddScheduleIdCinemaScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cinema_schedule', function (Blueprint $table) {
            $table->integer('schedule_id')->unsigned()->after('movie_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cinema_schedule', function (Blueprint $table) {
            $table->dropColumn('schedule_id');
        });
    }
}
