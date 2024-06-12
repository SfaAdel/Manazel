<?php

namespace App\Rules;

use App\Models\Appointment;
use Illuminate\Contracts\Validation\Rule;

class UniqueAppointment implements Rule
{
    protected $day;
    protected $time;
    protected $providerId;

    public function __construct($day, $time, $providerId = null)
    {
        $this->day = $day;
        $this->time = $time;
        $this->providerId = $providerId;
    }

    public function passes($attribute, $value)
    {
        // If providerId is not provided, then no need to check for uniqueness
        if ($this->providerId === null) {
            return true;
        }

        // Check for uniqueness only if providerId is provided
        return !Appointment::where('day', $this->day)
            ->where('time', $this->time)
            ->where('provider_id', $this->providerId)
            ->exists();
    }

    public function message()
    {
        return 'هذا المزود لديه موعد آخر في هذا اليوم وهذا الوقت.';
    }
}
