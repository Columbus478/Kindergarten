<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Classes', function (Blueprint $table) {
            $table->bigIncrements('ClassID');
            $table->string('ClassName',50);
            $table->string('Description',200)->nullable();
            $table->string('LinkIPCam',2000)->nullable();
            $table->bigInteger('SchoolId')->unsigned()->nullable();
            $table->tinyInteger('Status')->nullable();
            $table->engine = 'InnoDB';
            
        });

         Schema::table('Classes', function( Blueprint $table) {
            $table->foreign('SchoolId')->references('SchoolId')->on('Schools') ->onDelete('cascade');

            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Classes');
    }
}
