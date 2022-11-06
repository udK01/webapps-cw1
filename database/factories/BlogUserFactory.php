<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogUser>
 */
class BlogUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->firstName(),
            'blog_points' => fake()->numberBetween(0,999),
            'date_of_birth' =>  fake()->date($format = 'Y-m-d', $max = 'now'),
        ];
    }
}
