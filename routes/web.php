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
    })->name('home')
    ->middleware(\App\Http\Middleware\Forbidden::class);

Route::get('/send-telegram-test', [\App\Http\Controllers\BotController::class, 'test'])
    ->name('send.telegram.test')
    ->middleware(\App\Http\Middleware\Forbidden::class);
