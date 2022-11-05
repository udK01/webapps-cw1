<?php

namespace Database\Factories;

use App\Models\BlogUser;
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
            'description' => fake()->realText(250), //character count, word count
            'post_id' => fake()->numberBetween(1,Post::Get()->count()),
            'blog_user_id' => 1, //fake()->numberBetween(1,BlogUser::Get()->count())
        ];
    }
}
