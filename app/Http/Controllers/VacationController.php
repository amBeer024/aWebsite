<?php

namespace App\Http\Controllers;

use App\Models\Vacation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VacationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($bookedBy = null)
    {
        $vacations = DB::table('vacations as va')
        ->join('cities as ci', 'va.id', '=', 'ci.id')
        ->join('countries as co', 'ci.country_id', '=', 'co.id')
        ->join('users as up', 'va.provided_id', '=', 'up.id')
        ->leftJoin('users as ub', 'va.booked_id', '=', 'ub.id')
        ->select('city_name', 'country_name', 'description', 'start_date', 'end_date', 'up.name as provided_by', 'ub.name as booked_by')
        ->where('va.booked_id', '=', null)
        ->get();

        return view('welcome', [
            'vacations' => $vacations
            // 'vacations' => Vacation::with('city')->get(),
        ]);
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacation $vacation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacation $vacation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vacation $vacation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacation $vacation)
    {
        //
    }
}
