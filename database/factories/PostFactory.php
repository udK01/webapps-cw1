<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->realText(rand(30,100)),
            'description' => fake()->realText(rand(50,250)),
            'user_id' => 1, //fake()->numberBetween(1,BlogUser::Get()->count())
        ];
    }
}
