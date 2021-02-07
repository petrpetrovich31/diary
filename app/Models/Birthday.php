<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Birthday
 * @package App\Models
 */
class Birthday extends Model
{
    use CrudTrait;

    protected $table = 'birthdays';
    protected $fillable = ['title', 'date'];

    /**
     * Get the notifications for birthday.
     */
    public function notifications()
    {
        return $this->hasMany(BirthdayNotification::class);
    }

}
