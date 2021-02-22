<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityResource;
use App\Models\City\City;

class CityController extends Controller
{
    /** Get cities
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getCities()
    {
        $cities = City::query();

        request()->has('limit') && $cities->limit(request()->get('limit'));

        return CityResource::collection($cities->get());
    }
}
