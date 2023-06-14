<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Country;
use App\Models\City;
use App\Models\Vacation;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $providingUser = User::factory()->create([
            'name' => 'TweedeHandsie Vakantie',
        ]);
        //\App\Models\Vacation::factory()->create();
        // $collection = collect(["Nederland", "Schotland", "Denemarken"]);

        //create 3 countries
        $countries = Country::factory(3)->create([]);

        $cities = collect([]);
        //give each country 2 cities
        foreach ($countries as $country) {
            $tempCity = City::factory(2)->create([
                'country_id' => $country->id
            ]);
            $cities->push($tempCity[0], $tempCity[1]);
        }
        //create a vacation for each city
        foreach ($cities as $city) {
            $vacations = Vacation::factory(1)->create([
                'city_id' => $city->id,
                'provided_by' => $providingUser->id
            ]);
        }
    }
}
