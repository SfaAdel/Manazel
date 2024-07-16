<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdvantageRequest extends FormRequest
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

        $advantageId = optional($this->route('advantage'))->id;

        return [
            //
            'name' => [
                'required',
                'string',
                'min:3',
                Rule::unique('advantages', 'name')->ignore($advantageId),
            ],
            // 'icon' => 'image|mimes:jpeg,png,bmp,gif,jpg,svg,webp|max:10240',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'الميزة',
            'icon' => 'الصورة',
        ];
    }
}
