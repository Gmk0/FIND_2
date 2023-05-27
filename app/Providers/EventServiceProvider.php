<?php

namespace App\Providers;

use App\Events\FeedbackSend;
use Illuminate\Auth\Events\Registered;
use App\Events\ServiceOrdered;
use App\Events\ProjectResponse;
use App\Events\ProjectResponseFreelance;
use App\Listeners\FeedbackNotifaction;
use App\Listeners\ProjetStatus;
use App\Listeners\SendNotificationProject;
use App\Listeners\SendNotificationToFreelancer;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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
        ServiceOrdered::class => [
            SendNotificationToFreelancer::class,
        ],

        ProjectResponseFreelance::class => [
            SendNotificationProject::class,
        ],

    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
