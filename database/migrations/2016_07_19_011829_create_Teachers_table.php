<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Teachers', function (Blueprint $table) {
            $table->bigIncrements('TeacherID');
            $table->string('TeacherName',30);
            $table->string('Address',200)->nullable();
            $table->string('Email',60);
            $table->string('Password',60);
            $table->date('BirthDate')->nullable();
            $table->string('FacebookId',60)->nullable();
            $table->string('SkypeId',60)->nullable();
            $table->bigInteger('ClassID')->unsigned();
            $table->string('PublicInformation',2000)->nullable();
            $table->tinyInteger('Status')->nullable();
            
            $table->foreign('ClassID')->references('ClassID')->on('Classes');
                   
        });

        // Schema::table('Teachers', function( Blueprint $table) {
        //     $table->foreign('ClassID')->references('ClassID')->on('Classes');
        //      }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Teachers');
    }
}
