<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
   /**
    * Bootstrap the application services.
    *
    * @return void
    */
    public function boot()
    {

    }

   /**
    * Register the application services.
    *
    * @return void
    */
    public function register()
    {
        $this->app->bind(\App\Repository\Contracts\FoodCategoryRepository::class, \App\Repository\Eloquent\FoodCategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repository\Contracts\FoodRepository::class, \App\Repository\Eloquent\FoodRepositoryEloquent::class);
        $this->app->bind(\App\Repository\Contracts\ZooRepository::class, \App\Repository\Eloquent\ZooRepositoryEloquent::class);
        $this->app->bind(\App\Repository\Contracts\ZooRepository::class, \App\Repository\Eloquent\ZooRepositoryEloquent::class);
        $this->app->bind(\App\Repository\Contracts\ZooBoxesRepository::class, \App\Repository\Eloquent\ZooBoxesRepositoryEloquent::class);
        //end-binding
    }
}