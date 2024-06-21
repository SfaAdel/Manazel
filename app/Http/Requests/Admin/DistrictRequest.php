<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DistrictRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            'name' => 'required|string|min:3|max:1000',
            'city_id' => 'required|numeric|exists:cities,id',

        ];
    }
    public function attributes()
    {
        return [
            'name' => ' اسم الحي',
            'city_id' => ' اسم المدينة',
        ];
    }
}
