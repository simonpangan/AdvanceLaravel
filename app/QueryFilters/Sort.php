<?php 

namespace App\QueryFilters;

use App\QueryFilters\Filter;

class Sort extends Filter
{
    public function applyFilter($builder)
    {
        return $builder->orderBy('title', request($this->filterName())); //sort by title
    }   
} 