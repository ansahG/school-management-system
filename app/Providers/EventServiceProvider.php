<?php

namespace App\Providers;
use App\Events\headTeacher\Employees\UpcomingEventNotification;
use App\Listeners\headTeacher\Employees\UpcomingEventListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\headTeacher\students\RegisteredEmail as StudentEmailAtRegistration;
use App\Listeners\headTeacher\students\RegisteredEmailListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ], 
        StudentEmailAtRegistration::class => [
            RegisteredEmailListener::class,
        ],
         UpcomingEventNotification::class => [
            UpcomingEventListener::class,
        ], 
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
