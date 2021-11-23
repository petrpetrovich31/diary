<?php

use App\Http\Controllers\Api as ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix'     => 'cities',
], function () {
    Route::get('/',     [ApiController\CityController::class, 'getCities']);
    Route::get('/{id}', [ApiController\CityController::class, 'showCity']);
});
Route::group([
    'prefix'     => 'places',
], function () {
    Route::get('/',     [ApiController\PlaceController::class, 'getPlaces']);
    Route::get('/{id}', [ApiController\PlaceController::class, 'showPlace']);
});

