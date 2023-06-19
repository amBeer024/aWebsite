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
        //create test user
        $user = User::factory()->create([
            'name' => 'Amber',
            'email' => 'test@example.com',
        ]);

        //create the user that will provide the test vacations
        $providingUser = User::factory()->create([
            'name' => 'TweedeHandsie Vakantie',
        ]);

        //create some countries
        $countries = Country::factory(10)->create([]);

        $cities = collect([]);
        //give each country some cities
        foreach ($countries as $country) {
            $tempCities = City::factory(3)->create([
                'country_id' => $country->id
            ]);
            foreach ($tempCities as $tempcity) {
                $cities->push($tempcity);
            }
        }

        $booly = true;
        //create a vacation for each city
        foreach ($cities as $city) {
            if ($booly) {
                Vacation::factory(1)->create([
                    'city_id' => $city->id,
                    'provided_id' => $providingUser->id,
                    'booked_id' => $user->id
                ]);
                $booly = false;
            } else {
                Vacation::factory(1)->create([
                    'city_id' => $city->id,
                    'provided_id' => $providingUser->id
                ]);
                $booly = true;
            }
        }
    }
}
