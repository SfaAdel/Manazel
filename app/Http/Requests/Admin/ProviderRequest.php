<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProviderRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:255|unique',
            'phone' => [
                'required',
                'string',
                'size:10', // Ensure the phone number is exactly 10 characters long
                'unique:customers,phone', // Assuming the phone number is stored in the 'users' table
                'regex:/^05[0-9]{8}$/', // Saudi phone number format
            ],
            'category_id' => 'required|numeric|exists:categories,id',
            'status' => 'required|boolean',

        ];
    }


    public function attributes()
    {
        return [
            'name' => ' الاسم',
            'phone' => 'رقم الهاتف',
            'category_id' => 'القسم',
            'status' => 'الحالة',

        ];
    }
}
