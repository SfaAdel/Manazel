<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProviderAvailabilityRequest extends FormRequest
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
            'off_days' => 'required|array',
            'off_days.*' => 'date', // Each element in the off_days array should be a valid date
            'provider_id' => 'required|numeric|exists:providers,id',
            'month' => [
                'required',
                'date_format:Y-m', // Ensures the month is in the format YYYY-MM
                Rule::unique('provider_availabilities')->where(function ($query) {
                    return $query->where('provider_id', $this->provider_id);
                })
            ],
        ];
    }

    public function attributes()
    {
        return [
            'off_days' => 'ايام الاجازة',
            'off_days.*' => 'يوم الاجازة', // Each individual off day
            'provider_id' => 'الموظف',
            'month' => 'الشهر',
        ];
    }

    public function messages()
    {
        return [
            'month.unique' => 'الاجازة لهذا الموظف في هذا الشهر موجودة بالفعل.', // Custom error message for unique constraint
            'off_days.required' => 'يرجى تحديد ايام الاجازة.',
            'provider_id.required' => 'يرجى تحديد الموظف.',
            'provider_id.exists' => 'الموظف المحدد غير موجود.',
            'month.required' => 'يرجى تحديد الشهر.',
            'month.date_format' => 'يجب أن يكون الشهر بتنسيق YYYY-MM.',
        ];
    }
}
