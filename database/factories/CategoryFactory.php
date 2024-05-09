<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->word;
        $slug = str()->slug($name);
        return [
            'uuid' => (string) str()->uuid(),
            'name' => $name,
            'slug' =>  $slug,
            'description' => fake()->sentence,
            'active' => fake()->boolean
        ];
    }
}
