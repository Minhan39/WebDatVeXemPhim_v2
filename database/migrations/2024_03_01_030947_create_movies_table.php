<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('movie_genre_ids');
            $table->bigInteger('movie_rating_system_id')->constraint('movie_rating_systems');
            $table->string('description')->nullable();
            $table->string('studioes')->nullable();
            $table->string('directors')->nullable();
            $table->string('actors')->nullable();
            $table->string('poster')->nullable();
            $table->string('trailer')->nullable();
            $table->string('duration')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
