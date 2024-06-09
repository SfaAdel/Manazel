<?php

namespace App\Listeners;

use App\Events\ProviderAvailabilityUpdated;
use App\Models\Appointment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateAvailableAppointments
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */public function handle(ProviderAvailabilityUpdated $event): void
    {
        $providerId = $event->providerId;
        $availability = $event->availability;

        // Retrieve all appointments associated with the affected provider
        $appointments = Appointment::where('provider_id', $providerId)->get();

        // Update the availability of each appointment based on the new provider availability status
        foreach ($appointments as $appointment) {
            // Update the appointment availability based on the provider's availability
            $appointment->update(['availability' => $availability]);
        }
    }
}
