<?php

namespace App\Http\Controllers;

use App\Models\PopcornAndSoda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PopcornAndSodaController extends Controller
{
    /**
     * api popcorn and soda list
     */
    public function list(){
        $data = DB::table('popcorn_and_sodas')
            ->join('countries', 'popcorn_and_sodas.country_id', '=', 'countries.id')
            ->join('units', 'popcorn_and_sodas.unit_id', '=', 'units.id')
            ->select(
                'popcorn_and_sodas.*', 
                \DB::raw("CONCAT(countries.name, ' (', countries.symbol, ')') as country"),
                'units.symbol as unit'
                )
            ->get();
        return response()->json($data);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('popcorn_and_sodas')
            ->join('countries', 'popcorn_and_sodas.country_id', '=', 'countries.id')
            ->join('units', 'popcorn_and_sodas.unit_id', '=', 'units.id')
            ->select(
                'popcorn_and_sodas.*', 
                \DB::raw("CONCAT(countries.name, ' (', countries.symbol, ')') as country"),
                'units.symbol as unit'
                )
            ->get();
        return view('popcorn-and-soda.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = DB::table('countries')->get();
        $units = DB::table('units')->get();
        return view('popcorn-and-soda.create', compact('countries', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required'
        ]);

        $service = new PopcornAndSoda();
        $service->country_id = $request->country_id;
        $service->unit_id = $request->unit_id;
        $service->description = $request->description;
        $service->price = $request->price;
        
        $service->image = 'images/' . $request->file('image')->hashName();
        $request->file('image')->storeAs('public', $service->image);

        $service->save();

        return redirect()->route('popcorn-and-soda')
            ->with('success', 'Popcorn and Soda created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PopcornAndSoda $popcornAndSoda)
    {
        return view('popcorn-and-soda.show', compact('popcornAndSoda'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PopcornAndSoda $popcornAndSoda)
    {
        $units = DB::table('units')->get();
        $countries = DB::table('countries')->get();
        return view('popcorn-and-soda.edit', compact('popcornAndSoda', 'countries', 'units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PopcornAndSoda $popcornAndSoda)
    {
        $request->validate([
            'description' => 'required'
        ]);

        $popcornAndSoda->country_id = $request->country_id;
        $popcornAndSoda->description = $request->description == null ? $popcornAndSoda->description : $request->description;
        $popcornAndSoda->price = $request->price == null ? $popcornAndSoda->price : $request->price;
        
        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            Storage::delete('public/' . $popcornAndSoda->image);
            $popcornAndSoda->image = 'images/' . $request->file('image')->hashName();
            $request->file('image')->storeAs('public', $popcornAndSoda->image);
        }

        $popcornAndSoda->save();

        return redirect()->route('popcorn-and-soda')
            ->with('success', 'Popcorn and Soda updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PopcornAndSoda $popcornAndSoda)
    {
        Storage::delete('public/' . $popcornAndSoda->image);
        $popcornAndSoda->delete();

        return redirect()->route('popcorn-and-soda')
            ->with('success', 'Popcorn and Soda deleted successfully.');
    }
}
