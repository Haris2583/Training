<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\IProductRepository;
use App\Repositories\ProductRepository;
use App\Models\Product;
use App\Observers\ProductObserver;  
use App\Repositories\Interfaces\IJobRepository;
use App\Repositories\JobRepository;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IProductRepository::class, ProductRepository::class);
        $this->app->bind(IJobRepository::class, JobRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
