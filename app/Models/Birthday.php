<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Birthday extends Model
{
    use CrudTrait;

    protected $table = 'birthdays';
    protected $fillable = ['title', 'date'];

}
