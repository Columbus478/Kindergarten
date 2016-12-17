<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Diaries', function (Blueprint $table) {
            $table->bigIncrements('DiaryID');
            $table->dateTime('DiaryDateTime')->nullable();
            $table->bigInteger('BabyID')->unsigned();
            $table->string('Detail',2000)->nullable();
            $table->string('Notice',2000)->nullable();
            $table->tinyInteger('Read')->nullable();
            $table->string('ImageList',4000)->nullable();
            $table->tinyInteger('Status')->nullable();

          
            $table->foreign('BabyID')->references('BabyID')->on('Babies');
        });

        // Schema::table('Diaries', function( Blueprint $table) {
        //     $table->foreign('BabyID')->references('BabyID')->on('Babies');
        //      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Diaries');
    }
}
