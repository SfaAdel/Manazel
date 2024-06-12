<?php

namespace App\Http\Requests\Admin;

use App\Models\CourseCycle;
use App\Models\Cycle;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class CourseCycleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        $startDate = $this->input('start_date');
        $endDate = $this->input('end_date');
        return [
            //  'name' => ['required', 'min:3'],
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'day' => ['required'],
            'time' => ['required'],
            'room' => ['required_if:place,academy', 'in:room1,room2'],
            'course_status' => ['required', 'in:not_started,in_progress,completed'],
            'instructor_id' => ['required', 'exists:instructors,id'],
            'level_id' => ['required', 'exists:levels,id'],
            'cycle_id' => ['required', 'exists:cycles,id'],
            'type' => ['required', 'in:online,offline'],
            'place' => ['required_if:type,offline', 'in:academy,pms'],
        ];
    }
    protected function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $this->validateCourseGroupDates($validator);
            $this->validateCourseCycleWithinCycleDates($validator);
        });
    }

    protected function validateCourseGroupDates($validator)
    {
        $day = $this->input('day');
        $time = $this->input('time');
        $room = $this->input('room');
        $startDate = $this->input('start_date');

        $conflictingGroup = CourseCycle::where('day', $day)
            ->where('time', $time)
            ->where('room', $room)
            ->where('end_date', '>=', $startDate)
            ->first();

        if ($conflictingGroup) {
            $validator->errors()->add('start_date', 'A group with the same day, time, and room already exists within the selected period.
            The start date must be after the end date of this group.');
        }
    }

    protected function validateCourseCycleWithinCycleDates($validator)
    {
        $startDate = $this->input('start_date');
        $endDate = $this->input('end_date');
        $cycleId = $this->input('cycle_id');

        $cycle = Cycle::find($cycleId);

        if ($cycle) {
            if (($cycle->start_date && $startDate < $cycle->start_date) || ($cycle->end_date && $endDate > $cycle->end_date)) {
                $validator->errors()->add('start_date', 'The start and end dates must be within the selected cycle\'s period.');
            }
        }
    }

}
