<?php

namespace App\Providers;

use App\Events\QuizResultsEvent;
use App\Events\ThirdAddEvent;
use App\Listeners\QuizResultListener;
use App\Listeners\ThirdAddListener;
use App\Notifications\QuizResultNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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
        ThirdAddEvent::class => [
            ThirdAddListener::class
        ],
        QuizResultsEvent::class => [
            QuizResultListener::class
        ]
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
}
