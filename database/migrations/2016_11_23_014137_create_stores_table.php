<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('store_name');
            $table->string('contact_person');
            $table->string('contact_tel');
            $table->string('office_phone');
            $table->string('website');
            $table->string('email1');
            $table->string('email2');
            $table->string('address');
            $table->string('slowgan');
            $table->boolean('status');
            $table->string('businese_cert');
            $table->softDeletes();
            $table->timestamps();
            $table->integer('business_type_id')->unsigned();
            $table->integer('staff_range_id')->unsigned();
            $table->integer('revenue_range_id')->unsigned();
            $table->foreign('business_type_id')->references('id')->on('business_types')->onDelete('cascade');
            $table->foreign('staff_range_id')->references('id')->on('staff_ranges')->onDelete('cascade');
            $table->foreign('revenue_range_id')->references('id')->on('revenue_ranges')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stores');
    }
}
