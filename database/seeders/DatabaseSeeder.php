<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\BlogUser;
use App\Models\Handle;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BlogUserTableSeeder::class);
        $this->call(HandleTableSeeder::class);
        $this->call(PostTableSeeder::class);        
        $this->call(CommentTableSeeder::class);
        
        // Not realistic since everyone has x amount of posts and y amount of comments.
        // BlogUser::factory(15)
        //     ->hasPosts(random_int(1,3))
        //     ->hasComments(random_int(1,5))
        //     ->create();

        for ($i=0; $i < 15; $i++) { 
            BlogUser::factory()
                ->hasHandle(1)
                ->hasPosts(rand(1,3))
                ->hasComments(rand(1,5))
                ->create();
        }
    }
}
