<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get-wisata', 'API\WisataController@getWisata');
Route::get('list-wisata', 'API\WisataController@listWisata');
Route::get('filter-wisata', 'API\WisataController@filterWisata');
Route::get('get-travel', 'API\TravelController@getTravel');
Route::get('list-travel', 'API\TravelController@listTravel');
Route::get('filter-travel', 'API\TravelController@filterTravel');
Route::get('get-homestay', 'API\HomestayController@getHomestay');
Route::get('list-homestay', 'API\HomestayController@listHomestay');
Route::get('filter-homestay', 'API\HomestayController@filterHomestay');
Route::get('get-travelhomestay', 'API\HomestayController@getTravelHomestay');
Route::get('get-metode', 'API\MetodeController@getMetode');
Route::get('get-booking', 'API\BookingController@getBooking');
Route::post('post-booking', 'API\BookingController@postBooking');
Route::post('get-detailbooking', 'API\DetailBookingController@getDetailBooking');
Route::post('post-detailbooking', 'API\DetailBookingController@postDetailBooking');
Route::post('get-user', 'API\UserController@getUser');
Route::post('post-user', 'API\UserController@PostUser');
