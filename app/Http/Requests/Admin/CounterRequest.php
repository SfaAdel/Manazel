<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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

        $counterId = $this->route('counter'); // Get the counter ID from the route

        return [
            //
            'title' => ['required','string','min:3','max:255',
        Rule::unique('about_us_counters', 'title')->ignore($counterId), // Ignore the current counter ID
            ]
        ,
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

