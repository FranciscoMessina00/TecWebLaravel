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
            $table->bigInteger('mittente')->unsigned();
            $table->foreign('mittente')->references('userId')->on('users');
            $table->bigInteger('destinatario')->unsigned();
            $table->foreign('destinatario')->references('userId')->on('users');
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
