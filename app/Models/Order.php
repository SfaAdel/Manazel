<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}