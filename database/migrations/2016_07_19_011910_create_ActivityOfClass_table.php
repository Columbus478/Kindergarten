<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityOfClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ActivityOfClass', function (Blueprint $table) {
            $table->bigInteger('ActivityID');
            $table->bigInteger('ClassID');

            $table->primary(array('ActivityID','ClassID'));         
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ActivityOfClass');
    }
}
