<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameScheduleIdToRoomIdRoomTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('room_time', function (Blueprint $table) {
            $table->renameColumn('schedule_id', 'room_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('room_time', function (Blueprint $table) {
            $table->renameColumn('room_id', 'schedule_id');
        });
    }
}
