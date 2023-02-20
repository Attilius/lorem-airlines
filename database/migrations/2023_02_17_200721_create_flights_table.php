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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('departure_city_name');
            $table->string('departure_location_code');
            $table->string('departure_location_name');
            $table->string('arrival_city_name');
            $table->string('arrival_location_code');
            $table->string('arrival_location_name');
            $table->string('airline_name');
            $table->string('airline_code');
            $table->string('flight_number');
            $table->string('aircraft');
            $table->date('departure_date');
            $table->time('departure_time');
            $table->time('arrival_time');
            $table->string('flight_duration');
            $table->string('inflight_services');
            $table->integer('available_places');
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
        Schema::dropIfExists('flights');
    }
};
