<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * This table is a pivot table for [many to many] relationship between flights and bookings tables.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_booking', function (Blueprint $table) {
            $table->integer('flight_id')->unsigned();
            $table->integer('booking_id')->unsigned();
            $table->foreign('flight_id')
                ->references('id')
                ->on('flights')
                ->onDelete('cascade');
            $table->foreign('booking_id')
                ->references('id')
                ->on('bookings')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flight_bookings');
    }
};
