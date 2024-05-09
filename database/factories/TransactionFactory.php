<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid,
            'order_id' => Order::inRandomOrder()->first()->id,
            'status' => $this->faker->randomElement(['pending', 'paid', 'failed']),
            'payment_type' => fake()->randomElement(['paypal', 'razorpay', 'cod', 'stripe']),
        ];
    }
}
