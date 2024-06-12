<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'name' => 'required|string|min:3|max:50|unique:services,name',
            'description' => 'required|string|max:10000',
            'icon' => 'image|mimes:jpeg,png,bmp,gif,jpg,svg,webp|max:10240',

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
