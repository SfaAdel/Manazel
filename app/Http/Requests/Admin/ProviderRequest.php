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
            'name' => 'required|string|min:3|max:255|unique:providers,name',
            'phone' => [
                'required',
                'string',
                'size:10',
                'unique:providers,phone',
                'regex:/^05[0-9]{8}$/',
            ],

            'category_id' => 'required|numeric|exists:categories,id',
            'status' => 'required|boolean',

        ];
    }


    public function attributes()
    {
        return [
            'name' => ' الاسم',
            'phone' => ' رقم الهاتف',
            'category_id' => 'التصنيف التابع له',
            'status' => 'الحالة',

        ];
    }
}
