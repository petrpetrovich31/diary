<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CityResource;
use App\Models\City\City;
use App\Traits\Filter;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    use Filter;

    /** Get cities
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getCities()
    {
        $cities = $this->prepareFilter(City::query());

        return CityResource::collection($cities->get());
    }

    /** Get city
     * @param int $id
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function showCity(int $id)
    {
        $city = City::findOrFail($id);

        return new CityResource(array_merge($city->toArray(),
            ['images' => $city->imagesToArray()])
        );
    }
}
