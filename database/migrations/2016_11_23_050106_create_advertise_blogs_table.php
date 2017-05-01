<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertiseBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertise_blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('advertise_id')->unsigned();
            $table->integer('blog_id')->unsigned();
            $table->foreign('advertise_id')->references('id')->on('advertises')->onDelete('cascade');
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
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
        Schema::drop('advertise_blogs');
    }
}
