<?php

use App\Admin\Controllers;
use Encore\Admin\Facades\Admin;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', [Controllers\HomeController::class, 'index'])->name('home');

    $router->resource('beer', Controllers\BeerController::class);
    $router->resource('birthdays', Controllers\BirthdayController::class);
    $router->resource('cities', Controllers\CityController::class);
    $router->resource('diary', Controllers\DiaryController::class);

});
