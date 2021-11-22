<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PlaceResource;
use App\Models\Place\Place;
use App\Traits\Filter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PlaceController extends Controller
{
    use Filter;

    public function getPlaces(): AnonymousResourceCollection
    {
        $places = $this->prepareFilter(Place::query());

        return PlaceResource::collection($places->get());
    }

    public function showPlace(int $id): PlaceResource
    {
        $place = Place::findOrFail($id);

        return new PlaceResource(array_merge($place->toArray(),
                ['images' => $place->imagesToArray()])
        );
    }
}
