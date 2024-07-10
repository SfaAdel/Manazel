<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|min:10|max:15',
            'title' => 'required|string|min:3|max:1000',
            'message' => 'required|string|min:5',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'الاسم',
            'email' => 'البريد الالكتروني',
            'phone' => 'رقم الهاتف',
            'title' => 'العنوان',
            'message' => 'محتوي الرسالة',
        ];
    }
}
