<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function(Blueprint $table){
            $table->increments('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('facebook');
            $table->string('google');
            $table->string('twitter');
            $table->string('linkedin');
            $table->text('description');
            $table->string('primaryHome');
            $table->string('secondaryHome');
            $table->date('dob');
            $table->string('avatar');
            $table->string('telephone');
            $table->boolean('isComplete');
            $table->timestamps();
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profiles');
    }
}
