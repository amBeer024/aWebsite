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
            'startDate' =>  now()->addDay(),
            'endDate' => now()->addWeek(),  
            'booked_by' => null, 
            'description' => fake()->sentence(),    
        ];
    }
}
