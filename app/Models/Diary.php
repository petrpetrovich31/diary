<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use CrudTrait;

    protected $table = 'diary';
    protected $fillable = ['title', 'day', 'month', 'year'];

    public const TYPE = 'diary';

}
