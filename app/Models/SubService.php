<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SubService extends Model
{
    use HasFactory;



    // public function subServiceAvailabilities()
    // {
    //     return $this->hasMany(SubServiceAvailability::class);
    // }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function reviews()
    {
        return $this->hasMany(CustomerReview::class);
    }

    public function generalRequests()
    {
        return $this->hasMany(GeneralRequest::class);
    }

    public function availabilities()
    {
        return $this->hasMany(SubServiceAvailability::class);
    }



    // protected static function booted()
    // {
    //     static::saving(function ($subService) {
    //         if ($subService->service) {
    //             $category = $subService->service->category;

    //             if ($category) {
    //                 $providersCount = Provider::where('category_id', $category->id)
    //                                           ->where('status', 1)
    //                                           ->count();
    //                 $subService->providers = $providersCount;
    //             }
    //         }
    //     });
    // }

    // public function initializeAvailability() {
    //     $startDate = Carbon::now()->startOfDay();
    //     $endDate = Carbon::now()->addDays(30)->endOfDay();

    //     $dates = [];
    //     for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
    //         $dates[] = $date->copy();
    //     }

    //     foreach ($dates as $date) {
    //         // Calculate available time slots and insert into sub_service_availabilities table
    //         $this->calculateAndInsertAvailabilityForDate($date);
    //     }
    // }

    protected static function booted()
    {
        static::saving(function ($subService) {
            if ($subService->service) {
                $category = $subService->service->category;

                if ($category) {
                    $providersCount = Provider::where('category_id', $category->id)
                                              ->where('status', 1)
                                              ->count();
                    $subService->providers = $providersCount;
                }
            }
        });

        static::created(function ($subService) {
            $subService->initializeAvailability();
        });
    }

    public function initializeAvailability()
    {
        $appointmentTimes = ['10:00', '12:00', '14:00', '16:00', '18:00', '20:00', '22:00'];
        $startDate = Carbon::tomorrow();
        $endDate = Carbon::tomorrow()->addDays(30)->endOfDay();

        $dates = [];
        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            $dates[] = $date->copy();
        }

        foreach ($dates as $date) {
            foreach ($appointmentTimes as $time) {
                for ($i = 0; $i < $this->providers; $i++) {
                    SubServiceAvailability::create([
                        'sub_service_id' => $this->id,
                        'day' => $date,
                        'time' => $time,
                        'availability' => true,
                    ]);
                }
            }
        }
    }


}
