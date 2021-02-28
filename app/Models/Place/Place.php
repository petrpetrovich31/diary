<?php

namespace App\Models\Place;

use App\Traits\ImageGetter;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Place
 * @package App\Models\Place
 * @property string $name
 * @property string $description
 * @property integer $day
 * @property integer $month
 * @property integer $year
 * @property string $location
 * @property integer $rating
 * @property string $comment
 * @property boolean $active
 */
class Place extends Model
{
    use CrudTrait;
    use ImageGetter;

    protected $table = 'places';
    protected $fillable = [
        'name',
        'description',
        'day',
        'month',
        'year',
        'location',
        'rating',
        'comment',
        'active',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $appends = ['main_image'];

    /**
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(PlaceImage::class);
    }

    /** Active scope
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
