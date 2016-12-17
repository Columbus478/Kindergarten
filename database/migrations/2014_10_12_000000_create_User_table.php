<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('User', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->string('email')->unique();
            $table->string('city');
            $table->string('sex');
            $table->string('username');
            $table->string('password');
            $table->boolean('active')->default(0);
            $table->string('confirmToken');
            $table->rememberToken();
            $table->timestamps();
            $table->dateTime('last_login')->nullable();
            $table->integer('activeUser');
            $table->string('profiles');
            $table->boolean('agree')->default(0);
            $table->tinyInteger('social')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('User');
    }
}
