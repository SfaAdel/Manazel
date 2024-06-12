<?php

namespace App\Rules;

use App\Models\Appointment;
use App\Models\SubService;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class MaxAppointments implements Rule
{
    protected $subServiceId;
    protected $day;
    protected $time;

    public function __construct($subServiceId, $day, $time)
    {
        $this->subServiceId = $subServiceId;
        $this->day = $day;
        $this->time = $time;
    }

    public function passes($attribute, $value)
    {
        $subService = SubService::find($this->subServiceId);
        if (!$subService) {
            return false;
        }

        $appointmentsCount = Appointment::where('sub_service_id', $this->subServiceId)
            ->where('day', $this->day)
            ->where('time', $this->time)
            ->count();

        return $appointmentsCount < $subService->providers;
    }

    public function message()
    {
        return 'عدد المواعيد للحجز في هذا اليوم وهذا الوقت لهذا الخدمة قد بلغ الحد الأقصى.';
    }
}
