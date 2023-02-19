<?php

namespace Database\Factories;

use App\Models\Passenger;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Passenger>
 */
class PassengerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Passenger::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->randomElement(['Jr', 'Mr', 'Mrs', 'Miss']);
        $firstName = $title == 'Miss' || 'Mrs' ? $this->faker->firstName('female') : $this->faker->firstName('male');
        $lastName = $this->faker->lastName();
        $type = $this->faker->randomElement(['Infant', 'Child', 'Youth', 'Adult', 'Senior']);

        switch ($type) {
            case 'Infant': {
                $dateOfBirth = $this->faker->dateTimeBetween(['-2years'], ['now']);
                break;
            }
            case 'Child': {
                $dateOfBirth = $this->faker->dateTimeBetween(['-12years'], ['-2years']);
                break;
            }
            case 'Youth': {
                $dateOfBirth = $this->faker->dateTimeBetween(['-18years'], ['-12years']);
                break;
            }
            case 'Adult': {
                $dateOfBirth = $this->faker->dateTimeBetween(['-65years'], ['-18years']);
                break;
            }
            case 'Senior': {
                $dateOfBirth = $this->faker->dateTimeBetween(['-120years'], ['-65years']);
                break;
            }
            default: {
                $dateOfBirth = Null;
                break;
            }
        }

        return [
            'title' => $title,
            'name' => $firstName . $lastName,
            'dateOfBirth' => $dateOfBirth,
            'type' => $type
        ];
    }
}
