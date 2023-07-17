<?php

namespace App\Models\City;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class CityImage
 * @package App\Models\City
 * @property integer $city_id
 * @property string $src
 */
class CityImage extends Model
{
    protected $table = 'cities_images';
    protected $fillable = [
        'city_id',
        'src',
    ];

    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
