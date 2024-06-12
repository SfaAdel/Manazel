<?php

namespace App\Http\Requests\Admin;

use App\Rules\MaxAppointments;
use App\Rules\UniqueAppointment;
use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'customer_id' => 'required|numeric|exists:customers,id',
            'provider_id' => [
                'numeric',
                'exists:providers,id',
                new UniqueAppointment($this->day, $this->time, $this->provider_id)
            ],
            'day' => 'required|date_format:Y-m-d',
            'time' => 'required|date_format:H:i:s',
            'address' => 'required|string|min:5',
            'sub_service_id' => [
                'required',
                'numeric',
                'exists:sub_services,id',
                new MaxAppointments($this->sub_service_id, $this->day, $this->time)
            ]
        ];
    }

    public function attributes()
    {
        return [
            'customer_id' => 'اسم العميل',
            'sub_service_id' => 'اسم الخدمة',
            'provider_id' => 'مقدم الخدمة',
            'day' => ' اليوم',
            'time' => ' الوقت',
            'address' => ' العنوان',
        ];
    }
}
