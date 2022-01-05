<?php

use App\Http\Controllers;
use App\Http\Middleware\Forbidden;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

Route::get('/send-telegram-test', [Controllers\BotController::class, 'test'])
    ->name('send.telegram.test')
    ->middleware(Forbidden::class);
