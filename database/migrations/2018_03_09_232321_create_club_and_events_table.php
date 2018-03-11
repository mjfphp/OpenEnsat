<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubAndEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_and_events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_club');
            $table->integer('id_evt');
            $table->timestamps();

            $table->foreign('id_club')->references('id_club')->on('clubs');
            $table->foreign('id_evt')->references('id_evt')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('club_and_events');
    }
}
