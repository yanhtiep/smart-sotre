<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qty');
            $table->double('privce');
            $table->double('amount');
            $table->string('type');
            $table->integer('user_id')->unsigned();
            $table->integer('stock_id')->unsigned();
            $table->integer('payment_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             $table->foreign('stock_id')->references('id')->on('stocks')->onDelete('cascade');
              $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
            $table->timestamps();
             $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('carts');
    }
}
