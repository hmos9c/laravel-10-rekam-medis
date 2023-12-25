<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->unique()->numerify('################'),
            'name' => fake()->name(),
            'city' => fake()->city(),
            'dateofbirth' => fake()->dateTimeBetween('1990-01-01', '2009-12-31'),
            'address' => fake()->address(),
            'job' => fake()->jobTitle(),
            'dateofentry' => now(),
            'phonenumber' => fake()->numerify('08##########'),
            'email' => fake()->unique()->safeEmail(),
            'gender_id' => mt_rand(1,2),
            'religion_id' => mt_rand(1,6),
            'status_id' => mt_rand(1,2),
            'nationality_id' => mt_rand(1,2)
        ];
    }
}
