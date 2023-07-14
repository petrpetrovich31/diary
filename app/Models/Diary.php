<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $table = 'diary';
    protected $fillable = ['title', 'day', 'month', 'year'];

    public const TYPE = 'diary';

}
