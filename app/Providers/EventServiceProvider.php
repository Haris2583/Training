<?php

namespace App\Providers;

use App\Listeners\ProductListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Models\Product;
use App\Observers\ProductObserver;  
use App\Events\ProductEvent;
use App\Observers\ApplicationObserver;
use App\Models\Application;
use App\Listeners\SendApplicationNotification;
use App\Events\ApplicationCreated;
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],


        ApplicationCreated::class => [
            SendApplicationNotification::class,
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
   
     public function boot()
     {
 
         Application::observe(ApplicationObserver::class);
     }
 
     public function shouldDiscoverEvents()
     {
         return false;
     }
 

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    
}
