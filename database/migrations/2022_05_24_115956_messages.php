<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Messages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message', function(Blueprint $table)
        {
            $table->bigIncrements('id_message');
            $table->bigInteger('idMittente')->unsigned();
            $table->foreign('idMittente')->references('userId')->on('users');
            $table->bigInteger('idDestinatario')->unsigned();
            $table->foreign('idDestinatario')->references('userId')->on('users');
            $table->string('testo');
            
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
        //
    }
}
