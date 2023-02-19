<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $currency = $this->faker->currencyCode();
        $status = $this->faker->randomElement(['B', 'P', 'V']); // Billed, Paid, Void

        switch ($currency) {
            case 'HUF': {
                $amount = $this->faker->numberBetween(40000, 200000);
                break;
            }
            case 'EUR': {
                $amount = $this->faker->numberBetween(100, 600);
                break;
            }
            case 'USD': {
                $amount = $this->faker->numberBetween(500, 1500);
                break;
            }
            case 'GBP': {
                $amount = $this->faker->numberBetween(50, 200);
                break;
            }
            default: {
                $amount = $this->faker->numberBetween(20, 500000);
            }
        }

        return [
            'customer_id' => Customer::factory(),
            'amount' => $amount,
            'currency' => $this->faker->currencyCode(),
            'status' => $status,
            'billed_date' => $this->faker->dateTimeThisDecade(),
            'paid_date' => $status == 'P' ? $this->faker->dateTimeThisDecade() : NULL,
        ];
    }
}
