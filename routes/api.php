<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix'     => 'cities',
], function () {
    Route::get('/', [\App\Http\Controllers\Api\CityController::class, 'getCities']);
    Route::get('/{id}', [\App\Http\Controllers\Api\CityController::class, 'showCity']);
});
Route::group([
    'prefix'     => 'places',
], function () {
    Route::get('/', [\App\Http\Controllers\Api\PlaceController::class, 'getPlaces']);
    Route::get('/{id}', [\App\Http\Controllers\Api\PlaceController::class, 'showPlace']);
});

