<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeamRequest extends FormRequest
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

        $teamId = optional($this->route('team'))->id;

        return [
            //
            'name' => [
                'required',
                'string',
                'min:3',
                Rule::unique('teams', 'name')->ignore($teamId),
            ],
            'description' => 'required|string',
            'icon' => 'image|mimes:jpeg,png,bmp,gif,jpg,svg,webp|max:10240',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'اسم الخدمة',
            'description' => ' الوصف',
            'icon' => 'صورة الخدمة',
        ];
    }
}
