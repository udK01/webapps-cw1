<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new Post;
        $p->title = "Charlie is cool!";
        $p->description = "Charlie is cool because he won the competition!";
        // $p->imageable_id = 1;
        // $p->imageable_type = Post::class;
        $p->user_id = 1;
        $p->save();
    }
}
