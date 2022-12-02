<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::factory()->count(25)->create()
            ->each(fn($author) => $author->posts()
                ->createMany(Post::factory()->count(5)->make()->toArray()
                ));

    }
}
