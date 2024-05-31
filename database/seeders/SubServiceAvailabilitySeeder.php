<?php

namespace Database\Seeders;

use App\Models\SubService;
use App\Models\SubServiceAvailability;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class SubServiceAvailabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Define appointment times
        $appointmentTimes = ['10:00', '12:00', '14:00', '16:00', '18:00', '20:00', '22:00'];

        // Fetch all sub-services
        $subServices = SubService::all();

        foreach ($subServices as $subService) {
            $providerCount = $subService->providers;

            // Seed availability for the next 30 days
            for ($day = 0; $day < 30; $day++) {
                $date = Carbon::today()->addDays($day);

                foreach ($appointmentTimes as $time) {
                    for ($i = 0; $i < $providerCount; $i++) {
                        SubServiceAvailability::create([
                            'sub_service_id' => $subService->id,
                            'day' => $date,
                            'time' => $time,
                            'availability' => true,
                        ]);
                    }
                }
            }
        }
    }
}
