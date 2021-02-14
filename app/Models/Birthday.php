<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
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
    use CrudTrait;

    protected $table = 'birthdays';
    protected $fillable = ['title', 'date'];

    public const TYPE = 'birthday';

    /** Get the notifications for birthday.
     * @return HasMany
     */
    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class, 'event_id', 'id');
    }

}
