<?php

namespace App\Listeners\headTeacher\Employees;
use App\Mail\headTeacher\Employees\upcomingEventMail;
use App\Events\headTeacher\Employees\UpcomingEventNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class UpcomingEventListener
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
     * @param  \App\Events\headTeacher\Employees\UpcomingEventNotification  $event
     * @return void
     */
    public function handle(UpcomingEventNotification $event)
    {
        $employeeEmails = User::get('email');
        Mail::to($employeeEmails)->send(new upcomingEventMail($event->data));
    }
}
