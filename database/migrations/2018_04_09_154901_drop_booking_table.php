<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('bookings');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('movie_id')->unsigned();
            $table->integer('cinema_schedule_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->date('date');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }
}
