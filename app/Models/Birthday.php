<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Birthday
 * @property string title
 * @property string date
 * @method HasMany notification()
 * @package App\Models
 */
class Birthday extends Model
{
    public const TYPE = 'birthday';

    protected $table = 'birthdays';
    protected $fillable = [
        'title',
        'date',
    ];
    protected $casts = [
        'date'       => 'date:Y-m-d',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    /** Get the notifications for birthday.
     * @return HasMany
     */
    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class, 'event_id', 'id');
    }
}
