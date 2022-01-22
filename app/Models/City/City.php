<?php

namespace App\Models\City;

use App\Traits\ImageGetter;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class City
 * @package App\Models\City
 * @property int $id
 * @property string $name
 * @property string $description
 * @property integer $day
 * @property integer $month
 * @property integer $year
 * @property string $location
 * @property string $comment
 * @property boolean $active
 */
class City extends Model
{
    use CrudTrait;
    use ImageGetter;
    use HasFactory;

    protected $table = 'cities';
    protected $fillable = [
        'name',
        'description',
        'day',
        'month',
        'year',
        'location',
        'comment',
        'active',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $appends = ['main_image'];

    public function images(): HasMany
    {
        return $this->hasMany(CityImage::class);
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
