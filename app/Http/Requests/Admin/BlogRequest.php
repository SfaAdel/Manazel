<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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

        $blogId = optional($this->route('blog'))->id;

        return [
            'main_title' => [
                'required',
                'string',
                'min:3',
                Rule::unique('blogs', 'main_title')->ignore($blogId),
            ],
            'short_description' => 'required|string|min:10',
            'long_description' => 'required|string|min:10',
            'icon' => 'image|mimes:jpeg,png,bmp,gif,jpg,svg,webp|max:10240',
            'category_id' => 'required|numeric|exists:categories,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ];
    }
    public function attributes()
    {
        return [
            'main_title' => 'العنوان الرئيسي',
            // 'second_title' => 'العنوان الثانوي',
            'short_description' => 'وصف قصير',
            'long_description' => 'وصف طويل',
            'icon' => 'الصورة',
            'category_id' => 'التصنيف',
        ];
    }
}
