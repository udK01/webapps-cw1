<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $b = new User;
        $b->name = "udKay";
        $b->permission = 2;
        $b->blog_points = 23145;
        $b->date_of_birth =  fake()->date($format = 'Y-m-d', $max = 'now');
        $b->email = "udKay@gmail.com";
        $b->email_verified_at = now();
        $b->password = "password123";
        $b->save();
    }
}
