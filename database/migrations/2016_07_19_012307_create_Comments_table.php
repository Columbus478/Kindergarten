<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Comments', function (Blueprint $table) {
            $table->bigIncrements('CommentID');
            $table->string('Detail',2000)->nullable();
            $table->string('ImageList',4000)->nullable();
            $table->dateTime('CommentDateTime')->nullable();
            $table->bigInteger('DiaryID')->unsigned();          
            $table->string('ReplyName',30)->nullable();
            $table->tinyInteger('Read')->nullable();

            
           $table->foreign('DairyID')->references('DiaryID')->on('Diaries');
        });

         // Schema::table('Comments', function( Blueprint $table) {
         //    $table->foreign('DairyID')->references('DiaryID')->on('Diaries');
         //     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Comments');
    }
}
