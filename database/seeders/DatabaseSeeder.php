<?php

namespace Database\Seeders;

use App\Models\Post;
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
        $news = Post::factory(10)->create();
        //Post::factory()->create();
        // \App\Models\User::factory(10)->create();
    }
}
