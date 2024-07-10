<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WhyRequest extends FormRequest
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

        $why_usId = optional($this->route('why_us'))->id;

        return [
            //
            'question' => [
                'required',
                'string',
                'min:3',
                Rule::unique('why_us', 'question')->ignore($why_usId),
            ],
            'answer' => 'required|string|min:3',
        ];
    }

    public function attributes()
    {
        return [
            'question' => ' العنوان',
            'answer' => ' المحتوي',
        ];
    }
}
