<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('email', 50)->unique()->index();
            $table->string('password', 60);
            $table->string('gender', 6);
            $table->dateTime('dateOfBirth');
            $table->integer('grade')->nullable();
            $table->string('photoUrl')->nullable();
            $table->string('course')->index();
            $table->integer('season')->index();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
