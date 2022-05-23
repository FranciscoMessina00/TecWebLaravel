<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Accomodations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodations', function(Blueprint $table)
        {
            $table->bigIncrements('accId');
            $table->bigInteger('userId')->unsigned();
            $table->foreign('userId')->references('userId')->on('users');
            $table->string('name');
            $table->string('location');
            $table->string('description');
            $table->integer('tipology');
            $table->integer('dimBedroom');
            $table->integer('dimAppartment');
            $table->integer('rooms');
            $table->integer('totBed');
            $table->integer('totBedRoom');
            $table->integer('ageMax');
            $table->integer('ageMin');
            $table->float('price');
            $table->integer('requests');
            $table->boolean('state');
            $table->timestamp('dateOffer');
            $table->timestamp('dateBooking');
            $table->timestamp('dateStart');
            $table->timestamp('dateFinish');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accomodations');
    }
}
