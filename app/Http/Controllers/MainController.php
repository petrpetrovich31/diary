<?php

namespace App\Http\Controllers;

use App\Models\City\City;

class MainController extends Controller
{
    public function index()
    {
        $cities = City::limit(6)->get();

        return view('main', ['cities' => $cities]);
    }
}
