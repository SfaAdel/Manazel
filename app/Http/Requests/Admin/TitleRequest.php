<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TitleRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:50|unique:titles,title',
            'short_description' => 'required|string|min:3|max:10000',
            'section' => 'required|string|unique:titles,section',
            'icon' => 'image|mimes:jpeg,png,bmp,gif,jpg,svg,webp|max:10240',

        ];
    }
    public function attributes()
    {
        return [
            'title' => ' العنوان',
            'short_description' => 'وصف قصير',
            'section' => 'القسم',
            'icon' => 'صورة',
        ];
    }
}
