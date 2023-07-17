<?php

namespace App\Models\Beer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Beer
 * @package App\Models\Beer
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $image
 */
class Beer extends Model
{
    protected $table = 'beers';

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public $timestamps = false;

    public function actions(): HasMany
    {
        return $this->hasMany(Action::class, 'beer_id', 'id');
    }
}
