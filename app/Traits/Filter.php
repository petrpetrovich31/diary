<?php

namespace App\Traits;

use \Illuminate\Database\Eloquent\Builder;

trait Filter
{
    public function prepareFilter(Builder $query): Builder
    {
        request()->has('limit') && $query->limit(request()->get('limit'));
        request()->has('year') ? $query->where('year', request()->get('year')) : $query->active();

        return $query;
    }
}
