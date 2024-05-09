<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $book = Book::whereActive(true)->inRandomOrder()->first();
        $qty = fake()->numberBetween(1,10);
        $subTotal = $book->price * $qty;
        $total = 0;
        $total = $total + $subTotal;
        return [
            'uuid' => (string) str()->uuid(),
            'book_id' => $book->id ?? null,
            'user_id' => User::role('user')->inRandomOrder()->pluck('id')->first(),
            'quantity' => $qty,
            'sub_total' => $subTotal,
            'total' => $total,
            'status' => fake()->randomElement([ 'pending', 'processing', 'completed']),
            'created_at' => fake()->datetime()
        ];
    }
}
