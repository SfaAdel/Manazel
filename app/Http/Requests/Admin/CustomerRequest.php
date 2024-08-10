<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class CustomerRequest extends FormRequest
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
        // Ensure the customer ID is correctly retrieved
        $customerId = $this->route('customer') ? $this->route('customer')->id : Auth::guard('customer')->id();

        return [
            'name' => [
                'required',
                'string',
                'min:3',
                Rule::unique('customers', 'name')->ignore($customerId),
            ],
            'phone' => [
                'required',
                'string',
                'size:10', // Ensure the phone number is exactly 10 characters long
                'regex:/^05[0-9]{8}$/', // Saudi phone number format
                Rule::unique('customers', 'phone')->ignore($customerId),
            ],
            'password' => $this->method() === 'POST' ? 'required|string|min:6' : '',
        ];
    }


    public function attributes()
    {
        return [
            'name' => ' الاسم',
            'phone' => 'رقم الهاتف',
            'password' => ' كلمة المرور'
        ];
    }
}
