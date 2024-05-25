<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class providerAvailability extends Model
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

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Ensure 'month' is within the current year
            if ($model->month && $model->month->year !== now()->year) {
                throw new \Exception('The month must be within the current year.');
            }
        });

        static::updating(function ($model) {
            // Ensure 'month' is within the current year
            if ($model->month && $model->month->year !== now()->year) {
                throw new \Exception('The month must be within the current year.');
            }
        });
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
