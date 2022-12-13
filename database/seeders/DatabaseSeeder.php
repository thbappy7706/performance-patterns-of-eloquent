<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(CompanySeeder::class);
        $this->call(PostSeeder::class);
        $this->call(LoginSeeder::class);
        $this->call(FeatureSeeder::class);
        $this->call(CustomerSeeder::class);
    }
}
