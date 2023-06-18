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

        $booly = true;
        //create a vacation for each city
        foreach ($cities as $city) {
            if($booly){
                Vacation::factory(1)->create([
                    'city_id' => $city->id,
                    'provided_id' => $providingUser->id,                   
                    'booked_id' => $user->id
                ]);  
                $booly=false;
            }
            else{
                Vacation::factory(1)->create([
                    'city_id' => $city->id,
                    'provided_id' => $providingUser->id                   
                ]);
                $booly=true;
            }
           
        }
    }
}
