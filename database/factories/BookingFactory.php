<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'departure_from' => $this->faker->locale(),
            'arriving_at' => $this->faker->locale(),
            'departure_date' =>$this->faker->date(),
            'return_date' =>$this->faker->date(),
            'passengers' => $this->faker->word(),
            'cabin' => $this->faker->word(),
            'one_way' => $this->faker->boolean,
            'round_trip' => $this->faker->boolean
        ];
    }
}
