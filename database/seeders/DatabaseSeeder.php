<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Handle;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Tag;
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
        $this->call(UserTableSeeder::class);
        $this->call(HandleTableSeeder::class);
        $this->call(PostTableSeeder::class);        
        $this->call(CommentTableSeeder::class);
        $this->call(TagTableSeeder::class);
        
        // for ($i=0; $i < 10; $i++) { 
        //     User::factory()
        //         ->hasHandle(1)
        //         ->hasPosts(rand(1,3))
        //         ->hasComments(rand(5,10))
        //         ->create();
        // }

        $tags = Tag::factory(10)->create();

        User::factory(20)->create()->each(function($user) use ($tags) {
            Handle::factory(1)->create();
            Post::factory(rand(1,4))->create([
                'user_id' => $user->id
            ])->each(function($post) use($tags) {
                $post->tags()->attach($tags->random(rand(1,3)));
            });
            Comment::factory(rand(1,6))->create();
        });
    }
}
