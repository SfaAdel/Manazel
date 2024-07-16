<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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

        $providerId = optional($this->route('provider'))->id;

        return [
            //
'name' => [
            'required',
            'string',
            'min:3',
            Rule::unique('providers', 'name')->ignore($providerId),
        ],
'phone' => [
            'required',
            'string',
            'size:10',
            'regex:/^05[0-9]{8}$/',
            Rule::unique('providers', 'phone')->ignore($providerId),
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
