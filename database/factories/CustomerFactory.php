<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = $this->faker->randomElement(['B', 'I']);
        $name = $type == 'I' ? $this->faker->name() : $this->faker->company();
        $email = $type == 'I' ? $this->faker->email() : $this->faker->companyEmail();

        return [
            'name' => $name,
            'type' => $type,
            'email' => $email,
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'postal_code' => $this->faker->postcode(),
            'phone' => $this->faker->phoneNumber()
        ];
    }
}
