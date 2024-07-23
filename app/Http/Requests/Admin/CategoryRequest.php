<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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

        $categoryId = optional($this->route('category'))->id;

        return [
            //
            'name' => [
                'required',
                'string',
                'min:3',
                Rule::unique('categories', 'name')->ignore($categoryId),
            ],
            'description' => 'required|string',
            'icon' => 'image|mimes:jpeg,png,bmp,gif,jpg,svg,webp|max:10240',
            'bannar' => 'image|mimes:jpeg,png,bmp,gif,jpg,svg,webp|max:10240',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'اسم الخدمة',
            'description' => 'وصف الخدمة',
            'icon' => 'صورة الخدمة',
            'bannar' => 'صورة البانر'
        ];
    }
}
