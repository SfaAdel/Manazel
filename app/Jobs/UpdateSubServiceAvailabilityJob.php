<?php

namespace App\Jobs;

use App\Models\SubService;
use App\Models\SubServiceAvailability;
use App\Models\Provider;
use App\Models\ProviderAvailability;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;

class UpdateSubServiceAvailabilityJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     */
    public function handle()
    {
        // Get all sub-services
        $subServices = SubService::all();

        foreach ($subServices as $subService) {
            // Remove records older than 30 days
            SubServiceAvailability::where('sub_service_id', $subService->id)
                ->where('day', '<', Carbon::today()->subDays(30))
                ->delete();

            // Generate availability for the new day at the end of the 30-day period
            $newDay = Carbon::today()->addDays(30);
            $appointmentTimes = ['10:00', '12:00', '14:00', '16:00', '18:00', '20:00', '22:00'];

            foreach ($appointmentTimes as $time) {
                // Calculate the number of available providers for the sub-service on the new day
                $availableProviders = $this->getAvailableProvidersForSubServiceOnDate($subService, $newDay);

                // Create or update availability records for each time slot
                foreach ($availableProviders as $provider) {
                    SubServiceAvailability::updateOrCreate(
                        [
                            'sub_service_id' => $subService->id,
                            'day' => $newDay,
                            'time' => $time,
                        ],
                        [
                            'availability' => true,
                        ]
                    );
                }
            }
        }
    }

    private function getAvailableProvidersForSubServiceOnDate(SubService $subService, Carbon $date)
    {
        $category = $subService->service->category;

        if (!$category) {
            return collect();
        }

        return Provider::where('category_id', $category->id)
            ->where('status', true)
            ->whereDoesntHave('providerAvailabilities', function ($query) use ($date) {
                $query->whereJsonContains('off_days', $date->toDateString());
            })
            ->get();
    }
}
