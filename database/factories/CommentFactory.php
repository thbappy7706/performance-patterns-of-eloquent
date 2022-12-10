<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->sentences(rand(1, 6), true),
            'created_at' => $this->faker->dateTimeBetween('-10 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-10 years', 'now'),
        ];
    }
}
