<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BirthdayNotification
 * @package App\Models
 */
class BirthdayNotification extends Model
{
    protected $table = 'birthday_notifications';
    protected $fillable = ['birthday_id'];

    /**
     * Get the birthday that owns the notification.
     */
    public function birthday()
    {
        return $this->belongsTo(Birthday::class);
    }
}
