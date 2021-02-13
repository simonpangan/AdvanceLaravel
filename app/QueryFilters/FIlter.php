<?php

namespace App\QueryFilters;

abstract class Filter
{
    //will execute first for every filter
    //refactored - every class has itw own handle but we just refactor it so we can resuse the code
    public function handle($request, \Closure $next)
    {
        if(!request()->has($this->filterName())){
            return $next($request);
        }
        $builder = $next($request);
        return  $this->applyFilter($builder);
    }

    protected abstract function applyFilter($builder);

    protected  function filterName()
    {
        return \Str::snake(class_basename($this));  
        //need to be snake case for max count 
        //to become lower case also
        //because the query is in snake case 
        //max_count = 5 , active = 1, sort = 5
    }
} 