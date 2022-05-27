<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AccomodationService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodation_service', function (Blueprint $table) {
            $table->bigIncrements('accServId');
            $table->bigInteger('accId')->unsigned();;
            $table->foreign('accId')->references('accId')->on('accomodations');
            $table->bigInteger('serviceId')->unsigned();;
            $table->foreign('serviceId')->references('serviceId')->on('services');
            
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
        Schema::dropIfExists('accomodation_service');
    }
}
