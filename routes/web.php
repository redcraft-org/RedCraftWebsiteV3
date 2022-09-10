<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\ShortUrlController;

Route::get('/', function () {
    return view('home');
    //Get a chuck noris joke from a api and send it as a json response
    // $response = Http::get('https://api.chucknorris.io/jokes/random');
    // return response()->json($response->json()['value'], 200);
})->name('home');

Route::get('/contact', function () {
    return view('coming-soon');
})->name('contact');

Route::get('/vote', function () {
    return view('coming-soon');
})->name('vote');

// stats
Route::get('/stats', function () {
    return view('coming-soon');
})->name('stats');

// rules
Route::get('/rules', function () {
    return view('coming-soon');
})->name('rules');

// about
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('r/{shortened}', ShortUrlController::class)->name('short-url');
