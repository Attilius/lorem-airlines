<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('customer_id')->constrained();
            $table->string('booking_reference_id'); // For example: J39F3C
            $table->string('departure_from');
            $table->string('arriving_at');
            $table->date('departure_date');
            $table->date('return_date');
            $table->string('cabin_class');
            $table->string('travel_type');
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
        Schema::dropIfExists('bookings');
    }
};
