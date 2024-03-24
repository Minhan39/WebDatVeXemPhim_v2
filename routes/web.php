<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieGenreController;
use App\Http\Controllers\MovieRatingSystemController;
use App\Http\Controllers\PopcornAndSodaController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\TicketPriceController;
use App\Http\Controllers\ShowtimeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/movie', function () {
    return view('movie');
})->name('movie');
Route::get('/movie-list', function () {
    return view('movie-list');
})->name('movie-list');
Route::get('/cart', function () {
    return view('cart');
})->name('cart');
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'ensureUserHasTeam'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');
    Route::resource('countries', CountryController::class)->name('index', 'countries');
    Route::resource('cities', CityController::class);
    Route::resource('cinemas', CinemaController::class)->name('index', 'cinemas');
    Route::resource('movie-genres', MovieGenreController::class);
    Route::resource('movie-rating-systems', MovieRatingSystemController::class);
    Route::resource('movies', MovieController::class)->name('index', 'movies');
    Route::resource('popcorn-and-soda', PopcornAndSodaController::class)->name('index', 'popcorn-and-soda');
    Route::resource('units', UnitController::class);
    Route::resource('vouchers', VoucherController::class)->name('index', 'vouchers');
    Route::resource('gifts', GiftController::class);
    Route::resource('ticket-prices', TicketPriceController::class);
    Route::resource('showtimes', ShowtimeController::class)->name('index', 'showtimes');
});