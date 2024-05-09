<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => (string) str()->uuid(),
            'name' => fake()->name(),
            'description' => fake()->sentence(3),
            'cover' => fake()->imageUrl(500, 500),
            'author_id' => User::role('author')->pluck('id')->random(1)->first(),
            'active' => fake()->randomElement([true, false]),
            'price' => fake()->randomFloat(2,10,1000)
        ];
    }
}
