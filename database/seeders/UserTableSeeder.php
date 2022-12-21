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
        $b->name = "Sam";
        $b->blog_points = 23145;
        $b->email = "Sam@Storm.com";
        $b->password = "SecretSam";
        $b->save();
    }
}
