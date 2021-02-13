<?php 

namespace App\QueryFilters;

use App\QueryFilters\Filter;

class Active extends Filter
{
    public function applyFilter($builder)
    {
        return $builder->where($this->filterName(),request($this->filterName())); //active = 0 or 1
    }
} 