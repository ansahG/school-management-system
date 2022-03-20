<?php

namespace App\Listeners\headTeacher\students;

use App\Events\headTeacher\students\RegisteredEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use  App\Mail\headTeacher\students\RegisteredMailNotification;
use Illuminate\Support\Facades\Mail;

class RegisteredEmailListener implements ShouldQueue
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
     * @param  \App\Events\headTeacher\students\RegisteredEmail  $event
     * @return void
     */
    public function handle(RegisteredEmail $event)
    {
        Mail::to($event->data['_parentEmail'])->send(new RegisteredMailNotification($event->data));
    }
}
