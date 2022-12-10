<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feature>
 */
class FeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->randomElement(['Add', 'Fix', 'Improve']) . ' ' . implode(' ', $this->faker->words(rand(2, 5))),
            'status' => $this->faker->randomElement([
                'Requested',
                'Requested',
                'Requested',
                'Requested',
                'Requested',
                'Requested',
                'Requested',
                'Requested',
                'Requested',
                'Planned',
                'Completed',
                'Completed',
            ]),
        ];
    }
}
