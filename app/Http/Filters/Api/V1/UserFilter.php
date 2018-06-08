<?php

namespace App\Filters\Api\V1;

use App\Http\Filters\QueryFilters;
use Illuminate\Database\Eloquent\Builder;

class UserFilter extends QueryFilters
{
    /**
     * Filter by latest.
     *
     * @param  string $order
     * @return Builder
     */
    public function latest($order = 'desc')
    {
        return $this->builder->orderBy('created_at', $order);
    }


    /**
     * Filter by name
     *
     * @param  string $name
     * @return Builder
     */
    public function name($name)
    {
        return $this->builder->where('name', $name);
    }

    /**
     * Filter by email
     *
     * @param  string $email
     * @return Builder
     */
    public function email($email)
    {
        return $this->builder->where('email', $email);
    }

    /**
     * Filter by verified
     *
     * @param  string $verified
     * @return Builder
     */
    public function verified($verified)
    {
        return $this->builder->where('verified', $verified);
    }
}
