<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\MovieGenre;
use App\Models\MovieRatingSystem;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * api movie list
     */
    public function list(){
        $data = DB::table('movies')
            ->join('movie_rating_systems', 'movies.movie_rating_system_id', '=', 'movie_rating_systems.id')
            ->select(
                'movies.movie_genre_ids as genre_ids',
                'movies.id as movie_id',
                'movies.name as movie_name',
                'movies.poster as movie_poster', 
                'movie_rating_systems.name as rating_system_name')
            ->get();
        return response()->json($data);
    }
    /**
     * api movie detail
     */
    public function detail($id){
        $data = DB::table('movies')
            ->join('movie_rating_systems', 'movies.movie_rating_system_id', '=', 'movie_rating_systems.id')
            ->select(
                'movies.*',
                'movie_rating_systems.name as rating_system_name')
            ->where('movies.id', $id)
            ->first();
        $genre_ids = explode(",", $data->movie_genre_ids);
        $genres = MovieGenre::all()->whereIn('id', $genre_ids)->pluck('name')->toArray();
        $data->genres = $genres;
        return response()->json($data);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movie_genres = MovieGenre::all();
        $movie_rating_systems = MovieRatingSystem::all();
        $movies = DB::table('movies')
            ->join('movie_rating_systems', 'movies.movie_rating_system_id', '=', 'movie_rating_systems.id')
            ->select('movies.*', 'movie_rating_systems.name as rating_system_name')
            ->get();
        $movies->map(function ($movie) use ($movie_genres){
            $genre_ids = explode(",", $movie->movie_genre_ids);
            $genres = $movie_genres->whereIn('id', $genre_ids)->pluck('name')->toArray();
            $movie->genres = $genres;
            return $movie;
        });
        return view('movies.index', compact('movies', 'movie_genres', 'movie_rating_systems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ratingSystems = MovieRatingSystem::all();
        $genres = MovieGenre::all();
        return view('movies.create', compact('ratingSystems', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'movie_genre_ids' => 'required',
            'movie_rating_system_id' => 'required',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif',
            'description' => 'nullable',
            'studioes' => 'nullable',
            'directors' => 'nullable',
            'actors' => 'nullable',
            'trailer' => 'required|mimes:mp3,mp4',
            'duration' => 'nullable',
            'primary_color_background' => 'nullable',
            'primary_color_text' => 'nullable'
        ]);

        $movie = new Movie();
        $movie->name = $request->name;
        $movie->movie_genre_ids = implode(",", $request->movie_genre_ids);
        $movie->movie_rating_system_id = $request->movie_rating_system_id;
        $movie->description = $request->description;
        $movie->studioes = $request->studioes;
        $movie->directors = $request->directors;
        $movie->actors = $request->actors;
        $movie->duration = $request->duration;
        $movie->primary_color_background = $request->primary_color_background;
        $movie->primary_color_text = $request->primary_color_text;

        $movie->poster = 'posters/' . $request->file('poster')->hashName();
        $movie->trailer = 'trailers/' . $request->file('trailer')->hashName();
        $request->file('poster')->storeAs('public', $movie->poster);
        $request->file('trailer')->storeAs('public', $movie->trailer);

        $movie->save();

        return redirect()->route('movies')->with('success', 'Movie created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        $ratingSystem = MovieRatingSystem::find($movie->movie_rating_system_id);
        $movie->rating_system_name = $ratingSystem->name;

        $genre_ids = explode(",", $movie->movie_genre_ids);
        $genres = MovieGenre::all()->whereIn('id', $genre_ids)->pluck('name')->toArray();
        $movie->genres = $genres;

        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $ratingSystems = MovieRatingSystem::all();
        $genres = MovieGenre::all();
        return view('movies.edit', compact('movie', 'ratingSystems', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'name' => 'required',
            'movie_genre_ids' => 'required',
            'movie_rating_system_id' => 'required',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'description' => 'nullable',
            'studioes' => 'nullable',
            'directors' => 'nullable',
            'actors' => 'nullable',
            'trailer' => 'nullable|mimes:mp3,mp4',
            'duration' => 'nullable',
            'primary_color_background' => 'nullable',
            'primary_color_text' => 'nullable'
        ]);

        if ($request->hasFile('poster')) {
            Storage::delete(['public/' . $movie->poster]);
            $movie->poster = 'posters/' . $request->file('poster')->hashName();
            $request->file('poster')->storeAs('public', $movie->poster);
        }

        if ($request->hasFile('trailer')) {
            Storage::delete(['public/' . $movie->trailer]);
            $movie->trailer = 'trailers/' . $request->file('trailer')->hashName();
            $request->file('trailer')->storeAs('public', $movie->trailer);
        }

        $movie->name = $request->name;
        $movie->movie_genre_ids = implode(",", $request->movie_genre_ids);
        $movie->movie_rating_system_id = $request->movie_rating_system_id;
        $movie->description = $request->description;
        $movie->studioes = $request->studioes;
        $movie->directors = $request->directors;
        $movie->actors = $request->actors;
        $movie->duration = $request->duration;
        $movie->primary_color_background = $request->primary_color_background;
        $movie->primary_color_text = $request->primary_color_text;
        $movie->save();

        return redirect()->route('movies')->with('success', 'Movie updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        Storage::delete(['public/' . $movie->poster, 'public/' . $movie->trailer]);

        return redirect()->route('movies')->with('success', 'Movie deleted successfully.');
    }
}
