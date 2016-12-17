<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Schools', function (Blueprint $table) {
            $table->bigIncrements('SchoolID');
            $table->string('SchoolName',500);
            $table->string('Email',50);
            $table->string('Address',500)->nullable();
            $table->string('Website',500)->nullable();            
            $table->string('Phone',15)->nullable();
            $table->string('ContactName',30)->nullable();
            $table->string('ContactPhone',15);
            $table->string('Password',60);
            $table->string('Logo',2000)->nullable();
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
        Schema::drop('Schools');
    }
}
