<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Resultable
{
    /**
     * Filter a result set.
     * @return Builder $query
     * @param  Builder $query
     */
    public function scopeResult($query)
    {
        if (request()->has('all')) {
            $result = $query->get();
        }
        else {
            if (request()->filled('limit')) {
                $result = $query->paginate(request()->limit)->appends(request()->except('page'));
            }
            else {
                $result = $query->paginate(50)->appends(request()->except('page'));
            }
        }

        return $result;
    }
}