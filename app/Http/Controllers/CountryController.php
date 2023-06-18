<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    public function getCountries()
    {
        $countries = DB::table('countries')->get();
        return $countries;
    }
}
