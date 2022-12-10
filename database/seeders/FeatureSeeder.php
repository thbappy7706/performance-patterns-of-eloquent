<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Feature;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::get();
        Feature::factory(60)->create()->each(function ($feature) use ($users) {
                $feature->comments()->createMany(
                    Comment::factory(50)->make()->each(
                        function ($comment) use ($users) {
                            $comment->user_id = $users->random()->id;
                        })->toArray()
                );
            }
        );
    }
}
