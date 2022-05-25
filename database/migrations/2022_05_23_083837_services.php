<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Services extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('serviceId');
            $table->bigInteger('accId')->unsigned();
            $table->foreign('accId')->references('accId')->on('accomodations');
            $table->boolean('wifi')->default(false);
            $table->boolean('cucina')->default(false);
            $table->boolean('locRicr')->default(false);
            $table->boolean('bagno')->default(false);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('services');
    }

}
