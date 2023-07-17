<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Diary
 * @property int $id
 * @property string $title
 * @property int $day
 * @property int $month
 * @property int $year
 */
class Diary extends Model
{
    protected $table = 'diary';
    protected $fillable = [
        'title',
        'day',
        'month',
        'year',
    ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public const TYPE = 'diary';
}
