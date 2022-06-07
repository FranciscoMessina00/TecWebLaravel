<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class AccomodationStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodation_student', function (Blueprint $table) {
            $table->bigIncrements('accStudId');
            $table->bigInteger('userId')->unsigned();
            $table->foreign('userId')->references('userId')->on('users');
            $table->bigInteger('accId')->unsigned();
            $table->foreign('accId')->references('accId')->on('accomodations');
            $table->string('relationship');
            $table->dateTime('dateOption')->default(Carbon::now()->toDateTimeString());
            $table->dateTime('dateAssign')->default(Carbon::now()->toDateTimeString());
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
        Schema::dropIfExists('accomodations_students');
    }
}
