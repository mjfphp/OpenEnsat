<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeakerInEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speaker_in_events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_evt');
            $table->integer('id_spk');
            $table->timestamps();

            $table->foreign('id_evt')->references('id_evt')->on('events');
            $table->foreign('id_spk')->references('id_spk')->on('speakers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('speaker_in_events');
    }
}
