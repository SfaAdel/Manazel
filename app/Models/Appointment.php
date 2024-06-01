<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // public function order()
    // {
    //     return $this->belongsTo(Order::class);
    // }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function subService()
    {
        return $this->belongsTo(SubService::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
