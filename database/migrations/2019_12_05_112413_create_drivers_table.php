<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('phone2')->unique()->nullable();
            $table->string('truck_plate');
            $table->string('truck_plate_image');
            $table->string('identification');
            $table->string('identification_image');
            $table->double('balance')->default(0);
            $table->string('current_lat')->nullable();
            $table->string('current_lng')->nullable();
            $table->integer('available')->default(0);
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
        Schema::dropIfExists('drivers');
    }
}
