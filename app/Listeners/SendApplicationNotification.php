<?php

namespace App\Listeners;

use App\Events\ApplicationCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendApplicationNotification
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
     * @param  \App\Events\ApplicationCreated  $event
     * @return void
     */
    public function handle(ApplicationCreated $event)
    {

        $jobSeeker = $event->application;

        Mail::raw("Dear {$jobSeeker->name}, your application for the position '{$jobSeeker->job->title}' has been received. The employer will review your application and get back to you shortly.", function ($message) use ($jobSeeker) {
            $message->to($jobSeeker->email)
                    ->subject('Application Received');
        });

        logger("Application received email sent to: {$jobSeeker->email}");
    }
}
