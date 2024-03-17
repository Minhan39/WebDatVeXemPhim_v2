<?php

namespace App\Http\Controllers;

use App\Models\MovieRatingSystem;
use Illuminate\Http\Request;

class MovieRatingSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movieRatingSystems = MovieRatingSystem::all();
        return view('movies', compact('movieRatingSystems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movie-rating-systems.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        MovieRatingSystem::create($data);

        return redirect()->route('movies')->with('success', 'Movie rating system created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MovieRatingSystem $movieRatingSystem)
    {
        return view('movie-rating-systems.show', compact('movieRatingSystem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MovieRatingSystem $movieRatingSystem)
    {
        return view('movie-rating-systems.edit', compact('movieRatingSystem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MovieRatingSystem $movieRatingSystem)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        $movieRatingSystem->update($data);

        return redirect()->route('movies')->with('success', 'Movie rating system updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MovieRatingSystem $movieRatingSystem)
    {
        $movieRatingSystem->delete();

        return redirect()->route('movies')->with('success', 'Movie rating system deleted successfully.');
    }
}
