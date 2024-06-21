<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    // Method to retrieve cities, for example
    // public static function index()
    // {
    //     return self::latest()->get();
    // }

    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
