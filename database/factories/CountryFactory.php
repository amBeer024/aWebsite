<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     * todo hier zou eigenlijk een check moeten zijn dat het land niet al in de database zit
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'country_name' => fake()->country(),
        ];
    }
}
