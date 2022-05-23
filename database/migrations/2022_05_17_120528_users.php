<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            $table->bigIncrements('userId');
            $table->string('role', 10)-> default('student');
            $table->string('name');
            $table->string('surname');
            $table->string('username', 20);
            $table->string('password');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            
            /*Genera la colonna remember token, che attiva il meccanismo di login persistente*/
            $table->rememberToken();
            
            /*Il metodo timeatamps() genera le due colonne nella tabella created_at e update_at*/
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
        Schema::dropIfExists('users');
    }
}
