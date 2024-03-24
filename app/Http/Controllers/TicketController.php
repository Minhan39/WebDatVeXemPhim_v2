<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * api ticket report.
     */
    public function report(){
        $tickets = DB::table('tickets')
            ->join('ticket_prices', 'tickets.ticket_price_id', '=', 'ticket_prices.id')
            ->join('units', 'ticket_prices.unit_id', '=', 'units.id')
            ->select(
                DB::raw('DATE_FORMAT(tickets.created_at, "%d") as day'),
                DB::raw('DATE_FORMAT(tickets.created_at, "%m") as month'),
                DB::raw('SUM(ticket_prices.price * tickets.quantity) as price'),
                'units.symbol as unit_name'
            )
            ->groupBy('day', 'month', 'unit_name')
            ->get();
        $tickets = $tickets->filter(function ($ticket) {
            return $ticket->month == date('m');
        });
        return response()->json($tickets);
    }
    /**
     * api ticket list.
     */
    public function list($user_id){
        $tickets = DB::table('tickets')
            ->join('showtimes', 'tickets.showtime_id', '=', 'showtimes.id')
            ->join('movies', 'showtimes.movie_id', '=', 'movies.id')
            ->join('cinemas', 'showtimes.cinema_id', '=', 'cinemas.id')
            ->join('ticket_prices', 'tickets.ticket_price_id', '=', 'ticket_prices.id')
            ->where('tickets.user_id', '=', $user_id)
            ->where('showtimes.screening_date', '>=', date('Y-m-d'))
            ->select(
                'tickets.*',
                'movies.name as movie_name',
                'showtimes.screening_date',
                'showtimes.screening_time',
                'cinemas.name as cinema_name',
                'ticket_prices.name as ticket_name',
                'ticket_prices.price as ticket_price',
                'movies.poster as movie_poster',
                'movies.duration',
                'cinemas.address as cinema_address',
                'movies.primary_color_background',
                'movies.primary_color_text',
                )
            ->get();
        return response()->json($tickets);

    }
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
