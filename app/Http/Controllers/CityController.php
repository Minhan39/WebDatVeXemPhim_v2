<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();
        return $cities;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        return view('cities.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $city = new City();
        $city->name = $request->input('name');
        $city->country_id = $request->input('country_id');
        $city->save();

        return redirect()->route('countries')->with('success', 'City created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        return view('cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        $countries = Country::all();
        return view('cities.edit', compact('city', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $city->name = $request->input('name');
        $city->country_id = $request->input('country_id');
        $city->save();

        return redirect()->route('countries')->with('success', 'City updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('countries')->with('success', 'City deleted successfully');
    }
}
