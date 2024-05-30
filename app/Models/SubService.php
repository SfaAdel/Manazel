<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    use HasFactory;



    public function subServiceAvailabilities()
    {
        return $this->hasMany(SubServiceAvailability::class);
    }

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
    }

}
