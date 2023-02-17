<?php

namespace Database\Factories;

use App\Models\Flight;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Flight::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'departure_from' => $this->faker->city(),
            'arriving_at' => $this->faker->city(),
            'departure_time' => $this->faker->time(),
            'arriving_time' => $this->faker->time(),
            'trip_duration' => $this->faker->time(),
            'flight_number' => $this->faker->word(),
            'flight_company' => $this->faker->word(),
            'inflight_services' => $this->faker->text(22),
            'aircraft' => $this->faker->word(),
            'flight_type' => $this->faker->word()
        ];
    }
}
