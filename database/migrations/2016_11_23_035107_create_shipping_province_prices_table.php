<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingProvincePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_province_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('price');
            $table->text('description');
            $table->string('expected_time');
            $table->string('handling_time');
            $table->integer('to_province_id')->nullable()->unsigned();
            $table->integer('from_province_id')->nullable()->unsigned();
            $table->foreign('to_province_id')->references('id')->on('provinces');
            $table->foreign('from_province_id')->references('id')->on('provinces');
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
        Schema::drop('shipping_province_prices');
    }
}
