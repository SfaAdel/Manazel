<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DistrictRequest extends FormRequest
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
        $districtId = $this->route('district'); // Get the district ID from the route, if available

        return [
            'name' => [
                'required',
                'string',
                'min:3',
                Rule::unique('districts')->where(function ($query) {
                    return $query->where('city_id', $this->city_id);
                })->ignore($districtId),
            ],
            'city_id' => 'required|numeric|exists:cities,id',
        ];
    }

    /**
     * Get custom attribute names for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'اسم الحي',
            'city_id' => 'اسم المدينة',
        ];
    }
}
