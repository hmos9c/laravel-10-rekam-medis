<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->unique()->numerify('#################'),
            'name' => fake()->name(),
            'specialist' => fake()->jobTitle(),
            'phonenumber' => fake()->numerify('08##########'),
            'accepted' => now(),
            'address' => fake()->address(),
            'gender_id' => mt_rand(1,2)
        ];
    }
}
