<?php

namespace App\Listeners\Administrator\students;

use App\Events\Administrator\students\RegisteredEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use  App\Mail\Administrator\students\RegisteredMailNotification;
use Illuminate\Support\Facades\Mail;

class RegisteredEmailListener
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
     * @param  \App\Events\Administrator\students\RegisteredEmail  $event
     * @return void
     */
    public function handle(RegisteredEmail $event)
    {
        Mail::to($event->data['_parentEmail'])->send(new RegisteredMailNotification($event->data));
    }
}
