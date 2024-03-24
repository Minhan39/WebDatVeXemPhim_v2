<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'movie_genre_ids', 'movie_rating_system_id', 'description', 'studioes', 'directors', 'actors', 'poster', 'trailer', 'duration', 'primary_color_background', 'primary_color_text'];
}
