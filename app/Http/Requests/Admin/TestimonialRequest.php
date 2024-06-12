<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:50',
            'stars' => 'required|numeric|min:0|max:5',
            'review' => 'required|string',
            'icon' => 'image|mimes:jpeg,png,bmp,gif,jpg,svg,webp|max:10240',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'الاسم',
            'stars' => 'عدد النجوم',
            'review' => ' المراجعة',
            'icon' => 'صورة',
        ];
    }
}
