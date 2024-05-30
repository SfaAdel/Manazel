<?php
// app/Models/ProviderAvailability.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderAvailability extends Model
{
    use HasFactory;

    protected $casts = [
        'off_days' => 'array',
        'month' => 'date',
    ];

    protected $fillable = [
        'off_days',
        'provider_id',
        'month',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
