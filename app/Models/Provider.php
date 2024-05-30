<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    public function providerAvailabilities()
    {
        return $this->hasMany(providerAvailability::class);
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        'eloquent.saved: App\Models\Provider' => [
            'App\Listeners\UpdateSubServiceProviders',
        ],
        'eloquent.deleted: App\Models\Provider' => [
            'App\Listeners\UpdateSubServiceProviders',
        ],
    ];
}
