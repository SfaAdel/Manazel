<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubServiceAvailability extends Model
{
    use HasFactory;

    public function subService()
    {
        return $this->belongsTo(SubService::class);
    }
}
