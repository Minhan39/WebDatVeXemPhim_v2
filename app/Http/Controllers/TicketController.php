<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'showtime_id' => 'required|integer',
            'ticket_price_id' => 'required|integer',
            'voucher_id' => 'nullable|integer',
            'gift_id' => 'nullable|integer',
            'quantity' => 'required|integer',
            'seats' => 'required|string',
            'combos' => 'nullable|string',
            'payment' => 'required|string',
            'reduced_price_by_voucher' => 'nullable|numeric',
            'reduced_price_by_point' => 'nullable|numeric',
            'reduced_price_by_gift' => 'nullable|numeric',
        ]);

        $ticket = new Ticket();
        $ticket->user_id = $request->user_id;
        $ticket->showtime_id = $request->showtime_id;
        $ticket->ticket_price_id = $request->ticket_price_id;
        $ticket->voucher_id = $request->voucher_id;
        $ticket->gift_id = $request->gift_id;
        $ticket->quantity = $request->quantity;
        $ticket->seats = $request->seats;
        $ticket->combos = $request->combos;
        $ticket->payment = $request->payment;
        $ticket->reduced_price_by_voucher = $request->reduced_price_by_voucher;
        $ticket->reduced_price_by_point = $request->reduced_price_by_point;
        $ticket->reduced_price_by_gift = $request->reduced_price_by_gift;
        $ticket->save();

        return response()->json(['message' => 'Ticket created!'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
