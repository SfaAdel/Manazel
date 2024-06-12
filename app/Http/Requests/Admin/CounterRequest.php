<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CounterRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:255|unique:about_us_counters,name',
            'icon' => 'image|mimes:jpeg,png,bmp,gif,jpg,svg,webp|max:10240',
            'number' => 'required|numeric|min:0',
        ];
    }
    public function attributes()
    {
        return [
            'title' => 'العنوان',
            'icon' => 'الصورة',
            'number' => 'القيمة',
        ];
    }
}

