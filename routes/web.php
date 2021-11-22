<?php

use App\Http\Controllers;
use App\Http\Middleware\Forbidden;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controllers\MainController::class, 'index'])->name('main');

Route::group([
    'prefix'     => 'city',
    'middleware' => ['web'],
    'as'         => 'city.',
], function () {
    Route::get('/', [Controllers\CityController::class, 'index'])->name('index');
    Route::get('/{id}', [Controllers\CityController::class, 'show'])->name('show');
});

Route::get('test', function () {
    return view('test');
});

Route::get('/send-telegram-test', [Controllers\BotController::class, 'test'])
    ->name('send.telegram.test')
    ->middleware(Forbidden::class);
