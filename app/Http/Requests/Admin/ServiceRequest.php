<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $serviceId = optional($this->route('service'))->id;

        return [
            'name' => [
                'required',
                'string',
                'min:3',
                Rule::unique('services', 'name')->ignore($serviceId),
            ],
            'description' => 'required|string',
            'icon' => 'required|image|mimes:jpeg,png,bmp,gif,jpg,svg,webp|max:10240',

            // 'collages' => 'required|array',
            'category_id' => 'required|numeric|exists:categories,id',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'اسم الخدمة',
            'description' => 'وصف الخدمة',
            'icon' => 'صورة الخدمة',
            'category_id' => ' التصنيف'
        ];
    }
}
