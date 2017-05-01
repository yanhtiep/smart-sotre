<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('stock_code');
            $table->string('quote_code');
            $table->string('image');
            $table->text('meta_keyword');
            $table->double('reorder_qty');
            $table->text('description');
            $table->integer('review_num');
            $table->integer('rating_num');
            $table->date('expired_date');
            $table->double('min_order_allow');
            $table->double('max_order_allow');
            $table->integer('qty');
            $table->double('cost');
            $table->integer('discount');
            $table->boolean('status');

            $table->integer('category_id')->unsigned();
            $table->integer('currency_id')->unsigned();
            $table->integer('stock_uom_id')->unsigned();
            $table->integer('store_id')->unsigned();
            $table->integer('condition_id')->unsigned();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade');
            $table->foreign('stock_uom_id')->references('id')->on('stock_uoms')->onDelete('cascade');
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->foreign('condition_id')->references('id')->on('conditions')->onDelete('cascade');
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
        Schema::drop('stocks');
    }
}
