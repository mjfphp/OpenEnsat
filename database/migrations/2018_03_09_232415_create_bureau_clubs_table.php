<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBureauClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bureau_clubs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_club');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->bigInteger('telephone');
            $table->string('role');
            $table->timestamps();

            $table->foreign('id_club')->references('id_club')->on('clubs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bureau_clubs');
    }
}
