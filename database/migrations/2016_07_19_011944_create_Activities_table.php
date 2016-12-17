<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Activities', function (Blueprint $table) {
            $table->bigIncrements('ActivityID');
            $table->dateTime('ActivityDateTime');
            $table->string('Detail',4000);
            $table->tinyInteger('Status');

           
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Activities');
    }
}
