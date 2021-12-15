<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\BlogTag;
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
        Article::factory()
            ->count(10)
            ->has(BlogTag::factory(), 'tags')
            ->create();

        Comment::factory()->count(20)->create();
    }
}
