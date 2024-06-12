<?php

namespace App\Http\Requests\Admin;

use App\Models\Appointment;
use App\Rules\MaxAppointments;
use App\Rules\UniqueAppointment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Adjust this as needed based on your authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'provider_id' => [
                'sometimes',
                'nullable',
                'numeric',
                'exists:providers,id',
                new UniqueAppointment($this->day, $this->time, $this->provider_id)
            ],
        ];

        if ($this->isMethod('post') || $this->has('day')) {
            $rules['day'] = 'required|date_format:Y-m-d';
        }

        if ($this->isMethod('post') || $this->has('time')) {
            $rules['time'] = 'required|date_format:H:i:s';
        }

        if ($this->isMethod('post') || $this->has('address')) {
            $rules['address'] = 'required|string|min:5';
        }

        if ($this->isMethod('post') || $this->has('sub_service_id')) {
            $rules['sub_service_id'] = [
                'required',
                'numeric',
                'exists:sub_services,id',
                new MaxAppointments($this->sub_service_id, $this->day, $this->time)
            ];
        }



        return $rules;
    }


    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422));
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
