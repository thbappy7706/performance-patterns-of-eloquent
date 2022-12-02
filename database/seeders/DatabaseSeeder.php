<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\User;
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
        Company::factory()->count(1000)->create()->each(fn($company)=>$company->users()
        ->createMany(User::factory()->count(50)->make()->map->getAttributes()));

        $this->call(PostSeeder::class);

    }
}
