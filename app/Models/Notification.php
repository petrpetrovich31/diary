<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Notification
 * @property string type
 * @property int event_id
 * @property int result
 * @method static Builder|Notification birthdays()
 * @method static Builder|Notification diary()
 * @package App\Models
 */
class Notification extends Model
{
    protected $table = 'notifications';
    protected $fillable = ['type', 'event_id', 'result'];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeBirthdays($query)
    {
        return $query->where('type', Birthday::TYPE);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeDiary($query)
    {
        return $query->where('type', Diary::TYPE);
    }
}
