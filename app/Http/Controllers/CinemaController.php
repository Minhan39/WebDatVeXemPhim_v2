<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    /**
     * api cinema list
     */
    public function list(){
        $data = Cinema::join('cities', 'cinemas.city_id', '=', 'cities.id')
            ->join('countries', 'cities.country_id', '=', 'countries.id')
            ->select('cinemas.*', 'cities.name as city_name', 'countries.name as country_name')
            ->get();
        return response()->json($data);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cinemas = Cinema::join('cities', 'cinemas.city_id', '=', 'cities.id')
            ->join('countries', 'cities.country_id', '=', 'countries.id')
            ->select('cinemas.*', 'cities.name as city_name', 'countries.name as country_name')
            ->get();
        return view('cinemas.index', compact('cinemas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        return view('cinemas.create', compact('cities', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cinema = new Cinema();
        $cinema->city_id = $request->input('city_id');
        $cinema->name = $request->input('name');
        $cinema->address = $request->input('address');
        $cinema->latitude = $request->input('latitude');
        $cinema->longitude = $request->input('longitude');
        $cinema->save();

        return redirect()->route('cinemas')->with('success', 'Cinema created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cinema $cinema)
    {
        return view('cinemas.show', compact('cinema'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cinema $cinema)
    {
        $countries = Country::all();
        $cities = City::all();
        $city = City::find($cinema->city_id);
        $country_selected = Country::find($city->country_id);
        return view('cinemas.edit', compact('cinema', 'cities', 'countries', 'country_selected'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cinema $cinema)
    {
        $cinema->city_id = $request->input('city_id');
        $cinema->name = $request->input('name');
        $cinema->address = $request->input('address');
        $cinema->latitude = $request->input('latitude');
        $cinema->longitude = $request->input('longitude');
        $cinema->save();

        return redirect()->route('cinemas')->with('success', 'Cinema updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cinema $cinema)
    {
        $cinema->delete();

        return redirect()->route('cinemas')->with('success', 'Cinema deleted successfully');
    }
}
