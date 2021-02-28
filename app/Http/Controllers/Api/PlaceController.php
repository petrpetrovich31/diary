<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PlaceResource;
use App\Models\Place\Place;
use App\Traits\Filter;
use App\Http\Controllers\Controller;

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

    /** Get place
     * @param int $id
     * @return PlaceResource
     */
    public function showPlace(int $id)
    {
        $place = Place::findOrFail($id);

        return new PlaceResource(array_merge($place->toArray(),
                ['images' => $place->imagesToArray()])
        );
    }
}
