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

    public function subService()
    {
        return $this->belongsTo(SubService::class);
    }
}
