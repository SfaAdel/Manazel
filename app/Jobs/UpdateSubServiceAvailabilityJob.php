<?php


namespace App\Jobs;

use App\Models\SubService;
use App\Models\SubServiceAvailability;
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

            // Calculate the number of providers available for the sub-service
            $providerCount = $subService->providers;

            // Generate availability for the new day at the end of the 30-day period
            $newDay = Carbon::today()->addDays(30);
            $appointmentTimes = ['10:00', '12:00', '14:00', '16:00', '18:00', '20:00', '22:00'];

            foreach ($appointmentTimes as $time) {
                for ($i = 0; $i < $providerCount; $i++) {
                    // Check if there are providers available on the new day
                    $providerAvailability = ProviderAvailability::where('off_days', '!=', $newDay->format('Y-m-d'))->get();

                    if ($providerAvailability->isNotEmpty()) {
                        SubServiceAvailability::create([
                            'sub_service_id' => $subService->id,
                            'day' => $newDay,
                            'time' => $time,
                            'availability' => true,
                        ]);
                    }
                }
            }
        }
    }
}
