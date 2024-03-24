<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieGenreController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PopcornAndSodaController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\ShowtimeController;
use App\Http\Controllers\TicketPriceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('genres', [MovieGenreController::class, 'list']);
Route::get('comboes', [PopcornAndSodaController::class, 'list']);
Route::get('movies', [MovieController::class, 'list']);
Route::get('movie/{id}', [MovieController::class, 'detail']);
Route::get('cinemas', [CinemaController::class, 'list']);
Route::get('showtimes/{movie_id}/{date}', [ShowtimeController::class, 'list_order_by_date']);
Route::get('showtime/{showtime_id}', [ShowtimeController::class, 'detail']);
Route::get('ticket-prices/{cinema_id}', [TicketPriceController::class, 'list']);
Route::post('ticket', [TicketController::class, 'store']);
Route::get('tickets/{user_id}', [TicketController::class, 'list']);
Route::get('report', [TicketController::class, 'report']);

Route::middleware('auth:sanctum')->get('/test', function (Request $request) {
    if($request->user()->tokenCan('write')){
        return response('hello');
    }
    else{
        return response('no have premission');
    }
});
