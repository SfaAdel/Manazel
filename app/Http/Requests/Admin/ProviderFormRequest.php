<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProviderFormRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'email' => 'required|string|email|unique:provider_forms,email',
            'phone' => [
                'required',
                'string',
                'size:10', // Ensure the phone number is exactly 10 characters long
                'unique:provider_forms,phone',
                'unique:providers,phone',
                'regex:/^05[0-9]{8}$/', // Saudi phone number format
            ],
            'category' => 'required|string',
            'birth_date' => 'required|date',

        ];
    }


    public function attributes()
    {
        return [
            'name' => ' الاسم',
            'email' => ' البريد الالكترونى',
            'phone' => 'رقم الهاتف',
            'category' => 'القسم',
            'birth_date' => 'تاريخ الميلاد',
        ];
    }
}
