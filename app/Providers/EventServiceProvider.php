<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\ProviderAvailabilityUpdated;
use App\Listeners\UpdateAvailableAppointments;
use App\Listeners\UpdateSubServiceProvidersCount;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        ProviderAvailabilityUpdated::class => [
            UpdateSubServiceProvidersCount::class,
        ],
        'eloquent.saved: App\Models\Provider' => [
            UpdateSubServiceProvidersCount::class,
        ],
        'eloquent.deleted: App\Models\Provider' => [
            UpdateSubServiceProvidersCount::class,
        ],
        ProviderAvailabilityUpdated::class => [
            UpdateAvailableAppointments::class,
        ],
    ];
}
