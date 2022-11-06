<?php

namespace Database\Seeders;

use App\Models\BlogUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $b = new BlogUser;
        $b->name = "Sam";
        $b->blog_points = 23145;
        $b->save();
    }
}
