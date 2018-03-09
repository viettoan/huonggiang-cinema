<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCinemaSystemIdAndCityIdCinemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cinemas', function (Blueprint $table) {
            $table->integer('cinema_system_id')->unsigned()->after('id');
            $table->integer('city_id')->unsigned()->after('cinema_system_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cinemas', function (Blueprint $table) {
            $table->dropColumn('cinema_system_id');
            $table->dropColumn('city_id');            
        });
    }
}
