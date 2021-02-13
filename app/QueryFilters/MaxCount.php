<?php 

namespace App\QueryFilters;

use App\QueryFilters\Filter;

class MaxCount extends Filter
{
    public function applyFilter($builder)
    {
        return $builder->take(request($this->filterName()));
    }   
} 