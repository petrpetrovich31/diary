<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BirthdayNotification extends Model
{
    protected $table = 'birthday_notifications';
    protected $fillable = ['birthday_id'];
}
