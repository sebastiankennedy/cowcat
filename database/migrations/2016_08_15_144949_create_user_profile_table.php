<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profile', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->string('job');
            $table->string('avatar');
            $table->string('nick_name');
            $table->string('real_name');
            $table->string('province');
            $table->string('city');
            $table->string('address');
            $table->string('skills');
            $table->string('weibo');
            $table->string('github');
            $table->string('twitter');
            $table->string('location');
            $table->string('personal_website');
            $table->text('education');
            $table->text('introduction');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_profile');
    }
}
