<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'description' => fake()->realText(rand(50,250)),
            'post_id' => fake()->numberBetween(1,Post::Get()->count()),
            'user_id' => 1, //fake()->numberBetween(1,BlogUser::Get()->count())
        ];
    }
}
