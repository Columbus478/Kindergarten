<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Menus', function (Blueprint $table) {
            $table->bigIncrements('MenuId');
            $table->date('MenuDate')->nullable(); 
            $table->string('Breakfast',2000)->nullable(); 
            $table->string('BreakfastSub',200)->nullable();
            $table->string('Lunch',2000)->nullable();
            $table->string('Afternoon',2000)->nullable(); 
            $table->tinyInteger('Status')->nullable();          
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Menus');
    }
}
