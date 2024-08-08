<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    public function providerForms()
    {
        return $this->hasMany(ProviderForm::class);
    }
    public function generalRequests()
    {
        return $this->hasMany(GeneralRequest::class);
    }
}
