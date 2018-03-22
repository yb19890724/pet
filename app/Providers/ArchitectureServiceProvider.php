<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ArchitectureServiceProvider extends ServiceProvider
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
        $this->app->bind(\App\Repository\Contracts\PetRepository::class, \App\Repository\Eloquent\PetRepositoryEloquent::class);
        $this->app->bind(\App\Repository\Contracts\GeneRepository::class, \App\Repository\Eloquent\GeneRepositoryEloquent::class);
        $this->app->bind(\App\Repository\Contracts\PetBoxRepository::class, \App\Repository\Eloquent\PetBoxRepositoryEloquent::class);
        $this->app->bind(\App\Repository\Contracts\PetFeedingRepository::class, \App\Repository\Eloquent\PetFeedingRepositoryEloquent::class);
        $this->app->bind(\App\Repository\Contracts\PetGrowthRepository::class, \App\Repository\Eloquent\PetGrowthRepositoryEloquent::class);
        //end-binding
    }
}