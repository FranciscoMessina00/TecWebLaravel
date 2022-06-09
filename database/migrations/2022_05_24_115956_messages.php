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
        Schema::create('messages', function(Blueprint $table)
        {
            $table->bigIncrements('messageId');
            $table->bigInteger('senderId')->unsigned();
            $table->foreign('senderId')->references('userId')->on('users');
            $table->bigInteger('recipientId')->unsigned();
            $table->foreign('recipientId')->references('userId')->on('users');
            $table->longText('text');
            
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
        Schema::dropIfExists('messages');
    }
}
