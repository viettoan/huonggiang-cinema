<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveDayIdCinemaScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cinema_schedule', function (Blueprint $table) {
            $table->dropColumn('day_id');
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
            $table->integer('day_id')->unsigned()->after('movie_id');
        });
    }
}
