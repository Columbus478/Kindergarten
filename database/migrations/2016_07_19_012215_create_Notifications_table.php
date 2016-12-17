<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Notifications', function (Blueprint $table) {
            $table->bigIncrements('NotificationID');
            $table->string('Title',200);
            $table->string('Detail',4000)->nullable();
            $table->dateTime('NotificationDateTime')->nullable();
            $table->tinyInteger('Status')->nullable();
            $table->bigInteger('ParentID')->unsigned();
            $table->tinyInteger('Read')->nullable();

            $table->foreign('ParentID')->references('ParentID')->on('Parents');
            });

        // Schema::table('Notifications', function( Blueprint $table) {
        //     $table->foreign('ParentID')->references('ParentID')->on('Parents');
        //      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Notifications');
    }
}
