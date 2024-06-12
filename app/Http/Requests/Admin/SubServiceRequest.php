<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SubServiceRequest extends FormRequest
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
            'short_description' => 'required|string|max:10000',
            'long_description' => 'required|string',
            'icon' => 'required|image|mimes:jpeg,png,bmp,gif,jpg,svg,webp|max:10240',
            'service_id' => 'required|numeric|exists:services,id',
            'offer' => 'required|boolean',
            'active' => 'required|boolean',
            'price' => 'required|numeric|min:0',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'final_price' => 'required|numeric|min:0',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'اسم الخدمة',
            'short_description' => 'وصف قصير',
            'long_description' => 'وصف طويل',
            'icon' => 'صورة الخدمة',
            'service_id' => 'الخدمة الاساسية',
            'offer' => 'عرض',
            'active' => ' حالة الخدمة',
            'price' => ' السعر',
            'discount_percentage' => 'نسبة الخصم',
            'final_price' => ' السعر النهائي',
        ];
    }
}
