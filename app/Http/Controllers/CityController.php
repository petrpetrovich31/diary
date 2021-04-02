<?php

namespace App\Http\Controllers;

class CityController extends Controller
{
    public function index()
    {
        return view('city.index');
    }

    public function show($id)
    {
        return view('city.item', compact('id'));
    }
}
