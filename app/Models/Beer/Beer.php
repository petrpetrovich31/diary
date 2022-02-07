<?php

namespace App\Models\Beer;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Beer extends Model
{
    use CrudTrait;

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
