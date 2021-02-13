<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
    }
}
