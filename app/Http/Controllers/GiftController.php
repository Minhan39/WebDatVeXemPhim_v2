<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Models\Country;
use App\Models\Unit;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        $units = Unit::all();
        return view('gifts.create', compact('countries', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'limit_total_expenditure' => 'required',
            'description' => 'required',
            'value' => 'required',
        ]);

        $gift = new Gift();
        $gift->country_id = $request->country_id;
        $gift->limit_total_expenditure = $request->limit_total_expenditure;
        $gift->description = $request->description;
        $gift->value = $request->value;
        $gift->unit_id = $request->unit_id;
        $gift->save();

        return redirect('vouchers#gifts')
            ->with('success', 'Gift created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gift $gift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gift $gift)
    {
        $countries = Country::all();
        $units = Unit::all();
        return view('gifts.edit', compact('gift', 'countries', 'units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gift $gift)
    {
        $request->validate([
            'limit_total_expenditure' => 'required',
            'description' => 'required',
            'value' => 'required',
        ]);

        $gift->country_id = $request->country_id;
        $gift->limit_total_expenditure = $request->limit_total_expenditure;
        $gift->description = $request->description;
        $gift->value = $request->value;
        $gift->unit_id = $request->unit_id;
        $gift->save();

        return redirect('vouchers#gifts')
            ->with('success', 'Gift updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gift $gift)
    {
        $gift->delete();

        return redirect('vouchers#gifts')
            ->with('success', 'Gift deleted successfully.');
    }
}
