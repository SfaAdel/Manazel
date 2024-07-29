<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TagRequest extends FormRequest
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
        $tagId = optional($this->route('tag'))->id;
            return [
                //
                'name' => [
                    'required',
                    'string',
                    'min:3',
                    Rule::unique('tags', 'name')->ignore($tagId),
                ],
            ];
    }

    public function attributes()
    {
        return [
            'name' => 'الشعار',
        ];
    }
}
