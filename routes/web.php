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

Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])->name('main');//->middleware(\App\Http\Middleware\Forbidden::class);

Route::group([
    'prefix'     => 'places',
    'middleware' => ['web', \App\Http\Middleware\Forbidden::class],
    'namespace'  => 'App\Http\Controllers',
], function () {
    //Route::get('/', [])

});

Route::group([
    'prefix'     => 'city',
    'middleware' => ['web', \App\Http\Middleware\Forbidden::class],
    'as'         => 'city.',
], function () {
    Route::get('/', [\App\Http\Controllers\CityController::class, 'index'])->name('index');
    Route::get('/{id}', [\App\Http\Controllers\CityController::class, 'show'])->name('show');
});

Route::get('test', function () {
    return view('test');
});

Route::get('/send-telegram-test', [\App\Http\Controllers\BotController::class, 'test'])
    ->name('send.telegram.test')
    ->middleware(\App\Http\Middleware\Forbidden::class);
