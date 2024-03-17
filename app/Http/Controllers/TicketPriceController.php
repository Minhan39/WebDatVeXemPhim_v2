<?php

namespace App\Http\Controllers;

use App\Models\TicketPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketPriceController extends Controller
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
        $ticketPricesAlways = DB::table('ticket_prices')->where('is_always_available', 1)->get();
        $cinemas = DB::table('cinemas')->get();
        $units = DB::table('units')->get();
        $countries = DB::table('countries')->get();
        $cities = DB::table('cities')->get();
        return view('ticket-prices.create', compact('ticketPricesAlways', 'cinemas', 'units', 'countries', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $ticket_price = new TicketPrice();
        $ticket_price->root_id = $request->root_id == null ? 0 : $request->root_id;
        $ticket_price->cinema_id = $request->cinema_id;
        $ticket_price->name = $request->name;
        $ticket_price->price = $request->price;
        $ticket_price->is_active = $request->has('is_active');
        $ticket_price->is_always_available = $request->has('is_always_available');
        $ticket_price->unit_id = $request->unit_id;
        $ticket_price->save();

        return redirect('vouchers#ticket-prices')
            ->with('success', 'Ticket price created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TicketPrice $ticketPrice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TicketPrice $ticketPrice)
    {
        $ticketPricesAlways = DB::table('ticket_prices')->where('is_always_available', 1)->get();
        $cinemas = DB::table('cinemas')->get();
        $units = DB::table('units')->get();
        $countries = DB::table('countries')->get();
        $cities = DB::table('cities')->get();
        $cinema = DB::table('cinemas')->where('id', $ticketPrice->cinema_id)->first();
        $city = DB::table('cities')->where('id', $cinema->city_id)->first();
        return view('ticket-prices.edit', compact('ticketPrice', 'ticketPricesAlways', 'cinemas', 'units', 'countries', 'cities', 'city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TicketPrice $ticketPrice)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $ticketPrice->root_id = $request->root_id == null ? 0 : $request->root_id;
        $ticketPrice->cinema_id = $request->cinema_id;
        $ticketPrice->name = $request->name;
        $ticketPrice->price = $request->price;
        $ticketPrice->is_active = $request->has('is_active');
        $ticketPrice->is_always_available = $request->has('is_always_available');
        $ticketPrice->unit_id = $request->unit_id;
        $ticketPrice->save();

        return redirect('vouchers#ticket-prices')
            ->with('success', 'Ticket price updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TicketPrice $ticketPrice)
    {
        $ticketPrice->delete();

        return redirect('vouchers#ticket-prices')
            ->with('success', 'Ticket price deleted successfully.');
    }
}
