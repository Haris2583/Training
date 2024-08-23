<?php

namespace App\Listeners;

use App;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use Mail;
use App\Notifications\ProductCreatedNotification;

class ProductListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $user = $event->product->user;

        Mail::raw("Dear {$user->name}, your product '{$event->product->title}' has been successfully created.", function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Product Created');
        });
             logger("Event trigger hogaya hai ");
    }
}
