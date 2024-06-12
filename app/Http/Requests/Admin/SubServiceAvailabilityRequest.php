<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SubServiceAvailabilityRequest extends FormRequest
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
        return [
            //
            'sub_service_id' => 'required|numeric|exists:sub_services,id',
            'availability' => 'required|boolean',
            'day' => 'required|date_format:Y-m-d',
            'time' => 'required',

        ];
    }
    public function attributes()
    {
        return [
            'sub_service_id' => ' الخدمة',
            'availability' => 'حالة الموعد',
            'day' => ' اليوم',
            'time' => 'الوقت',
        ];
    }
}
