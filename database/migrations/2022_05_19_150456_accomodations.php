<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

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
            $table->bigInteger('imageId')->unsigned()->default('1');
            $table->foreign('imageId')->references('imageId')->on('images');
            $table->string('name');
            $table->integer('tipology');
            $table->string('city');
            $table->string('address');
            $table->longText('description');
            $table->integer('dimBedroom')->nullable();
            $table->integer('dimAppartment')->nullable();
            $table->integer('rooms')->nullable();
            $table->integer('totBeds')->nullable();
            $table->integer('totBedRoom')->nullable();
            $table->integer('ageMax');
            $table->integer('ageMin');
            $table->float('price');
            $table->string('gender')-> default('dont-care');
            $table->dateTime('dateOffer')->default(Carbon::now()->toDateTimeString());;
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
