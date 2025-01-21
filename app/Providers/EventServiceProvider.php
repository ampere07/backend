<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\EnrollmentDeclined;
use App\Listeners\SendEnrollmentDeclinedNotification;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        EnrollmentDeclined::class => [
            SendEnrollmentDeclinedNotification::class,
        ],
    ];
}

