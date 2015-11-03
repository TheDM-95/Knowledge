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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->rememberToken();

            $table->string('name');
            $table->string('email')->unique();
            $table->string('facebook_id')->unique()->nullable();

            $table->bigInteger('score');
            
            $table->string('user_name')->unique();
            $table->string('password');
            $table->boolean('is_active')->nullable();
            $table->string('gender');
            $table->string('avatar');
            $table->string('birthdate');
            $table->mediumText('aboutme');
            $table->string('institution');
            $table->string('phone');
            $table->string('facebook');
            $table->string('country');

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
