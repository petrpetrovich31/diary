<?php

namespace App\Models\Beer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Action extends Model
{
    protected $table = 'beer_actions';

    protected $fillable = [
        'beer_id',
        'volume_id',
        'type_id',
        'day',
    ];

    protected $casts = [
        'day' => 'date:Y-m-d',
    ];

    public $timestamps = false;

    public function beer(): BelongsTo
    {
        return $this->belongsTo(Beer::class, 'beer_id', 'id');
    }

    public function volume(): BelongsTo
    {
        return $this->belongsTo(Volume::class, 'volume_id', 'id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
}
