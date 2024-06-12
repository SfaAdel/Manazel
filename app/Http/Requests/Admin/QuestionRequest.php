<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
                    'question' => 'required|string|min:3|unique:questions,question',
                    'answer' => 'required|string|min:3',
            ];
        }

        public function attributes()
        {
            return [
                'question' => ' السؤال',
                'answer' => ' الاجابة',
            ];
        }
}
