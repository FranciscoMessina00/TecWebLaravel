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
        $table->bigIncrements('servieId');
        $table->bigIncrements('accId');
        $table->foreign('accId')->references('accId')->on('accomodations');
        $table->boolean('wifi');
        $table->boolean('cucina');
        $table->boolean('locRicr');
        $table->boolean('bagno');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
