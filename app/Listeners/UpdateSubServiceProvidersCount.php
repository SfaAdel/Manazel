<?php

namespace App\Listeners;

use App\Models\Provider;
use App\Models\SubService;
use App\Events\ProviderAvailabilityUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateSubServiceProvidersCount
{
    /**
     * Handle the event.
     *
     * @param  mixed  $event
     * @return void
     */
    public function handle($event)
    {
        if ($event instanceof ProviderAvailabilityUpdated) {
            $providerId = $event->providerId;
            $provider = Provider::find($providerId);
        } elseif ($event instanceof Provider) {
            $provider = $event;
        } else {
            return;
        }

        if ($provider) {
            $category_id = $provider->category_id;

            $sub_services = SubService::whereHas('service.category', function ($query) use ($category_id) {
                $query->where('id', $category_id);
            })->get();

            foreach ($sub_services as $sub_service) {
                $providersCount = Provider::where('category_id', $category_id)
                                          ->where('status', 1)
                                          ->count();
                $sub_service->providers = $providersCount;
                $sub_service->save();
            }
        }
    }
}
