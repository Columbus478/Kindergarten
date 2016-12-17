<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBabiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Babies', function (Blueprint $table) {
            $table->bigIncrements('BabyID');
            $table->string('BabyName',30);
            $table->string('BabyNickName',30)->nullable();
            $table->date('BirthDate');
            $table->string('images',200)->nullable();
            $table->bigInteger('ClassID')->unsigned();
            $table->bigInteger('ParentID')->unsigned();
            $table->char('Hobby',10)->nullable();
            $table->string('Strenght',2000)->nullable();
            $table->string('Weakness',2000)->nullable();
            $table->tinyInteger('Status')->nullable();
            $table->string('SearchCode',50)->nullable();
            
            $table->foreign('ClassId')->references('ClassId')->on('Classes');
             $table->foreign('ParentID')->references('ParentID')->on('Parents');
           
            });
        
            // Schema::table('Babies', function( Blueprint $table) {
            //  $table->foreign('ClassId')->references('ClassId')->on('Classes');
            //  $table->foreign('ParentID')->references('ParentID')->on('Parents');
            // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Babies');
    }
}
