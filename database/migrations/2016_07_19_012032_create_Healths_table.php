<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Healths', function (Blueprint $table) {
            $table->bigIncrements('HealthID');
            $table->date('ExamineDate')->nullable();
            $table->string('Height',200)->nullable();
            $table->string('Weight',200)->nullable();
            $table->string('Note',200)->nullable();
            $table->bigInteger('BabyID')->unsigned();
            

           $table->foreign('BabyID')->references('BabyID')->on('Babies');
        });

        // Schema::table('Healths', function( Blueprint $table) {
        //      $table->foreign('BabyID')->references('BabyID')->on('Babies');
        //     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Healths');
    }
}
