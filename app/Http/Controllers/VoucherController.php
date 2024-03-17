<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use App\Models\Country;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vouchers = DB::table('vouchers')
            ->join('countries', 'vouchers.country_id', '=', 'countries.id')
            ->join('units', 'vouchers.unit_id', '=', 'units.id')
            ->select('vouchers.*', 'countries.name as country_name', 'countries.symbol as country_symbol', 'units.symbol as unit')
            ->get();
        $gifts = DB::table('gifts')
            ->join('countries', 'gifts.country_id', '=', 'countries.id')
            ->join('units', 'gifts.unit_id', '=', 'units.id')
            ->select('gifts.*', 'countries.name as country_name', 'countries.symbol as country_symbol', 'units.symbol as unit')
            ->get();
        $ticketPrices = DB::table('ticket_prices')
            ->join('cinemas', 'ticket_prices.cinema_id', '=', 'cinemas.id')
            ->join('cities', 'cinemas.city_id', '=', 'cities.id')
            ->join('countries', 'cities.country_id', '=', 'countries.id')
            ->join('units', 'ticket_prices.unit_id', '=', 'units.id')
            ->select('ticket_prices.*', 'cinemas.name as cinema_name', 'cities.name as city_name', 'countries.name as country_name', 'countries.symbol as country_symbol', 'units.symbol as unit')
            ->get();
        return view('vouchers.index', compact('vouchers', 'gifts', 'ticketPrices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        $units = Unit::all();
        return view('vouchers.create', compact('countries', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'discount' => 'required',
        ]);

        $voucher = new Voucher();
        $voucher->country_id = $request->country_id;
        $voucher->code = $request->code;
        $voucher->discount = $request->discount;
        $voucher->unit_id = $request->unit_id;
        $voucher->percent = $request->has('percent');
        $voucher->active = $request->has('active');
        $voucher->save();

        return redirect()->route('vouchers')
            ->with('success', 'Voucher created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Voucher $voucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voucher $voucher)
    {
        $countries = Country::all();
        $units = Unit::all();
        return view('vouchers.edit', compact('voucher', 'countries', 'units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voucher $voucher)
    {
        $request->validate([
            'code' => 'required',
            'discount' => 'required',
        ]);

        $voucher->country_id = $request->country_id;
        $voucher->code = $request->code;
        $voucher->discount = $request->discount;
        $voucher->unit_id = $request->unit_id;
        $voucher->percent = $request->has('percent');
        $voucher->active = $request->has('active');
        $voucher->save();

        return redirect()->route('vouchers')
            ->with('success', 'Voucher updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voucher $voucher)
    {
        $voucher->delete();

        return redirect()->route('vouchers')
            ->with('success', 'Voucher deleted successfully');
    }
}
