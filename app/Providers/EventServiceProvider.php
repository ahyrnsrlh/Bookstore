<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Events\StockSaved as StockSavedEvent;
use App\Listeners\StockSaved as StockSavedListener;
use App\Events\UserSaved as UserSavedEvent;
use App\Listeners\UserSaved as UserSavedListener;
use App\Events\PaymentSaved as PaymentSavedEvent;
use App\Listeners\PaymentSaved as PaymentSavedListener;
use App\Events\TransactionUpdated as TransactionUpdatedEvent;
use App\Listeners\TransactionUpdated as TransactionUpdatedListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        StockSavedEvent::class => [
            StockSavedListener::class
        ],
        UserSavedEvent::class => [
            UserSavedListener::class
        ],
        PaymentSavedEvent::class => [
            PaymentSavedListener::class
        ],
        TransactionUpdatedEvent::class => [
            TransactionUpdatedListener::class
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
