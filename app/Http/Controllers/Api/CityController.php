<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CityResource;
use App\Models\City\City;
use App\Traits\Filter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CityController extends Controller
{
    use Filter;

    /** Get cities
     */
    public function getCities(): AnonymousResourceCollection
    {
        $cities = $this->prepareFilter(City::query());

        return CityResource::collection($cities->has('images', '>', 0)->inRandomOrder()->get());
    }

    /** Get city
     */
    public function showCity(int $id): CityResource
    {
        $city = City::findOrFail($id);

        return new CityResource(array_merge($city->toArray(),
            ['images' => $city->imagesToArray()])
        );
    }
}
