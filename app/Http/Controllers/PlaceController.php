<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlaceResource;
use App\Models\Place\Place;
use App\Traits\Filter;

class PlaceController extends Controller
{
    use Filter;

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getPlaces()
    {
        $places = $this->prepareFilter(Place::query());

        return PlaceResource::collection($places->get());
    }
}
