<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository3\EloquentRepositoryInterface; 
use App\Repository3\UserRepositoryInterface; 
use App\Repository3\Eloquent\UserRepository; 
use App\Repository3\Eloquent\BaseRepository; 
use App\Models\Customer;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
         $this->app->bind(\App\Repositories\CustomerRepositoryInterface::class,
            \App\Repositories\CustomerRepository::class);

        $this->app->bind(\App\Repositories2\RepositoryInterface::class, function($app) {
            return new  \App\Repositories2\Repository( new \App\Models\Customer());     
        });

        
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(Customer::class, Customer::class);
        
    }
}
