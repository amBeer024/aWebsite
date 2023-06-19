<?php

namespace App\Http\Controllers;

use App\Models\Vacation;
use Illuminate\Http\Request;

class VacationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome', [
            'vacations' => Vacation::filter(
                request(['search'])
            )->paginate(5)->withQueryString()
        ]);
    }

    public function dashboard()
    {
        return view('dashboard', ['countries' => CountryController::getCountries()]);
    }

    public function booked(Request $request)
    {
        $user = $request->user();
        $filters['bookedByMe'] = $user->id;
        return view('dashboard', [
            'vacations' => Vacation::filter(
                $filters
            )->paginate(5)->withQueryString()
        ]);
    }
    public function provided(Request $request)
    {
        $user = $request->user();
        $filters['providedByMe'] = $user->id;
        return view('dashboard', [
            'vacations' => Vacation::filter(
                $filters
            )->paginate(5)->withQueryString()
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
