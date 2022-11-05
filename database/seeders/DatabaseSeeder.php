<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\BlogUser;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(BlogUserTableSeeder::class);
        $this->call(PostTableSeeder::class);        
        $this->call(CommentTableSeeder::class);
        
        BlogUser::factory(15)
            ->hasPosts(random_int(1,3))
            ->hasComments(random_int(1,5))
            ->create();
    }
}
