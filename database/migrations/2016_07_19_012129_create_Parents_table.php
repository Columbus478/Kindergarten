<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Parents', function (Blueprint $table) {
            $table->bigIncrements('ParentID');
            $table->string('ParentName',30);
            $table->string('Address',200)->nullable();
            $table->string('Phone',15)->nullable();
            $table->string('Email',60);
            $table->string('Password',50);
            $table->string('FacebookId',50)->nullable();
            $table->string('SkypeId',50)->nullable();
            $table->date('BirthDate')->nullable();            
            $table->tinyInteger('Status')->nullable();
            $table->dateTime('LastLogon')->nullable();
            $table->bigInteger('SchoolID')->unsigned();  
            
            $table->foreign('SchoolID')->references('SchoolID')->on('Schools');
            
            });

        // Schema::table('Parents', function( Blueprint $table) {
        //     $table->foreign('SchoolID')->references('SchoolID')->on('Schools');
        //      }); 

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Parents');
    }
}
