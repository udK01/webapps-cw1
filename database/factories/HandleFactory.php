<?php

namespace Database\Factories;

use App\Models\BlogUser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Handle>
 */
class HandleFactory extends Factory
{
    private static $id = 1;
    public function definition()
    {
        return [
            'handle_name' => preg_replace('#[aeiou\s]+#i', '', BlogUser::find(self::$id++)->name),
            'blog_user_id' => 1,
        ];
    }
}
