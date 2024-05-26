<?php
namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules()
    {
        return [
            'phone' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    public function authenticate()
    {
        $credentials = $this->only('phone', 'password');

        if (!Auth::guard('customer')->attempt($credentials, $this->filled('remember'))) {
            throw ValidationException::withMessages([
                'phone' => [trans('auth.failed')],
            ]);
        }
    }
}
