<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\ProviderAvailabilityUpdated;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'phone', 'category_id', 'status', // Add other fields as needed
    ];

    public function providerAvailabilities()
    {
        return $this->hasMany(ProviderAvailability::class);
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Fire event when provider is created or updated
    protected static function booted()
    {
        static::saved(function ($provider) {
            event(new ProviderAvailabilityUpdated($provider->id, $provider->status));
        });

        static::deleted(function ($provider) {
            event(new ProviderAvailabilityUpdated($provider->id, false));
        });
    }
}

