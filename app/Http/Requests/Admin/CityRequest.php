<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CityRequest extends FormRequest
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

        $cityId = optional($this->route('city'))->id;

        return [
            //
            'name' => [
                'required',
                'string',
                'min:3',
                'max:1000',
                Rule::unique('cities', 'name')->ignore($cityId),
            ],
        ];
    }
    public function attributes()
    {
        return [
            'name' => ' اسم المدينة',
        ];
    }
}
