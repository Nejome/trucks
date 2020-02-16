<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('driver_id')->unsigned()->nullable();
            $table->bigInteger('customer_id')->unsigned();
            $table->string('customer_phone')->nullable();
            $table->string('shipment_type')->nullable();
            $table->string('shipment_weight');
            $table->text('shipment_description')->nullable();
            $table->string('from_lat');
            $table->string('from_lng');
            $table->string('to_lat');
            $table->string('to_lng');
            $table->double('price');
            $table->foreign('driver_id')->references('id')->on('drivers');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->integer('status')->default(0) /**/;
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
        Schema::dropIfExists('orders');
    }
}
