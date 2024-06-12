<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
        ;
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
            'main_title' => 'required|string|min:3|max:1000',
            'second_title' => 'required|string|min:3|max:1000',
            'short_description' => 'required|string|min:10|max:10000',
            'long_description' => 'required|string|min:10',
            'icon' => 'required|image|mimes:jpeg,png,bmp,gif,jpg,svg,webp|max:10240',
            'category_id' => 'required|numeric|exists:categories,id',
        ];
    }
    public function attributes()
    {
        return [
            'main_title' => 'العنوان الرئيسي',
            'second_title' => 'العنوان الثانوي',
            'short_description' => 'وصف قصير',
            'long_description' => 'وصف طويل',
            'icon' => 'الصورة',
            'category_id' => 'التصنيف',
        ];
    }
}
