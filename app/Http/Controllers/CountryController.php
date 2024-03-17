<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\City;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = DB::table('countries')->get();
        $countries->map(function ($country){
            // $country->units = DB::table('units')->where('country_id', $country->id)->pluck(\DB::raw("CONCAT(name, ' (', symbol, ')')"))->toArray();
            $country->units = DB::table('units')->where('country_id', $country->id)->select('units.*')->get()->toArray();
            return $country;
        });
        $units = Unit::all();
        $cities = City::join('countries', 'cities.country_id', '=', 'countries.id')
            ->select('cities.*', 'countries.name as country_name', 'countries.symbol as country_symbol')
            ->get();
        return view('countries.index', compact('countries', 'cities', 'units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Country::create($request->all());

        return redirect()->route('countries')
            ->with('success', 'Country created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        return view('countries.show', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        return view('countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Country $country)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $country->update($request->all());

        return redirect()->route('countries')
            ->with('success', 'Country updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('countries')
            ->with('success', 'Country deleted successfully.');
    }
}
