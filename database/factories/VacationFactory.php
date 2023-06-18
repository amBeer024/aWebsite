<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacation>
 */
class VacationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [   
            'start_date' =>  now()->addDay(),
            'end_date' => now()->addWeek(), 
            'price' => random_int(10,250), 
            'booked_id' => null, 
            'description' => fake()->paragraph(),    
        ];
    }
}
