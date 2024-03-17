<?php

namespace App\Http\Controllers;

use App\Models\Showtime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;

class ShowtimeController extends Controller
{
    /**
     * api screening list.
     */
    public function list_order_by_date(string $date){
        $showtimes = DB::table('showtimes')
            ->join('cinemas', 'showtimes.cinema_id', '=', 'cinemas.id')
            ->join('movies', 'showtimes.movie_id', '=', 'movies.id')
            ->where('showtimes.screening_date', $date)
            ->select('showtimes.id as id', 'cinemas.name as cinema_name', 'movies.name as movie_name', 'showtimes.screening_date', 'showtimes.screening_time')
            ->get();
        $result = [];
        foreach($showtimes as $showtime){
            $cinema_id = $showtime->id;
            if(!isset($result[$cinema_id])){
                $result[$cinema_id] = [
                    "id" => $showtime->id,
                    "cinema_name" => $showtime->cinema_name,
                    "screening_date" => $showtime->screening_date,
                    "screening_times" => []
                ];
            }
            $result[$cinema_id]["screening_times"][] = $showtime->screening_time;
        }
        $result = array_values($result);
        return response()->json($result);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $showtimes = DB::table('showtimes')
            ->join('cinemas', 'showtimes.cinema_id', '=', 'cinemas.id')
            ->join('movies', 'showtimes.movie_id', '=', 'movies.id')
            ->join('cities', 'cinemas.city_id', '=', 'cities.id')
            ->join('countries', 'cities.country_id', '=', 'countries.id')
            ->select('showtimes.id', 'countries.symbol as country_symbol', 'countries.name as country_name', 'cities.name as city_name', 'cinemas.name as cinema_name', 'movies.name as movie_name', 'showtimes.screening_date', 'showtimes.screening_time')
            ->get();
        return view('showtimes.index', compact('showtimes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = DB::table('countries')->get();
        $cities = DB::table('cities')->get();
        $cinemas = DB::table('cinemas')->get();
        $movies = DB::table('movies')->get();
        $genres = DB::table('movie_genres')->get();
        $rating_systems = DB::table('movie_rating_systems')->get(); 
        return view('showtimes.create', compact('countries', 'cities', 'cinemas', 'movies', 'genres', 'rating_systems'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'screening_date' => 'required',
            'screening_time' => 'required',
        ]);

        $showtime = new Showtime();
        $showtime->cinema_id = $request->cinema_id;
        $showtime->movie_id = $request->movie_id;
        $date = DateTime::createFromFormat('m/d/Y',$request->screening_date);
        $showtime->screening_date = $date->format('Y-m-d');
        $showtime->screening_time = $request->screening_time;
        $showtime->save();

        return redirect()->route('showtimes')
            ->with('success', 'Showtime created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Showtime $showtime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Showtime $showtime)
    {
        // $countries = DB::table('countries')->get();
        // $cities = DB::table('cities')->get();
        // $cinemas = DB::table('cinemas')->get();
        // $movies = DB::table('movies')->get();
        // $cinema = DB::table('cinemas')->where('id', $showtime->cinema_id)->first();
        // $city = DB::table('cities')->where('id', $cinema->city_id)->first();
        // return view('showtimes.edit', compact('showtime', 'countries', 'cities', 'cinemas', 'movies', 'cinema', 'city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Showtime $showtime)
    {
        // $request->validate([
        //     'showtime' => 'required',
        //     'showdate' => 'required',
        // ]);

        // $showtime->update($request->all());

        // return redirect()->route('showtimes.index')
        //     ->with('success', 'Showtime updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Showtime $showtime)
    {
        $showtime->delete();

        return redirect()->route('showtimes')
            ->with('success', 'Showtime deleted successfully');
    }
}
