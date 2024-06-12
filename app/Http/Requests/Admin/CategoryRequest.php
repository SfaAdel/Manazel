<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:255|unique:categories,name',
            'description' => 'required|string|max:10000',
            'icon' => 'image|mimes:jpeg,png,bmp,gif,jpg,svg,webp|max:10240',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'اسم الخدمة',
            'description' => 'وصف الخدمة',
            'icon' => 'صورة الخدمة'
        ];
    }
}
