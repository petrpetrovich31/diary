<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () {
    Route::crud('birthdays', 'BirthdaysCrudController');
    Route::crud('diary', 'DiaryCrudController');
    Route::crud('city', 'CityCrudController');
    Route::crud('city-image', 'CityImageCrudController');
    Route::crud('place', 'PlaceCrudController');
    Route::crud('place-image', 'PlaceImageCrudController');
});

