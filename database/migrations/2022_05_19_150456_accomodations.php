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
            $table->integer('tipology');
            $table->string('address');
            $table->string('description');
            $table->integer('dimBedroom')->nullable();
            $table->integer('dimAppartment')->nullable();
            $table->integer('rooms')->nullable();
            $table->integer('totBeds')->nullable();
            $table->integer('totBedRoom')->nullable();
            $table->integer('ageMax');
            $table->integer('ageMin');
            $table->float('price');
            $table->integer('requests')->default(0);
            $table->boolean('state');
            $table->dateTime('dateOffer');
            $table->dateTime('dateBooking');
            $table->dateTime('dateStart');
            $table->dateTime('dateFinish');
            
            $table->timestamps();
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
