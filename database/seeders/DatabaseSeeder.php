<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Country;
use App\Models\CountryCity;
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

        //\App\Models\Vacation::factory()->create();
        // $collection = collect(["Nederland", "Schotland", "Denemarken"]);

        //create 3 countries
        $countries = Country::factory(3)->create([]);

        $cities = collect([]);
        //give each country 2 cities
        foreach ($countries as $country) {
            $cities = CountryCity::factory(2)->create([
                'country_id' => $country->id
            ]);
        }
        
        //create a vacation for each city
        foreach ($cities as $city) {
            $cities = Vacation::factory(1)->create([
                'country_city_id' => $city->id
            ]);
        }
    }
}
