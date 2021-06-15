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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard','App\Http\Controllers\DashboardController@index')->name('dashboard');

Route::resource('wisata','App\Http\Controllers\WisataController');

Route::resource('travel_homestay','App\Http\Controllers\TravelHomestayController');

require __DIR__.'/auth.php';
