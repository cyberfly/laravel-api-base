<?php

namespace App\Filters\Api\V1;

use App\Http\Filters\QueryFilters;
use Illuminate\Database\Eloquent\Builder;

class RoleFilter extends QueryFilters
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
     * Filter by display_name
     *
     * @param  string $display_name
     * @return Builder
     */
    public function display_name($display_name)
    {
        return $this->builder->where('display_name', 'like' , '%' . $display_name . '%');
    }

    /**
     * Filter by description
     *
     * @param  string $description
     * @return Builder
     */
    public function description($description)
    {
        return $this->builder->where('description', 'like' , '%' . $description . '%');
    }

    /**
     * Filter by guard_name
     *
     * @param  string $guard_name
     * @return Builder
     */
    public function guard_name($guard_name)
    {
        return $this->builder->where('guard_name', $guard_name);
    }

}
