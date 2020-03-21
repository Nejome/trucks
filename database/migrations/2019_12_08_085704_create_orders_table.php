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
            $table->bigInteger('truck_id')->unsigned();

            $table->string('customer_phone')->nullable();
            $table->string('shipment_type')->nullable();
            $table->text('shipment_description')->nullable();
            $table->string('shipment_weight');

            $table->string('from_lat');
            $table->string('from_lng');
            $table->string('to_lat');
            $table->string('to_lng');

            $table->double('price');

            $table->integer('status')->default(0) /* waiting: 0, in-progress: 1, complete: 2, canceled: 3 */;

            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('truck_id')->references('id')->on('trucks')->onDelete('cascade');
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
