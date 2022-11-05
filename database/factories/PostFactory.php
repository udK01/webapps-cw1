<?php

namespace Database\Factories;

use App\Models\BlogUser;
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
            'title' => fake()->realText(90),
            'description' => fake()->realText(250),
            'blog_user_id' => 1, //fake()->numberBetween(1,BlogUser::Get()->count())
        ];
    }
}
