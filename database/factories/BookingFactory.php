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
            'departure_from' => $this->faker->city(),
            'arriving_at' => $this->faker->city(),
            'departure_date' =>$this->faker->date(),
            'return_date' =>$this->faker->date(),
            'passengers' => $this->faker->word(),
            'cabin_class' => $this->faker->word(),
            'travel_type' => $this->faker->word(),
        ];
    }
}
