<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuForClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

         Schema::create('MenuForClass', function (Blueprint $table) {
            $table->bigInteger('MenuID'); 
            $table->bigInteger('ClassID');  
            $table->primary(array('MenuID', 'ClassID'));         
        });

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('MenuForClass');
    }
}
